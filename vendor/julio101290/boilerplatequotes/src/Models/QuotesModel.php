<?php

namespace julio101290\boilerplatequotes\Models;

use CodeIgniter\Model;

class QuotesModel extends Model {

    protected $table = 'quotes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'idEmpresa',
        'folio',
        'idUser',
        'idCustumer',
        'listProducts',
        'taxes',
        'taxes',
        'IVARetenido',
        'ISRRetenido',
        'subTotal',
        'total',
        'date',
        'dateVen',
        'generalObservations',
        'quoteTo',
        'delivaryTime',
        'created_at',
        'updated_at',
        'idSell',
        'RFCReceptor',
        'usoCFDI',
        'metodoPago',
        'formaPago',
        'razonSocialReceptor',
        'codigoPostalReceptor',
        'idSucursal',
        'UUID'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'idCustumer' => 'required|',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlGetQuotes($empresas) {

        $result = $this->db->table('quotes a, custumers b, empresas c')
                ->select('a.UUID,a.id,concat(b.firstname,\' \',b.lastname) as nameCustumer
                    ,a.idCustumer
                    ,a.folio
                    ,a.date
                    ,b.email as correoCliente
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

                    ,a.created_at
                    ,a.updated_at
                    ,a.idSell
                    ,a.deleted_at')
                ->where('a.idCustumer', 'b.id', FALSE)
                ->where('a.idEmpresa', 'c.id', FALSE)
                ->whereIn('a.idEmpresa', $empresas);

        return $result;
    }

    /**
     * Search by filters
     */
    public function mdlGetQuotesFilters($empresas, $from, $to) {

        $result = $this->db->table('quotes a, custumers b, empresas c')
                ->select('a.UUID,a.id,concat(b.firstname,\' \',b.lastname) as nameCustumer
            ,a.idCustumer
            ,a.folio
            ,a.date
            ,b.email as correoCliente
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

            ,a.created_at
            ,a.updated_at
            ,a.idSell
            ,a.deleted_at')
                ->where('a.idCustumer', 'b.id', FALSE)
                ->where('a.idEmpresa', 'c.id', FALSE)
                ->where('a.date >=', $from . ' 00:00:00')
                ->where('a.date <=', $to . ' 23:59:59')
                ->whereIn('a.idEmpresa', $empresas);

        return $result;
    }

    /**
     * Obtener Cotización por UUID
     */
    public function mdlGetQuoteUUID($uuid, $empresas) {

        $result = $this->db->table('quotes a, custumers b, empresas c')
                        ->select('a.idCustumer
            ,a.idSucursal
            ,a.folio
            ,a.quoteTo
            ,a.UUID
            ,a.idUser
            ,a.id
            ,concat(b.firstname,\' \',b.lastname) as nameCustumer
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

            ,a.RFCReceptor
            ,a.usoCFDI
            ,a.metodoPago
            ,a.formaPago
            ,a.razonSocialReceptor
            ,a.codigoPostalReceptor
            ,a.regimenFiscalReceptor

            ,a.delivaryTime
            ,a.idSell
            ,a.generalObservations
            ,a.created_at,a.updated_at,a.deleted_at')
                        ->where('a.idCustumer', 'b.id', FALSE)
                        ->where('a.idEmpresa', 'c.id', FALSE)
                        ->where('UUID', $uuid)
                        ->whereIn('a.idEmpresa', $empresas)
                        ->get()->getRowArray();

        return $result;
    }

}
