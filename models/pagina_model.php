<?php

class Pagina_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function datoPagina($id, $lng) {
        $sql = $this->db->select("SELECT
                                        id,
                                        imagen_header,
                                        " . $lng . "_header_text as header_text,
                                        " . $lng . "_contenido as contenido
                                FROM
                                        pagina
                                WHERE
                                        id = $id");
        return $sql[0];
    }

}
