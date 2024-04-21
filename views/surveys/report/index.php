<div class="container mt-5">
	<h1>
		Surveys Report
	</h1>
</div>

<?php if(isset($surveys) && $surveys): ?>
<div class="container mt-5">
	<div class="row">
	<?php foreach($surveys as $key => $val): ?>
	  <div class="col-sm-4">
	    <div class="card mb-4">
	      <div class="card-body">
	        <h5 class="card-title"><?= $val['title'] ?></h5>
	        <p class="card-text"><?= $val['description'] ?></p>
	        <a href="<?= base_url("survey/report/{$val['id']}") ?>" class="btn btn-primary">View</a>
	      </div>
	    </div>
	  </div>
	<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>