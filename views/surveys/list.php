<div class="container">
	<h3>Surveys Manage</h3>

	<div class="module_heading mt-4">Surveys Listing</div>

	<table class="table mt-3">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Title</th>
				<th scope="col">Description</th>
				<th scope="col">Start Date</th>
				<th scope="col">End Date</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($surveys) && $surveys && is_array($surveys) && count($surveys) > 0): ?>
			<?php foreach($surveys as $key => $value): ?>
			<tr>
				<th scope="row"><?= $value['id'] ?></th>
				<td><?= $value['title'] ?></td>
				<td style="width: 40%;"><?= substr($value['description'], 0, 50) . "..." ?></td>
				<td><?= $value['start_date'] ?></td>
				<td><?= $value['end_date'] ?></td>
				<td>
					<a href="<?= base_url("survey/edit/".$value['id']); ?>" class="text-primary">
						<i class="ion-android-create"></i>
					</a>
					<a href="<?= base_url("survey/delete/".$value['id']); ?>" onclick="return confirm('Do you want to delete this record?')" class="text-danger">
						<i class="ion-android-delete"></i>
					</a>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	
</div>