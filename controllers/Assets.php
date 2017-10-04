<?php

namespace App;

/** ================================================================
*    CLASSE ASSETS   
*    responsável pelo carregamento de utilizáveis (css,js)
*    ---------------------------------------------------------------
*    @method get_css()
*    responsável por carregar os estilos utilizados na App 
*    ---------------------------------------------------------------
*    @method get_scripts()
*    responsável por carregar os scripts utilizados na App 
*=====================================================================*/

class Assets {

    public function get_css(){
        include_once('./templates/css.php');
    }

    public function get_scripts(){
        include_once('./templates/scripts.php');
    }
}