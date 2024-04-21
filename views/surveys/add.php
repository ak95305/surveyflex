<div class="container">
	<h3>Survey Manage</h3>

	<div class="module_heading mt-4">Add Survey</div>

	<form action="" method="post" id="surveyQuestion">
		<div class="row mt-3 gap-3">
			<div class="col-12">
				<input type="text" class="form-control" name="title" placeholder="Title">
			</div>
			<div class="col-12">
				<input type="text" class="form-control" name="description" placeholder="Description">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-6">
				<label>Start Date</label>
				<input type="date" class="form-control" name="start_date">
			</div>
			<div class="col-6">
				<label>End Date</label>
				<input type="date" class="form-control" name="end_date">
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-md-12">
				<h5>Question</h5>

				<div class="row">
					<div class="col-4">
						<div class="row position-sticky" style="top: 80px;">
							<div class="col-12">
								<select class="form-select form-select-sm" id="questionTypeSelect">
									<option selected>Select Question Type</option>
									<option value="single_select">Single Select Question</option>
									<option value="multiple_select">Multiple Select Question</option>
									<option value="text_based">Text Based</option>
								</select>
							</div>
							<div class="col-12">
								<div class="btn btn-primary btn-sm mt-3" id="addQuestion">Add Question</div>
							</div>
						</div>	
					</div>

					<div class="col-8">
						<div class="row">
							<div class="col-12">
								<div id="renderQuestion">
									<div class="question_types d-none">
										<?php include base_path("views/surveys/question/single_select.php"); ?>
										<?php include base_path("views/surveys/question/multiple_select.php"); ?>
										<?php include base_path("views/surveys/question/text_based.php"); ?>
									</div>									
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-12">
				<button class="btn btn-sm btn-primary ms-auto d-block">Add Survey</button>
			</div>
		</div>
	</form>
</div>