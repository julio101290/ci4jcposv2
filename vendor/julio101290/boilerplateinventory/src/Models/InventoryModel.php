<?php

namespace julio101290\boilerplateinventory\Models;

use CodeIgniter\Model;

class InventoryModel extends Model {

    protected $table = 'inventory';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'idEmpresa',
        'idStorage',
        'idTipoInventario',
        'tipoES',
        'folio',
        'idUser',
        'idProveedor',
        'listProducts',
        'taxes',
        'IVARetenido',
        'ISRRetenido',
        'subTotal',
        'total',
        'balance',
        'date',
        'dateVen',
        'generalObservations',
        'delivaryTime',
        'created_at',
        'updated_at',
        'RFCReceptor',
        'usoCFDI',
        'metodoPago',
        'formaPago',
        'razonSocialReceptor',
        'codigoPostalReceptor',
        'regimenFiscalReceptor',
        'UUID'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'idProveedor' => 'required|',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetInventory($empresas) {

        $result = $this->db->table('inventory a')
                ->select('
        a.UUID AS UUID,
        a.id AS id,
        CONCAT(b.firstname, \' \', b.lastname) AS name_proveedor,
        b.firstname as firstname,
        b.lastname as lastname,
        a.idStorage AS id_storage,
        a.idTipoInventario AS id_tipo_inventario,
        a.tipoES AS tipo_es,
        a.idProveedor AS id_proveedor,
        a.folio AS folio,
        a.date AS fecha,
        b.email AS correo_cliente,
        a.dateVen AS fecha_vencimiento,
        a.total AS total,
        a.taxes AS impuestos,
        a.subTotal AS subtotal,
        a.balance AS balance,
        a.delivaryTime AS tiempo_entrega,
        a.generalObservations AS observaciones_generales,
        a.IVARetenido AS iva_retenido,
        a.ISRRetenido AS isr_retenido,
        a.RFCReceptor AS rfc_receptor,
        a.usoCFDI AS uso_cfdi,
        a.metodoPago AS metodo_pago,
        a.formaPago AS forma_pago,
        a.razonSocialReceptor AS razon_social_receptor,
        a.codigoPostalReceptor AS codigo_postal_receptor,
        a.regimenFiscalReceptor AS regimen_fiscal_receptor,
        a.created_at AS creado,
        a.updated_at AS actualizado,
        a.deleted_at AS eliminado
    ')
                ->join('proveedores b', 'a.idProveedor = b.id', 'left')
                ->join('empresas c', 'a.idEmpresa = c.id', 'left')
                ->whereIn('a.idEmpresa', $empresas);

        return $result;
    }

    /**
     * Search by filters
     */
    public function mdlGetInventoryFilters($empresas, $from, $to) {

        $result = $this->db->table('inventory a')
                ->select('
        a.UUID AS UUID,
        a.id AS id,
        CONCAT(b.firstname, \' \', b.lastname) AS name_proveedor,
        a.idStorage AS id_storage,
        b.firstname AS firstname,
        b.lastname AS lastname,
        a.idTipoInventario AS idTipoInventario,
        a.tipoES AS tipoES,
        a.idProveedor AS idProveedor,
        a.folio AS folio,
        a.date AS date,
        b.email AS email,
        a.dateVen AS dateVen,
        a.total AS total,
        a.taxes AS taxes,
        a.subTotal AS subTotal,
        a.balance AS balance,
        a.delivaryTime AS delivaryTime,
        a.generalObservations AS generalObservations,
        a.IVARetenido AS IVARetenido,
        a.ISRRetenido AS ISRRetenido,
        a.RFCReceptor AS RFCReceptor,
        a.usoCFDI AS usoCFDI,
        a.metodoPago AS metodoPago,
        a.formaPago AS formaPago,
        a.razonSocialReceptor AS razonSocialReceptor,
        a.codigoPostalReceptor AS codigoPostalReceptor,
        a.regimenFiscalReceptor AS regimenFiscalReceptor,
        a.created_at AS created_at,
        a.updated_at AS updated_at,
        a.deleted_at AS deleted_at
    ')
                ->join('proveedores b', 'a.idProveedor = b.id', 'left')
                ->join('empresas c', 'a.idEmpresa = c.id', 'left')
                ->where('a.date >=', $from . ' 00:00:00')
                ->where('a.date <=', $to . ' 23:59:59')
                ->whereIn('a.idEmpresa', $empresas);

        return $result;
    }

    public function lastCode($idStorage, $idTipoMovimiento) {

        $result = $this->db->table('inventory')
                ->selectMax('folio as lastFolio')
                ->where(array('idStorage' => $idStorage, 'idTipoInventario' => $idTipoMovimiento));
    }

    /**
     * Obtener Cotización por UUID
     */

    /**
     * Obtener Cotización por UUID
     */
    public function mdlGetInventoryUUID($uuid, $empresas) {
        $builder = $this->db->table('inventory a');

        // Determinar el alias de nombre concatenado según el motor
        $nameProveedor = $this->db->getPlatform() === 'sqlite3' ? "b.firstname || ' ' || b.lastname AS nameProveedor" : "CONCAT(b.firstname, ' ', b.lastname) AS nameProveedor";

        $builder->select([
            'a.idProveedor AS idProveedor',
            'a.idStorage AS idStorage',
            'b.firstname AS firstname',
            'b.lastname AS lastname',
            'a.idTipoInventario AS idTipoInventario',
            'a.tipoES AS tipoES',
            'a.folio AS folio',
            'a.quoteTo AS quoteTo',
            'a.UUID AS UUID',
            'a.idUser AS idUser',
            'a.id AS id',
            $nameProveedor,
            'a.idEmpresa AS idEmpresa',
            'c.nombre AS nombreEmpresa',
            'a.listProducts AS listProducts',
            'a.date AS date',
            'a.dateVen AS dateVen',
            'a.total AS total',
            'a.taxes AS taxes',
            'a.IVARetenido AS IVARetenido',
            'a.ISRRetenido AS ISRRetenido',
            'a.subTotal AS subTotal',
            'a.delivaryTime AS delivaryTime',
            'a.generalObservations AS generalObservations',
            'a.RFCReceptor AS RFCReceptor',
            'a.usoCFDI AS usoCFDI',
            'a.metodoPago AS metodoPago',
            'a.formaPago AS formaPago',
            'a.razonSocialReceptor AS razonSocialReceptor',
            'a.codigoPostalReceptor AS codigoPostalReceptor',
            'a.regimenFiscalReceptor AS regimenFiscalReceptor',
            'a.created_at AS created_at',
            'a.updated_at AS updated_at',
            'a.deleted_at AS deleted_at'
        ]);

        $builder->join('proveedores b', 'a.idProveedor = b.id');
        $builder->join('empresas c', 'a.idEmpresa = c.id');
        $builder->where('a.UUID', $uuid);
        $builder->whereIn('a.idEmpresa', $empresas);

        return $builder->get()->getRowArray();
    }
}
