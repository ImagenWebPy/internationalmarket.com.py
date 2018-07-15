<?php

class About_us_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function nosotros($lng) {
        $sql = $this->db->select("SELECT
                                        " . $lng . "_header_text as header_text,
                                        imagen_header,
                                        imagen_parallax,
                                        " . $lng . "_texto_parallax as texto_parallax,
                                        " . $lng . "_contenido as contenido,
                                        " . $lng . "_contenido_adicional as contenido_adicional
                                FROM
                                        nosotros
                                WHERE
                                        id = 1;");
        return $sql[0];
    }

}
