<div class="ques_container border mb-4 rounded p-3 single_select">
	<b>[Single Select Question]</b>
	<div class="title mt-2">
		<label><?= $val['question'] ?></label>
	</div>

	<div class="options mt-3">
		<ul>
			<?php foreach($val['frm_option'] as $k => $v): ?>
				<li>
					<input type="radio" value="<?= $v ?>" name="answer[<?= $surveys['id'] ?>][<?= $val['id'] ?>]" id="<?= $val['id'].$k ?>_option">
					<label for="<?= $val['id'].$k ?>_option"><?= $v ?></label>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>