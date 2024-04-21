<?php

include(base_path("models/SurveysModel.php"));
include(base_path("models/AnswersModel.php"));

class WelcomeController extends SiteController{
	public $surveyModel;
	public $answersModel;

	function __construct()
	{
		parent::__construct();
		$this->surveyModel = new SurveyModel();
		$this->answersModel = new AnswersModel();
	}

	public function index()
	{
		if(isset($_SESSION['user']) && $_SESSION['user'] && isset($_SESSION['user']['type']) && $_SESSION['user']['type'] != 1)
		{
			// Get All Surveys
			$surveys = $this->surveyModel->getListing();

			foreach($surveys as $key => $val)
			{
				$answer = $this->answersModel->getWhere(['answers.id'], [
					'answers.survey_id' => $val['id'],
					'answers.user_id' => isset($_SESSION['user']) && $_SESSION['user'] ? $_SESSION['user']['id'] : null
				]);

				if(isset($answer) && $answer && !empty($answer) && count($answer) > 0)
				{
					$surveys[$key]['taken'] = true;
				}
			}
		}

		$this->adminLayout("welcome", [
			"surveys" =>  isset($surveys) && $surveys ? $surveys : []
		]);
	}
}

