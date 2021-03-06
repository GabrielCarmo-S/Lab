<?php
$session = $_SESSION['logged_user'];
$name = $session['name'];
?>

<div class="main-home">

	<?php foreach ($category as $cat) { ?>
		<h1><?php echo $cat['name']; ?></h1>
	<?php } ?>

	<form action="<?= base_url() ?>index.php/response/store/<?php echo $id_question  ?>/<?php echo $id_category ?>" method="post">
		<div class="category-home" id="question_container">
			<textarea class="question-input" name="answer" rows="2" placeholder="Responda aqui"></textarea>

			<div class="group-icon">
				<div class="group-user-home">
				</div>
				<div class="group-send-home">
					<button type="submit" class="" style="border: 0; background: transparent;"><img src="<?php echo base_url(); ?>assets/icons/Vector.svg" /> </button>
				</div>
			</div>

		</div>
	</form>
	<?php
	$i = 0;
	foreach ($responses as $response) {
		$i++; ?>
		<div class="category-home">
			<div class="category-user-home">
				<h2><?php print_r($response['answer']); ?></h2>

				<div class="group-icon">
					<div class="group-user-home">
					</div>
					<div class="group-send-home" id="button-actions-home">
						<?php if ($session['id_user'] == $response['id_user']) { ?>
							<a href="<?php echo base_url(); ?>index.php/response/destroy/<?php echo $response['id_answer'] ?>/<?php echo $id_question  ?>/<?php echo $id_category ?>" style="border: 0; background: transparent;"><img src="<?php echo base_url(); ?>assets/icons/delete.svg" /></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>