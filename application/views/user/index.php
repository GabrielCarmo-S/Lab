<?php
$session = $_SESSION['logged_user'];
$name = $session['name'];
?>

<div class="main-home">
  <form action="<?= base_url() ?>index.php/user/update/<?= $session['id_user'] ?>" method="post">
    <div class="container" style="display: flex; justify-content: center; align-items: center; flex-direction: column;row-gap: 20px">
      <h5 class="">Informações do Perfil</h5>
      <div class="col-6">
        <label for="nome" style="color: #fff">Nome</label>
        <input type="text" class="form-control" name="name" value="<?php echo $users['name'] ?>" placeholder="Digite o nome: ">
      </div>


      <div class="col-6">
        <label for="email" style="color: #fff">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $users['email'] ?>" placeholder="Email">
      </div>


      <div>
        <button class="btn" type="submit" style="background: #835AFD; color: #fff">Confirmar</button>
      </div>

    </div>
  </form>
</div>