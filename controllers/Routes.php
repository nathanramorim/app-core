<?php
namespace App;

/** ================================================================
*    CLASSE ROUTE  
*    responsável pelo carregamento de cada página da aplicação.
*    @method url()
*    @return retorna a página parametrada
*    este caso foi específico para esta App.   
*=====================================================================*/

class Routes {

    public function url($get){
        if(!isset($_GET['id'])){
            include_once('./templates/home.php');
        }else{
            require_once('./templates/curso.php');
        }
    }

}