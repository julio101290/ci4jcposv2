<?php

namespace julio101290\boilerplateproducts\Models;

use CodeIgniter\Model;

class ProductsModel extends Model {

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id'
        , 'idEmpresa'
        , 'code'
        , 'idCategory'
        , 'description'
        , 'stock'
        , 'validateStock'
        , 'inventarioRiguroso'
        , 'buyPrice'
        , 'salePrice'
        , 'porcentSale'
        , 'porcentTax'
        , 'porcentIVARetenido'
        , 'porcentISRRetenido'
        , 'routeImage'
        , 'created_at'
        , 'deleted_at'
        , 'updated_at'
        , 'unidadSAT'
        , 'claveProductoSAT'
        , 'unidad'
        , 'nombreUnidadSAT'
        , 'nombreClaveProducto'
        , 'barcode'
        , 'inmuebleOcupado'
        , 'tasaExcenta'
        , 'predial'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'barcode' => 'permit_empty|numeric',
        'buyPrice' => 'numeric',
        'salePrice' => 'numeric',
        'stock' => 'numeric',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlProductos($empresas) {


        $resultado = $this->db->table('products a')
                ->select(
                        'a.id AS id,
                        a.code AS code,
                        a.idCategory AS idCategory,
                        a.validateStock AS validateStock,
                        a.inventarioRiguroso AS inventarioRiguroso,
                        a.description AS description,
                        a.stock AS stock,
                        a.buyPrice AS buyPrice,
                        a.salePrice AS salePrice,
                        a.porcentSale AS porcentSale,
                        a.porcentTax AS porcentTax,
                        a.routeImage AS routeImage,
                        a.created_at AS created_at,
                        a.deleted_at AS deleted_at,
                        a.updated_at AS updated_at,
                        a.barcode AS barcode,
                        a.unidad AS unidad,
                        b.nombre AS nombreEmpresa,
                        a.porcentIVARetenido AS porcentIVARetenido,
                        a.porcentISRRetenido AS porcentISRRetenido,
                        a.nombreUnidadSAT AS nombreUnidadSAT,
                        a.nombreClaveProducto AS nombreClaveProducto,
                        a.unidadSAT AS unidadSAT,
                        a.claveProductoSAT AS claveProductoSAT,
                        a.inmuebleOcupado AS inmuebleOcupado,
                        a.tasaExcenta AS tasaExcenta,
                        a.predial AS predial'
                )
                ->join('empresas b', 'a.idEmpresa = b.id')
                ->whereIn('a.idEmpresa', $empresas)
                ->where('a.deleted_at', null);

        return $resultado;
    }

    public function mdlProductosEmpresa($empresas, $empresa) {


        $resultado2 = $this->db->table('products a, empresas b, saldos c, storages d')
                ->select('a.id
                    ,a.code
          ,a.idCategory
          ,a.validateStock
          ,a.inventarioRiguroso
          ,a.description
          ,c.cantidad as stock
          ,a.buyPrice
          ,a.salePrice
          ,a.porcentSale
          ,a.porcentTax
          ,a.routeImage
          ,a.created_at
          ,a.deleted_at
          ,a.updated_at
          ,a.barcode
          ,a.unidad
          ,b.nombre as nombreEmpresa
          ,a.porcentIVARetenido
          ,a.porcentISRRetenido
          ,a.nombreUnidadSAT
          ,a.nombreClaveProducto
          ,a.unidadSAT
          ,ifnull(c.lote,\'\') as lote
          ,c.idAlmacen
          ,d.name as almacen
          ,a.claveProductoSAT
          ,a.tasaExcenta
          ,a.predial
          ,a.inmuebleOcupado')
                ->where('c.idProducto', 'a.id', FALSE)
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->where('c.cantidad >', '0')
                ->where('a.idEmpresa', 'c.idEmpresa', FALSE)
                ->where('c.idAlmacen', 'd.id', FALSE)
                ->where('a.idEmpresa', $empresa)
                ->where('a.deleted_at', null)
                ->where('a.inventarioRiguroso', 'on')
                ->where('a.validateStock', 'on')
                ->whereIn('c.idEmpresa', $empresas);

        $resultado = $this->db->table('products a, empresas b')
                ->select('a.id
                    ,a.code
          ,a.idCategory
          ,a.validateStock
          ,a.inventarioRiguroso
          
          ,a.description
          ,a.stock as stock
          ,a.buyPrice
          ,a.salePrice
          ,a.porcentSale
          
          ,a.porcentTax
          ,a.routeImage
          ,a.created_at
          ,a.deleted_at
          ,a.updated_at
          
          ,a.barcode
          ,a.unidad
          ,b.nombre as nombreEmpresa
          ,a.porcentIVARetenido
          ,a.porcentISRRetenido
          
          ,a.nombreUnidadSAT
          ,a.nombreClaveProducto
          ,a.unidadSAT
          ,\'\' as lote
          
          , 0 as idAlmacen
          ,\'\' as almacen
          ,a.claveProductoSAT
          ,a.tasaExcenta
          ,a.predial
          ,a.inmuebleOcupado
          
            ')
                ->where('a.idEmpresa', 'b.id', FALSE)
                ->where('a.idEmpresa', $empresa)
                ->groupStart()
                ->where('a.inventarioRiguroso', "off")
                ->orWhere("a.inventarioRiguroso", "NULL")
                ->orWhere("a.inventarioRiguroso", NULL)
                ->groupEnd()
                ->where('a.deleted_at', null)
                ->whereIn('idEmpresa', $empresas);

        $resultado->union($resultado2);
        $this->db->query("DROP TABLE IF EXISTS tempProducts");

        $this->db->query("create table tempProducts " . $resultado->getCompiledSelect());

        return $this->db->table('tempProducts');
    }

    /**
     * Lista Para inventario Riguroso
     * @param type $empresas
     * @param type $empresa
     * @return type
     */
    public function mdlProductosEmpresaInventarioEntrada($empresas, $empresa) {
        $resultado = $this->db->table('products a')
                ->select('
                        a.id AS id,
                        a.code AS codigo,
                        a.idCategory AS id_categoria,
                        a.validateStock AS validar_stock,
                        a.inventarioRiguroso AS inventario_riguroso,
                        a.description AS descripcion,
                        a.stock AS stock,
                        a.buyPrice AS precio_compra,
                        a.salePrice AS precio_venta,
                        a.porcentSale AS porcentaje_venta,
                        a.porcentTax AS porcentaje_impuesto,
                        a.routeImage AS ruta_imagen,
                        a.created_at AS creado,
                        a.deleted_at AS eliminado,
                        a.updated_at AS actualizado,
                        a.barcode AS codigo_barras,
                        a.unidad AS unidad,
                        b.nombre AS nombre_empresa,
                        a.porcentIVARetenido AS porcentaje_iva_retenido,
                        a.porcentISRRetenido AS porcentaje_isr_retenido,
                        a.nombreUnidadSAT AS nombre_unidad_sat,
                        a.nombreClaveProducto AS nombre_clave_producto,
                        a.unidadSAT AS unidad_sat,
                        \'\' AS lote,
                        \'\' AS almacen,
                        a.inmuebleOcupado AS inmueble_ocupado,
                        a.tasaExcenta AS tasa_exenta,
                        a.predial AS predial,
                        a.claveProductoSAT AS clave_producto_sat
                ')
                ->join('empresas b', 'a.idEmpresa = b.id', 'left')
                ->where('a.idEmpresa', $empresa)
                ->where('a.deleted_at', null)
                ->where('a.inventarioRiguroso', 'on')
                ->where('a.validateStock', 'on')
                ->whereIn('a.idEmpresa', $empresas);

        return $resultado;
    }

    public function mdlProductosEmpresaInventarioSalida($empresas, $empresa) {

            $resultado = $this->db->table('products a')
                ->select('
                    a.id AS id,
                    a.code AS codigo,
                    a.idCategory AS id_categoria,
                    a.validateStock AS validar_stock,
                    a.inventarioRiguroso AS inventario_riguroso,
                    a.description AS descripcion,
                    c.cantidad AS stock,
                    a.buyPrice AS precio_compra,
                    a.salePrice AS precio_venta,
                    a.porcentSale AS porcentaje_venta,
                    a.porcentTax AS porcentaje_impuesto,
                    a.routeImage AS ruta_imagen,
                    a.created_at AS creado,
                    a.deleted_at AS eliminado,
                    a.updated_at AS actualizado,
                    a.barcode AS codigo_barras,
                    a.unidad AS unidad,
                    b.nombre AS nombre_empresa,
                    a.porcentIVARetenido AS porcentaje_iva_retenido,
                    a.porcentISRRetenido AS porcentaje_isr_retenido,
                    a.nombreUnidadSAT AS nombre_unidad_sat,
                    a.nombreClaveProducto AS nombre_clave_producto,
                    a.unidadSAT AS unidad_sat,
                    c.lote AS lote,
                    c.idAlmacen AS id_almacen,
                    d.name AS almacen,
                    a.inmuebleOcupado AS inmueble_ocupado,
                    a.tasaExcenta AS tasa_exenta,
                    a.predial AS predial,
                    a.claveProductoSAT AS clave_producto_sat
                ')
                ->join('empresas b', 'a.idEmpresa = b.id', 'left')
                ->join('saldos c', 'c.idProducto = a.id AND a.idEmpresa = c.idEmpresa', 'left')
                ->join('storages d', 'c.idAlmacen = d.id', 'left')
                ->where('a.idEmpresa', $empresa)
                ->where('a.deleted_at', null)
                ->where('a.inventarioRiguroso', 'on')
                ->where('a.validateStock', 'on')
                ->whereIn('c.idEmpresa', $empresas);

            return $resultado;

    }

    public function mdlGetProductoEmpresa($empresas, $idProducto) {

        $resultado = $this->db->table('products a')
                ->select(
                        'a.id AS id,
                        a.code AS code,
                        a.idEmpresa AS idEmpresa,
                        a.validateStock AS validateStock,
                        a.inventarioRiguroso AS inventarioRiguroso,
                        a.idCategory AS idCategory,
                        c.clave AS clave,
                        c.descripcion AS descripcionCategoria,
                        a.description AS description,
                        a.stock AS stock,
                        a.buyPrice AS buyPrice,
                        a.salePrice AS salePrice,
                        a.porcentSale AS porcentSale,
                        a.porcentTax AS porcentTax,
                        a.routeImage AS routeImage,
                        a.created_at AS created_at,
                        a.deleted_at AS deleted_at,
                        a.updated_at AS updated_at,
                        a.barcode AS barcode,
                        a.unidad AS unidad,
                        b.nombre AS nombreEmpresa,
                        a.porcentIVARetenido AS porcentIVARetenido,
                        a.porcentISRRetenido AS porcentISRRetenido,
                        a.nombreUnidadSAT AS nombreUnidadSAT,
                        a.nombreClaveProducto AS nombreClaveProducto,
                        a.unidadSAT AS unidadSAT,
                        a.inmuebleOcupado AS inmuebleOcupado,
                        a.tasaExcenta AS tasaExcenta,
                        a.predial AS predial,
                        a.claveProductoSAT AS claveProductoSAT'
                )
                ->join('empresas b', 'a.idEmpresa = b.id')
                ->join('categorias c', 'a.idCategory = c.id')
                ->where('a.id', $idProducto)
                ->where('a.deleted_at', null)
                ->whereIn('a.idEmpresa', $empresas)
                ->get()
                ->getFirstRow();

        return $resultado;
    }
}
