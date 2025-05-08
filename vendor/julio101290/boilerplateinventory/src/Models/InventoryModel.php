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
        a.UUID AS uuid,
        a.id AS id,
        CONCAT(b.firstname, \' \', b.lastname) AS name_proveedor,
        b.firstname,
        b.lastname,
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
        a.UUID AS uuid,
        a.id AS id,
        CONCAT(b.firstname, \' \', b.lastname) AS name_proveedor,
        a.idStorage AS id_storage,
        b.firstname AS proveedor_nombre,
        b.lastname AS proveedor_apellido,
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
    public function mdlGetInventoryUUID($uuid, $empresas) {

        $result = $this->db->table('inventory a, proveedores b, empresas c')
                        ->select('a.idProveedor
            ,a.idStorage
            ,b.firstname
            ,b.lastname
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
