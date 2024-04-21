<div class="container mt-5">
	<?php if(isset($surveys['questions']) && $surveys['questions']): ?>
		<?php foreach($surveys['questions'] as $key => $val): ?>
			<?php if($val['type'] == 'single_select'): ?>
				<?php include(base_path("views/surveys/report/questions/single_select.php")); ?>
			<?php elseif($val['type'] == 'multiple_select'): ?>
				<?php include(base_path("views/surveys/report/questions/multiple_select.php")); ?>
			<?php elseif($val['type'] == 'text_based'): ?>
				<?php include(base_path("views/surveys/report/questions/text_based.php")); ?>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</div>