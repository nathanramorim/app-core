<?php 
namespace Config {

/** ================================================================
*    Endereço de um recurso disponível em uma rede   
*    Recebe o url referênciado no navegador
*=====================================================================*/

define('URI',$_SERVER['REQUEST_URI']);

/** ================================================================
*    Localização das PASTAS    
*    @PATH_IMG: diretório de imagens
*    @PATH_CSS: diretório de estilos (css)
*    @PATH_JS: diretório de scripts (js)
*    @PATH_ASSETS: diretório root de utilizáveis (css,js,img, etc.)
*    @AUTOLOAD: carrega o autoload
*=====================================================================*/
define('PATH_ASSETS','./assets/');
define('PATH_IMG','./assets/img/');
define('PATH_CSS','./assets/css/');
define('PATH_JS','./assets/js/');
define('AUTOLOAD','./vendor/autoload.php');

/** ================================================================
*    HEADER LOGO    
*    Responsável por carregar a logo que fica no cabeçalho da página
*    @site_name: nome que aparecerá no titulo dá sua página
*    @url_logo: nome do arquivo da logo ex.: logo.png
*=====================================================================*/
$site_name = 'Nathan Amorim';
$url_logo = '';
$copyright = 'Nathan Amorim';

define('SITE_NAME',$site_name);
define('HEADER_LOGO',PATH_IMG.$url_logo);
define('COPY_NAME',$copyright);


/** ================================================================
*    Configurações para acessar o banco de dados:    
*    @servername: servidor host
*    @db_name: nome do banco que deseja acessar  
*    @username: nome de usuário para credenciamento no banco
*    @pass: senha de acesso
*    @prefix: de uso exclusivo para bancos do Wordpress cujo cada instalação é definida um prefixo para tabela a ser criada no banco, o default é wp_
*=====================================================================*/

define('servername','localhost');
define('db_name','');
define('username','root');
define('pass', 'root');
define('prefix', '');

}