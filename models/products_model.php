<?php

class Products_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function datoProducto($id, $lng) {
        $sql = $this->db->select("SELECT
                                        imagen_header,
                                        " . $lng . "_nombre as nombre,
                                        " . $lng . "_header_text as header_text,
                                        " . $lng . "_contenido as contenido
                                FROM
                                        productos
                                WHERE
                                        id = $id");
        return $sql[0];
    }

    public function imgProducto($id) {
        $sql = $this->db->select("select id, img, img_miniatura from productos_img WHERE id_producto = $id and estado = 1");
        return $sql;
    }

}
