<div class="ques_container border mb-4 rounded p-3 multiple_select" data-key="<?= isset($key) && $key != '' && $key >= 0 ? $key : 0 ?>">
	<b>[Multiple Select Question]</b>
	<div class="title mt-2">
		<label>Question Title</label>
		<input type="hidden" class="form-control" name="question[<?= isset($key) && $key != '' && $key >= 0 ? $key : '{{key}}' ?>][type]" value="multiple_select" placeholder="Title">
		<input type="text" class="form-control" value="<?= isset($value['question']) && $value['question'] ? $value['question'] : '' ?>" name="question[<?= isset($key) && $key != '' && $key >= 0 ? $key : '{{key}}' ?>][title]" placeholder="Title">
	</div>

	<div class="options mt-3">
		<label>Options</label>
		<div class="opt_clone d-none">
			<div class="row mt-2">
				<div class="col-10">
					<input type="text" class="form-control" name="question[<?= isset($key) && $key != '' && $key >= 0 ? $key : '{{key}}' ?>][ans_id][]" placeholder="Option">
				</div>
				<div class="col-2">
					<i class="ion-close text-danger remove_opt"></i>
				</div>
			</div>
		</div>
		<div class="option_list">
			<?php if(isset($value['frm_option']) && $value['frm_option']): ?>
			<?php foreach($value['frm_option'] as $k => $v): ?>
			<div class="row mt-2">
				<div class="col-10">
					<input type="text" class="form-control" value="<?= isset($v) && $v ? $v : '' ?>" name="question[<?= $key ?>][ans_id][]" placeholder="Option">
				</div>
				<div class="col-2">
					<i class="ion-close text-danger remove_opt"></i>
				</div>
			</div>
			<?php endforeach; ?>
			<?php else: ?>
			<div class="row mt-2">
				<div class="col-10">
					<input type="text" class="form-control" name="question[{{key}}][ans_id][]" placeholder="Option">
				</div>
				<div class="col-2">
					<i class="ion-close text-danger remove_opt"></i>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="btn btn-sm btn-success mt-2 add_opt">+ Add Option</div>
	</div>
</div>