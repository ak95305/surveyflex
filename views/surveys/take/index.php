<div class="container mt-5">
	<form action="<?= base_url("survey/save") ?>" method="post">
	<?php if(isset($surveys['questions']) && $surveys['questions']): ?>
		<?php foreach($surveys['questions'] as $key => $val): ?>
			<?php if($val['type'] == 'single_select'): ?>
				<?php include(base_path("views/surveys/take/questions/single_select.php")); ?>
			<?php elseif($val['type'] == 'multiple_select'): ?>
				<?php include(base_path("views/surveys/take/questions/multiple_select.php")); ?>
			<?php elseif($val['type'] == 'text_based'): ?>
				<?php include(base_path("views/surveys/take/questions/text_based.php")); ?>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

	<button class="btn btn-primary" type="submit">Submit</button>
	</form>
</div>