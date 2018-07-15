<?php

class Blog_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function listado($lng, $pagina) {
        if (!empty($pagina)) {
            $page = $pagina;
        } else {
            $page = 1;
        }
        $setLimit = CANT_REG;
        $pageLimit = ($setLimit * $page) - $setLimit;
        if ($lng == 'es') {
            $sql = $this->db->select("SET lc_time_names = 'es_ES';");
        }
        $sql = $this->db->select("SELECT
                                        id,
                                        " . $lng . "_titulo as titulo,
                                        " . $lng . "_contenido as contenido,
                                        DATE_FORMAT(fecha_blog,'%M %3, %Y') as fecha,
                                        imagen_thumb as imagen,
                                        youtube_id as video,
                                        " . $lng . "_tags as tags
                                FROM
                                        blog
                                WHERE
                                        estado = 1
                                ORDER BY
                                        fecha_blog DESC
                                 LIMIT $pageLimit, $setLimit;");
        $listado = array();
        $campo = $lng . '_titulo';
        foreach ($sql as $item) {
            $tags = explode(',', utf8_encode($item['tags']));
            $tag = '';
            foreach ($tags as $val) {
                $tag .= '<a href="#" rel="tag"><span>' . $val . '</span></a>,';
            }
            $tag = substr($tag, 0, -1);
            array_push($listado, array(
                'id' => $item['id'],
                'titulo' => utf8_encode($item['titulo']),
                'contenido' => utf8_encode($item['contenido']),
                'tags' => $tag,
                'video' => utf8_encode($item['video']),
                'imagen' => utf8_encode($item['imagen']),
                'fecha' => $item['fecha'],
                'url' => $this->helper->armaUrl($item['id'], 'blog', $campo, $lng)
            ));
        }
        $data = array(
            'listado' => $listado,
            'paginador' => $this->helper->mostrarPaginador($setLimit, $page, 'blog', 'blog/listado', $lng)
        );
        return $data;
    }

    public function post($lng, $id) {
        if ($lng == 'es') {
            $sql = $this->db->select("SET lc_time_names = 'es_ES';");
        }
        $sql = $this->db->select("SELECT
                                        " . $lng . "_titulo as titulo,
                                        " . $lng . "_contenido as contenido,
                                        DATE_FORMAT(fecha_blog,'%M %3, %Y') as fecha,
                                        imagen,
                                        youtube_id as video,
                                        " . $lng . "_tags as tags,
                                        imagen_header
                                FROM
                                        blog
                                WHERE
                                        id = $id");
        if (!empty($sql[0]['imagen_header'])) {
            $imagenHeader = utf8_encode($sql[0]['imagen_header']);
        } else {
            $cabecera = $this->dataHeader($lng);
            $imagenHeader = utf8_encode($cabecera['imagen_header']);
        }
        $data = array(
            'titulo' => utf8_encode($sql[0]['titulo']),
            'contenido' => utf8_encode($sql[0]['contenido']),
            'description' => substr(strip_tags(utf8_encode($sql[0]['contenido'])), 0, 300),
            'keywords' => utf8_encode($sql[0]['tags']),
            'fecha' => utf8_encode($sql[0]['fecha']),
            'imagen' => utf8_encode($sql[0]['imagen']),
            'video' => utf8_encode($sql[0]['video']),
            'imagen_header' => $imagenHeader
        );
        return $data;
    }

    public function dataHeader($lng) {
        $sql = $this->db->select("SELECT imagen_header, " . $lng . "_header as titulo FROM blog_header;");
        return $sql[0];
    }

}
