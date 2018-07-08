<?php

class Logistics_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function datoLogistica($id, $lng) {
        $sql = $this->db->select("SELECT
                                        imagen_header,
                                        " . $lng . "_header_text as header_text,
                                        " . $lng . "_contenido as contenido
                                FROM
                                        logistica
                                WHERE
                                        id = $id");
        return $sql[0];
    }

}
