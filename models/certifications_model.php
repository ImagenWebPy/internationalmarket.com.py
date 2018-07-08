<?php

class Certifications_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function datoCertificacion($id, $lng) {
        $sql = $this->db->select("SELECT
                                        imagen_header,
                                        " . $lng . "_texto_header as header_text,
                                        " . $lng . "_contenido as contenido,
                                        img_certificacion
                                FROM
                                        certificaciones
                                WHERE
                                        id = $id");
        return $sql[0];
    }

}
