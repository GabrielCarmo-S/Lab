<?php
$session = $_SESSION['logged_user'];
$name = $session['name'];
?>

<div class="main-home">

    <h1>Seja Bem Vindo <?php print_r($name); ?></h1>

    <?php foreach ($categorias as $categoria) { ?>
        <a class="category-home" href="<?php echo base_url(); ?>index.php/question/index/<?php echo $categoria['id_category']?>">
            <div class="category-user-home">
                <h2><?php print_r($categoria['name']); ?></h2>

                <div class="group-user-home">
                    <img src="<?php echo base_url(); ?>assets/icons/avatar.svg" alt="">
                    <?php print_r($name); ?>
                </div>
            </div>
        </a>
    <?php } ?>
</div>