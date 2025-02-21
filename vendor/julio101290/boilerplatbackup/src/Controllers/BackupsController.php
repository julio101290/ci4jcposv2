<?php

namespace julio101290\boilerplatebackup\Controllers;

use App\Controllers\BaseController;
use julio101290\boilerplatebackup\Models\{
    BackupsModel
};
use julio101290\boilerplatelog\Models\LogModel;
use CodeIgniter\API\ResponseTrait;
use julio101290\boilerplatecompanies\Models\EmpresasModel;
use DatabaseBackupManager\MySQLBackup;

class BackupsController extends BaseController {

    use ResponseTrait;

    protected $log;
    protected $backups;

    public function __construct() {
        $this->backups = new BackupsModel();
        $this->log = new LogModel();
        $this->empresa = new EmpresasModel();
        helper('menu');
        helper('utilerias');
    }

    public function index() {



        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }




        if ($this->request->isAJAX()) {
            $datos = $this->backups->mdlGetBackups($empresasID);

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }
        $titulos["title"] = lang('backups.title');
        $titulos["subtitle"] = lang('backups.subtitle');
        return view('julio101290\boilerplatebackup\Views\backups', $titulos);
    }

    /**
     * Read Backups
     */
    public function getBackups() {

        helper('auth');

        $idUser = user()->id;
        $titulos["empresas"] = $this->empresa->mdlEmpresasPorUsuario($idUser);

        if (count($titulos["empresas"]) == "0") {

            $empresasID[0] = "0";
        } else {

            $empresasID = array_column($titulos["empresas"], "id");
        }


        $idBackups = $this->request->getPost("idBackups");
        $datosBackups = $this->backups->whereIn('idEmpresa', $empresasID)
                        ->where("id", $idBackups)->first();
        echo json_encode($datosBackups);
    }

    /**
     * Save or update Backups
     */
    public function save() {
        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;
        $datos = $this->request->getPost();

        $host = config('Database')->default["hostname"];
        $dbname = config('Database')->default["database"];
        $username = config('Database')->default["username"];
        $password = config('Database')->default["password"];
        $port = config('Database')->default["port"];

        $DNS = "mysql:host=$host;port:$port;dbname=$dbname'";

        $dbBackupConection = new \PDO('mysql:host=' . $host . ':' . $port . ';dbname=' . $dbname . '', $username, $password);

        $mysqlBackup = new MySQLBackup($dbBackupConection, ROOTPATH . "writable/database/backup");

        try {

            $backup = $mysqlBackup->backup(false, true, false);
        } catch (Exception $ex) {

            echo $ex->getMessage();
            return;
        }


        $datos["SQLFile"] = $backup;

        $datos["uuid"] = generaUUID();

        if ($datos["idBackups"] == 0) {
            try {
                if ($this->backups->save($datos) === false) {
                    $errores = $this->backups->errors();
                    foreach ($errores as $field => $error) {
                        echo $error . " ";
                    }
                    return;
                }
                $dateLog["description"] = lang("vehicles.logDescription") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {
                echo "Error al guardar " . $ex->getMessage();
            }
        } else {

            return;
            if ($this->backups->update($datos["idBackups"], $datos) == false) {
                $errores = $this->backups->errors();
                foreach ($errores as $field => $error) {
                    echo $error . " ";
                }
                return;
            } else {
                $dateLog["description"] = lang("backups.logUpdated") . json_encode($datos);
                $dateLog["user"] = $userName;
                $this->log->save($dateLog);
                echo "Actualizado Correctamente";
                return;
            }
        }
        return;
    }

    /**
     * Delete Backups
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $infoBackups = $this->backups->find($id);
        helper('auth');
        $userName = user()->username;
        if (!$found = $this->backups->delete($id)) {
            return $this->failNotFound(lang('backups.msg.msg_get_fail'));
        }
        $this->backups->purgeDeleted();

        unlink($infoBackups["SQLFile"]);
        $logData["description"] = lang("backups.logDeleted") . json_encode($infoBackups);
        $logData["user"] = $userName;
        $this->log->save($logData);
        return $this->respondDeleted($found, lang('backups.msg_delete'));
    }

    /**
     * Delete Backups
     * @param type $id
     * @return type
     */
    public function restoreBackup($uuid) {
        $infoBackups = $this->backups->select("*")->where("uuid", $uuid)->first();

        $allBackups = $this->backups->select("*")->asArray()->findAll();

        helper('auth');
        $userName = user()->username;

        $host = config('Database')->default["hostname"];
        $dbname = config('Database')->default["database"];
        $username = config('Database')->default["username"];
        $password = config('Database')->default["password"];
        $port = config('Database')->default["port"];

        $DNS = "mysql:host=$host;port:$port;dbname=$dbname'";

        $dbBackupConection = new \PDO('mysql:host=localhost:' . $port . ';dbname=' . $dbname . '', $username, $password);

        $mysqlBackup = new MySQLBackup($dbBackupConection);

        try {

            $restore = $mysqlBackup->restore($infoBackups["SQLFile"], true);

            $this->backups->select("*")->where("id>0")->delete();
            $this->backups->purgeDeleted();

            $this->backups->insertBatch($allBackups);
        } catch (Exception $ex) {

            echo $ex->getMessage();
            return;
        }


        return $this->respondCreated(true, lang("backups.msg.restored"));
    }

    /**
     * Download Backup
     */
    public function downloadBackup($uuid) {

        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $authorize = $auth = service('authorization');

        if (!($authorize->hasPermission("backups-permissions", $idUser))) {

            return;
        }

        $dataBackup = $this->backups->select("SQLFile,created_at")->where("uuid", $uuid)->find();

        $fileToDownload = file_get_contents($dataBackup[0]["SQLFile"]);
        $this->response->setHeader("Content-Type", "text/xml");
        $this->response->setHeader("Content-Disposition", "attachment; filename=backup " . $dataBackup[0]["created_at"] . ".sql");
        echo $fileToDownload;
    }
}
