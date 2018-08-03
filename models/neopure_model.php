<?php

class Neopure_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function datoNeo($lng) {
        $sql = $this->db->select("SELECT
                                        imagen_header,
                                        " . $lng . "_header_text as header_text,
                                        " . $lng . "_contenido as contenido
                                FROM
                                        neo_pure
                                WHERE
                                        id = 1");
        return $sql[0];
    }

    public function galeria() {
        $sql = $this->db->select("select * from multimedia_neopure where estado = 1");
        return $sql;
    }

}
