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
            <a href="<?= base_url()?>index.php/login/register">Criar Conta</a>
        </form>
    </div>
</div>