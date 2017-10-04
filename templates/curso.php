<?php
/** =======================================================
*   VALIDAÇÃO DAS VARIÁVEIS @param $app
*   instância do core da App
*   =======================================================*/
$app = (isset($_SESSION['app'])) ? $_SESSION['app'] : false;


/** =======================================================
*   VALIDAÇÃO DAS VARIÁVEIS @param $_GET
*   =======================================================*/
$id = (isset($_GET['id'])) ? $_GET['id'] : false;
$curso = (isset($_GET['curso'])) ? $_GET['curso'] : false;
$preco = (isset($_GET['preco'])) ? $_GET['preco'] : false;

?>

<section class = "container">
    
    <!-- [INICIO] espaço para a mensagem de validação -->
    <article id="msg" class="msg"></article>
    <!-- [FIM] espaço para a mensagem de validação -->

    <!-- [INICIO] informações do curso ID, NOME e PREÇO -->
    <header class="row">
            <article class="col-md-12 col-sm-12 col-xs-12">
            <strong><?php echo $curso ?> | <?php echo 'R$'.$preco ?></strong>
            </article>
            <article class="col-md-12 col-sm-12 col-xs-12">
            <small><?php echo 'REF.:'.$id ?></small><br>
            </article>
    </header>
    <!-- [FIM] informações do curso ID, NOME e PREÇO -->

    <!-- [INICIO] espaço para a mensagem de validação -->
    <article class="row">
        <?php if (!empty($id)) :?>
        <!-- [INICIO] carregando as informações do curso -->
        <?php $grade = $app->get_info_by_id($id) ?>
        <?php endif ?>
        <?php if ($grade) : ?>
            <?php foreach ($grade as $texto) : ?>

            <!-- [INICIO] box com as informações do curso [grade] -->
            <section id="box-grade" class="col-md-12 col-sm-12 col-xs-12">
                <article class="alert alert-warning w100">
                <?php $content = str_replace('</strong>','</strong><br>',$texto['meta_value']) ?>
                <?php $content = str_replace('<strong>','<br><strong>',$content) ?>
                <?php echo utf8_encode($content) ?>
                </article>
            </section>
            <!-- [FIM] box com as informações do curso [grade] -->

            <?php endforeach ?>
        <?php endif ?>
        <!-- [FIM] carregando as informações do curso -->

        <!-- [INICIO] box editar  informações do curso [grade] -->
        <section id="box-editar" class="w100 justify-content-end col-md-12 col-sm-12 col-xs-12">
                <form action="" id="form-editar-grade" method="post">
                    <textarea name="grade" class="jqte-test"><?=utf8_encode($content)?></textarea>
                    <input type="hidden" name="id" id="id" value="<?=$id?>">
                    <input type="hidden" name="back" value="<?=$_SESSION['back']?>">
                    <box class="w100 justify-content-end">
                        <button id="open-box-grade" type="button" class="btn btn-sm btn-danger">Voltar</button>
                        <button id="btn-atualizar" type="submit" class="btn btn-sm btn-success" visibility="false">Atualizar</button>
                    <box>
                </form>
        </section>
        <!-- [FIM] box editar  informações do curso [grade] -->
        
        <!-- [INICIO] buttons box grade -->
        <section id="btn-box-grade" class="w100 justify-content-end col-md-12 col-sm-12 col-xs-12">
                <a href="./" class="btn btn-sm btn-danger">Voltar</a>
                <button type="button" id="btn-editar" class="btn btn-sm  btn-primary">Editar</button>
        </section>
        <!--[FIM]  buttons box grade -->
        
    </article>
</section>