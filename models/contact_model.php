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

    public function frmContacto($datos) {
        $sqlEmail = $this->db->select("SELECT email FROM `datos_contacto` WHERE id = 1;");
        $email = $sqlEmail[0]['email'];
        $lng = $datos['idioma'];
        if ((!empty($datos['name'])) && (!empty($datos['mail'])) && (!empty($datos['subject'])) && (!empty($datos['comment']))) {
            $this->db->insert('frm_contacto', array(
                'nombre' => utf8_decode($datos['name']),
                'email' => $datos['mail'],
                'asunto' => utf8_decode($datos['subject']),
                'mensaje' => utf8_decode($datos['comment']),
                'ip' => $this->helper->getReal_ip(),
                'fecha' => date('Y-m-d H:i:s'),
            ));
            $asunto = 'Formulario de Contacto';
            $message = "Este mensaje fue enviado por " . $datos['name'] . chr(10) . chr(13);
            $message .= "Desde la sgte Ip: " . $this->helper->getReal_ip() . chr(10) . chr(13);
            $message .= "E-mail: " . $datos['mail'] . chr(10) . chr(13);
            $message .= "Asunto: " . $datos['subject'] . chr(10) . chr(13);
            $message .= "Mensaje:" . $datos['comment'] . chr(10) . chr(13);
            $message .= "Enviado el " . date('Y-m-d H:i:s');
            //$this->helper->sendMail($email, $asunto, $message);
            $sqlMensaje = $this->db->select("SELECT " . $lng . "_mensaje as mensaje FROM mensajes where seccion = 'formulario_mensaje_enviado';");
            $data = array(
                'type' => 'success',
                'content' => '<div class="alert alert_success">
                                    <i class="alert_icon fa fa-thumbs-up"></i>
                                    <div class="alert_desc">
                                             ' . utf8_encode($sqlMensaje[0]['mensaje']) . '
                                    </div>
                            </div>'
            );
        } else {
            $sqlMensaje = $this->db->select("SELECT " . $lng . "_mensaje as mensaje FROM mensajes where seccion = 'formulario_mensaje_error';");
            $data = array(
                'type' => 'error',
                'content' => '<div class="alert alert_error">
                                <i class="alert_icon fa fa-remove"></i>
                                <div class="alert_desc">
                                         ' . utf8_encode($sqlMensaje[0]['mensaje']) . '
                                </div>
                        </div>'
            );
        }
        return $data;
    }

}
