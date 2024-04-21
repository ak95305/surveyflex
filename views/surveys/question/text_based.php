<div class="ques_container border mb-4 rounded p-3 text_based" data-key="<?= isset($key) && $key != '' && $key >= 0 ? $key : 0 ?>">
	<b>[Text Based Question]</b>
	<div class="title mt-2">
		<label>Question Title</label>
		<input type="hidden" class="form-control" name="question[<?= isset($key) && $key != '' && $key >= 0 ? $key : '{{key}}' ?>][type]" value="text_based" placeholder="Title">
		<input type="text" class="form-control" value="<?= isset($value['question']) && $value['question'] ? $value['question'] : '' ?>" name="question[<?= isset($key) && $key != '' && $key >= 0 ? $key : '{{key}}' ?>][title]" placeholder="Title">
	</div>
</div>