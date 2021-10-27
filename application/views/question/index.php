<?php
$session = $_SESSION['logged_user'];
$name = $session['name'];
?>

<div class="main-home">

    <h1>Estrutura de Dados Q&A</h1>

    
    <form action="<?= base_url()?>index.php/question/store/<?php echo $id_category; ?>" method="post">
    <div class="category-home" id="question_container">
        <input class="question-input" name="question" placeholder="O que você quer perguntar?">
               
        <div class="group-icon">
        <div class="group-user-home">
            <img src="<?php echo base_url(); ?>assets/icons/avatar.svg" alt="">
             <?php print_r($name); ?>
            </div>
            <button type="submit" class="" style="border: 0; background: transparent;"><i class="fas fa-location-arrow"></i></button>
        </div>
       
 </div>
    </form>
    <?php foreach ($questions as $question) { ?>
        <div class="category-home">
            <div class="category-user-home">
                <h2><?php print_r($question['question']); ?></h2>

                <div class="group-user-home">
                    <img src="<?php echo base_url(); ?>assets/icons/avatar.svg" alt="">
                    <?php print_r($name); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>