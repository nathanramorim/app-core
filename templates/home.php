<?php
/** =======================================================
*   INCLUSÃO DO CORE DA APP 
*   =======================================================*/
$_SESSION['back'] = $_SERVER['REQUEST_URI'];
$app = $_SESSION['app'];
?>

<!--[INICIO] box de busca -->
<input type="text" id="myInput" onkeyup="filter_search()" placeholder="Procure o curso...">
<!--[FIM] box de busca -->

<!--[INICIO] LISTA DE CURSOS ENCONTRADOS -->
<ul id="myUL">
    <!-- [INICIO] carregando as informações dos cursos -->
    <?php $selected = $app->get_info(); ?>
    <?php foreach ($selected as $curso) : ?>
    <?php $id = $curso['ID']?>
    <?php $price = $app->number->formata_preco($curso['meta_value'],',')?>
    <?php $curso = $curso['post_title']?>
        <?php if (!empty($curso) && !empty($price)) : ?>
        <li id="curso">  
                <a href="<?php echo 'curso.php?id='.$id.'&curso='.utf8_encode($curso).'&preco='.utf8_encode($price) ?>">
                    <strong><search><?php echo utf8_encode($curso) ?></search> | <?php echo 'R$ '.utf8_encode($price) ?></strong>  
                </a>
        </li>
        <?php endif ?>
    <?php endforeach; ?> 
    <!-- [FIM] carregando as informações dos cursos -->
</ul>
<!--[FIM] LISTA DE CURSOS ENCONTRADOS -->
    

