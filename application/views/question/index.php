<?php
$session = $_SESSION['logged_user'];
$name = $session['name'];
?>

<div class="main-home">

	<?php foreach ($category as $cat) { ?>
		<h1><?php echo $cat['name']; ?></h1>
	<?php } ?>

	<form action="<?= base_url() ?>index.php/question/store/<?php echo $id_category; ?>" method="post">
		<div class="category-home" id="question_container">
			<textarea class="question-input" name="question" rows="2" placeholder="O que você quer perguntar?"></textarea>

			<div class="group-icon">
				<div class="group-send-home">
					<button type="submit" class="" style="border: 0; background: transparent;"><img src="<?php echo base_url(); ?>assets/icons/Vector.svg" /> </button>
				</div>
			</div>

		</div>
	</form>
	<?php
	$i = 0;
	foreach ($questions as $question) {
		$i++; ?>
		<div class="category-home">
			<div class="category-user-home">
				<h2><?php print_r($question['question']); ?></h2>

				<div class="group-icon">
					<div class="group-user-home">
					</div>
					<div class="group-send-home" id="button-actions-home">
						<a href="<?php echo base_url(); ?>index.php/response/index/<?php echo $question['id_question'] ?>/<?php echo $question['id_category'] ?>" style="border: 0; background: transparent;"><img src="<?php echo base_url(); ?>assets/icons/message.svg" /></a>
						<?php if ($session['id_user'] == $question['id_user']) { ?>
							<a href="<?php echo base_url(); ?>index.php/question/destroy/<?php echo $question['id_question'] ?>/<?php echo $question['id_category'] ?>" style="border: 0; background: transparent;"><img src="<?php echo base_url(); ?>assets/icons/delete.svg" /></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>