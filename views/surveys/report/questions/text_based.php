<div class="ques_container border mb-4 rounded p-3 single_select">
	<b>[Text Based Question]</b>
	<div class="title mt-2">
		<label><?= $val['question'] ?></label>
	</div>

	<div class="options mt-3">
	  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#responses">
	    Show Responses
	  </button>
		<div class="collapse mt-2" id="responses">
			<?php foreach($val['answers'] as $kT => $vT): ?>
			  <div class="card card-body mt-2">
			  	<?= $vT['answer'] ?>
			  </div>
			<?php endforeach; ?>
		</div>
	</div>
</div>