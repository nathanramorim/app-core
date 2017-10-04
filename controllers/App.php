<?php
namespace App;
Use App\Number;
Use App\Curso;
Use App\Assets;
Use App\Routes;



/** ================================================================
*    CLASSE APP   
*    Responsável pelo funcionamento core da aplicação,
*    esta instância todos as outras classes utilizadas pela aplicação.
*    @return object $title: é o nome exibido pela página
*    @return object $number: responsável por tratar números (validação e formatação)
*    @return object $assets: responsável pelo carregamento de utilizáveis (css,js,img, etc.)
*    @return object $route: responsável pelo carregamento de cada página da aplicação.
*=====================================================================*/

class App extends Curso{
    public $number;
    public $assets;
    public $route;
    public $title;

    function __construct(){
        
        $this->title = SITE_NAME;
        $this->number = new Number();
        $this->assets = new Assets();
        $this->route = new Routes();
    }
    
}
