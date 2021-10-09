<div class="main-login">
    <div class="container-left-login">
        <div class="container-left-login-img">
            <img src="<?php echo base_url(); ?>assets/images/login.svg" alt="Login Image">
        </div>
    </div>

    <div class="container-right-login">
        <form method="post" action="<?= base_url() ?>index.php/login/signin">
            <h2>Q&A Lab</h2>

            <div class="group-login">
                <p>Entrar no sistema</p>

                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Senha" name="password" required />
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>

    <?php if ($error) : ?>
        <div class="error-login">
            <div>
                <img src="<?php echo base_url(); ?>assets/icons/error.svg" alt="">
                <p><?php print_r($error); ?></p>
                <button class="stop-error-login">Fechar</button>
            </div>
        </div>
    <?php endif; ?>


</div>