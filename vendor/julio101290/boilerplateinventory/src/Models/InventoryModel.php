<?php

namespace julio101290\boilerplateinventory\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{

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

    public function mdlGetInventory($empresas)
    {

        $result = $this->db->table('inventory a, proveedores b, empresas c')
            ->select('a.UUID,a.id,concat(b.firstname,\' \',b.lastname) as nameProveedor
                    ,a.idStorage
                    ,a.idTipoInventario
                    ,a.tipoES
                    ,a.idProveedor
                    ,a.folio
                    ,a.date
                    ,b.email as correoCliente
                    ,a.dateVen
                    ,a.total
                    ,a.taxes
                    ,a.subTotal
                    ,a.balance
                    ,a.delivaryTime
                    ,a.generalObservations
                    ,a.IVARetenido
                    ,a.ISRRetenido
                  


                    ,a.RFCReceptor
                    ,a.usoCFDI
                    ,a.metodoPago
                    ,a.formaPago
                    ,a.razonSocialReceptor
                    ,a.codigoPostalReceptor
                    ,a.regimenFiscalReceptor

                    ,a.created_at
                    ,a.updated_at
                    ,a.deleted_at')
            ->where('a.idProveedor', 'b.id', FALSE)
            ->where('a.idEmpresa', 'c.id', FALSE)
            ->whereIn('a.idEmpresa', $empresas);

        return $result;
    }


    /**
     * Search by filters
     */
    public function mdlGetInventoryFilters($empresas, $from, $to)
    {

        $result = $this->db->table('inventory a, proveedores b, empresas c')
            ->select('a.UUID,a.id,concat(b.firstname,\' \',b.lastname) as nameProveedor
                    ,a.idStorage
                    ,a.idTipoInventario
                    ,a.tipoES
                    ,a.idProveedor
                    ,a.folio
                    ,a.date
                    ,b.email as correoCliente
                    ,a.dateVen
                    ,a.total
                    ,a.taxes
                    ,a.subTotal
                    ,a.balance
                    ,a.delivaryTime
                    ,a.generalObservations
                    ,a.IVARetenido
                    ,a.ISRRetenido


                    ,a.RFCReceptor
                    ,a.usoCFDI
                    ,a.metodoPago
                    ,a.formaPago
                    ,a.razonSocialReceptor
                    ,a.codigoPostalReceptor
                    ,a.regimenFiscalReceptor

                    ,a.created_at
                    ,a.updated_at
                    ,a.deleted_at')
            ->where('a.idProveedor', 'b.id', FALSE)
            ->where('a.idEmpresa', 'c.id', FALSE)
            ->where('a.date >=', $from . ' 00:00:00')
            ->where('a.date <=', $to . ' 23:59:59')
            ->whereIn('a.idEmpresa', $empresas);

        return $result;
    }
    
    
    public function lastCode($idStorage,$idTipoMovimiento){
        
        $result = $this->db->table('inventory')
        ->selectMax('folio as lastFolio')
        ->where(array('idStorage' => $idStorage,'idTipoInventario' => $idTipoMovimiento));

    }



    /**
     * Obtener Cotización por UUID
     */

    public function mdlGetInventoryUUID($uuid, $empresas)
    {

        $result = $this->db->table('inventory a, proveedores b, empresas c')
            ->select('a.idProveedor
            ,a.idStorage
            ,a.idTipoInventario
            ,a.tipoES
            ,a.folio
            ,a.quoteTo
            ,a.UUID
            ,a.idUser
            ,a.id
            ,concat(b.firstname,\' \',b.lastname) as nameProveedor
            ,a.idEmpresa
            ,c.nombre as nombreEmpresa
            ,a.listProducts
            ,a.date
            ,a.dateVen
            ,a.total
            ,a.taxes
            ,a.IVARetenido
            ,a.ISRRetenido
            ,a.subTotal
            ,a.delivaryTime
            ,a.generalObservations

            ,a.RFCReceptor
            ,a.usoCFDI
            ,a.metodoPago
            ,a.formaPago
            ,a.razonSocialReceptor
            ,a.codigoPostalReceptor
            ,a.regimenFiscalReceptor

            ,a.created_at
            ,a.updated_at,
            a.deleted_at')
            ->where('a.idProveedor', 'b.id', FALSE)
            ->where('a.idEmpresa', 'c.id', FALSE)
            ->where('UUID', $uuid)
            ->whereIn('a.idEmpresa', $empresas)
            ->get()->getRowArray();

        return $result;
    }
}
