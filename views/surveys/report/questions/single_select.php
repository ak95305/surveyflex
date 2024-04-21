<div class="ques_container border mb-4 rounded p-3 single_select">
	<b>[Single Select Question]</b>
	<div class="title mt-2">
		<label><?= $val['question'] ?></label>
	</div>

	<div class="options mt-3">
		<ul>
			<?php foreach($val['frm_option'] as $k => $v): ?>
				<li class="mt-3">
					<label><?= $v ?></label>
					<div class="progress">
					  <?php
						  $total_sum = isset($val['answer_data']) && $val['answer_data'] && !empty($val['answer_data']) ? array_sum($val['answer_data']) : 0;
						  $percent = isset($val['answer_data'][$v]) && $val['answer_data'][$v] && isset($total_sum) && $total_sum ? ($val['answer_data'][$v] / $total_sum) * 100 : 0;
					  ?>
					  <div class="progress-bar" role="progressbar" style="width: <?= $percent ?>%;" aria-valuenow="<?= $percent ?>%" aria-valuemin="0" aria-valuemax="100"><?= $percent ?>%</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>