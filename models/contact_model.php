<?php

class Contact_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function contacto($lng) {
        $sql = $this->db->select("SELECT
                                        imagen_header,
                                        " . $lng . "_header_text as header_text,
                                        " . $lng . "_titulo as titulo,
                                        imagen_parallax,
                                        " . $lng . "_frm_nombre as frm_nombre,
                                        " . $lng . "_frm_email as frm_email,
                                        " . $lng . "_frm_asunto as frm_asunto,
                                        " . $lng . "_frm_mensaje as frm_mensaje,
                                        " . $lng . "_btn_enviar as btn_enviar,
                                        " . $lng . "_texto_ubicacion as texto_ubicacion
                                FROM
                                        contacto
                                WHERE
                                        id = 1;");
        return $sql[0];
    }

}
