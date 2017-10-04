<?php 
/** =======================================================
*   INCLUSÃO DO CORE DA APP 
*   =======================================================*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once ('./vendor/autoload.php');
    Use App\App;   
    
    $app = new App;

    session_start();
    $_SESSION['app'] = $app;
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?=$app->title?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- [INICIO] include assets (css) -->
        <?php $app->assets->get_css(); ?>
        <!-- [FIM] include assets (css) -->

       
    </head>
    <body>
        <div class="wrapper container-fluid ">
            <!-- [INICIO] include header content @logo && @business_information -->
            <header class="row">
                <img src="<?=constant('HEADER_LOGO')?>"class="mx-auto d-block" alt="interclasse">
            </header>
            <!-- [FIM] include header content @logo && @business_information -->

            <!-- [INICIO] include content -->
            <section>
                <?php $app->route->url(URI) ?>
            </section>
            <!-- [FIM] include content -->
        </div>
            <!-- [INICIO] include footer -->
            <footer class="col-md-12">
            <article class="text-center"> 
                <span>Copyright (c) 2017 <?=constant('COPY_NAME')?> . Todos os direitos reservados. Termos de uso e privacidade.</span>
            </article>
            </footer>
            <!-- [FIM] include footer -->

            <!-- [INICIO] include assets (scripts) -->
            <?php $app->assets->get_scripts(); ?>
            <!-- [FIM] include assets (scripts) -->
        
    </body>
    
</html>