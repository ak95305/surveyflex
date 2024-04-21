<div class="container mt-5">
	<h1>
		Welcome to Survey Flex
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
	        <?php if(isset($val['taken']) && $val['taken']): ?>
	        <a href="javascript:;" class="btn btn-danger">Already Taken</a>
		    <?php else: ?>
	        <a href="<?= base_url("survey/take/{$val['id']}") ?>" class="btn btn-success">Take Survey</a>
		    <?php endif; ?>
	      </div>
	    </div>
	  </div>
	<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>