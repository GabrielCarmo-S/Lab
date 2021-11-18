<?php
$session = $_SESSION['logged_user'];
$name = $session['name'];
?>

<div class="navbar">
    <div>
        <h1>Q&A Lab</h1>
    </div>

    <div class="dropdown navbar-img-user">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff">
            <img src="<?php echo base_url(); ?>assets/icons/avatar.svg" alt="">
            <?php print_r($name); ?>
        </button>

        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton" style="top: 80px">
            <a href="<?= base_url('') ?>index.php/user/index/<?php echo $session['id_user'] ?>" style="width:100%; display: flex; align-items: center; justify-content: center">Perfil</a>
            <a href="<?= base_url('') ?>index.php/login/logout" style="width:100%; display: flex; align-items: center; justify-content: center">Sair</a>
        </div>
    </div>
</div>