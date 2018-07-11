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
//        $setLimit = CANT_REG;
//        $pageLimit = ($setLimit * $page) - $setLimit;
//        $sql = $this->db->select("select *
//                                 from web_blog b 
//                                 ORDER BY b.id desc
//                                 LIMIT $pageLimit, $setLimit");
//        $data = array(
//            'listado' => $sql,
//            'paginador' => $this->helper->mostrarPaginador($setLimit, $page, 'web_blog', 'blog/listado')
//        );
        $data = '';
        return $data;
    }

}
