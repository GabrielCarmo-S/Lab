<?php
$session = $_SESSION['logged_user'];
$name = $session['name'];
?>

<div class="navbar">
    <div>
        <h1>Q&A Lab</h1>
    </div>
    <div class="navbar-img-user">
        <img src="<?php echo base_url(); ?>assets/icons/avatar.svg" alt="">
        <?php print_r($name); ?>

        <div class="navbar-signout">
            <h1>Sair</h1>
        </div>
    </div>


</div>