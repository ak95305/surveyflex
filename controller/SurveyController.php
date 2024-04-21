<?php
	
include(base_path("models/SurveysModel.php"));
include(base_path("models/QuestionsModel.php"));
include(base_path("models/AnswersModel.php"));

class SurveyController extends SiteController{
	public $surveyModel;
	public $questionModel;
	public $answersModel;

	function __construct()
	{
		parent::__construct();
		$this->surveyModel = new SurveyModel();
		$this->questionModel = new QuestionModel();
		$this->answersModel = new AnswersModel();
	}

	public function index()
	{
		$getSurveys = $this->surveyModel->getListing();

		$this->adminLayout("surveys/list", [
			"surveys" => $getSurveys
		]);
	}

	public function add()
	{
		if(isset($_POST) && $_POST)
		{
			$questions = $_POST['question'];
			unset($_POST['question']);

			$insertId = $this->surveyModel->create($_POST);

			if(isset($insertId) && $insertId)
			{
				unset($questions['{{key}}']);
				foreach($questions as $key => $value)
				{
					unset($value['ans_id'][0]);
					$value['question'] = $value['title'];
					$value['survey_id'] = $insertId;

					if(isset($value['ans_id']) && $value['ans_id'])
					{
						$value['frm_option'] = json_encode($value['ans_id']);
						unset($value['ans_id']);
					}

					unset($value['title']);

					pr($value);
					$questionInsertId = $this->questionModel->create($value);
				}
			}

			header("Location: ".base_url("survey"));
			die;
		}

		$this->adminLayout("surveys/add");
	}

	public function delete($id)
	{
		$this->surveyModel->remove($id);

		header("Location: ".base_url("survey"));
		die;
	}

	public function edit($id)
	{
		if(isset($_POST) && $_POST)
		{
			if(isset($_POST['password']) && $_POST['password'] != "")
			{
				$_POST['password'] = md5($_POST['password']);
			}
			else 
			{
				unset($_POST['password']);
			}

			$questions = $_POST['question'];
			unset($_POST['question']);

			unset($questions['{{key}}']);

			$oldQuestions = $this->questionModel->getWhere(['questions.id'], ['questions.survey_id' => $id]);
			$oldQuestions = array_column($oldQuestions, 'id');

			// Delete Old Questions
			foreach ($oldQuestions as $k1 => $v1) {
				$this->questionModel->remove($v1);
			}
			
			foreach($questions as $key => $value)
			{
				unset($value['ans_id'][0]);
				$value['question'] = $value['title'];
				$value['survey_id'] = $id;

				if(isset($value['ans_id']) && $value['ans_id'])
				{
					$value['frm_option'] = json_encode($value['ans_id']);
					unset($value['ans_id']);
				}

				unset($value['title']);

				$questionInsertId = $this->questionModel->create($value);
			};

			$this->surveyModel->edit($id, $_POST);

			header("Location: ".base_url("survey"));
			die;
		}

		// Get Survey
		$survey = $this->surveyModel->getRow($id);

		// Get Questions
		$questions = $this->questionModel->getWhere(['questions.*'], ['questions.survey_id' => $id]);
		
		if(isset($questions) && $questions && is_array($questions) && count($questions) > 0)
		{
			foreach($questions as $k => $v)
			{
				if(isset($v['frm_option']) && $v['frm_option'] != "")
				{
					$questions[$k]['frm_option'] = json_decode($v['frm_option'], true);
				}
			}
	 		$survey['questions'] = $questions;
		}
		else
		{
	 		$survey['questions'] = [];
		}

		// pr($survey['questions']);die;

		$this->adminLayout("surveys/edit", [
			"survey" => $survey
		]);
	}

	public function take($id)
	{
		// Get Survey
		$survey = $this->surveyModel->getRow($id);

		// Get Questions
		$questions = $this->questionModel->getWhere(['questions.*'], ['questions.survey_id' => $id]);
		
		if(isset($questions) && $questions && is_array($questions) && count($questions) > 0)
		{
			foreach($questions as $k => $v)
			{
				if(isset($v['frm_option']) && $v['frm_option'] != "")
				{
					$questions[$k]['frm_option'] = json_decode($v['frm_option'], true);
				}
			}
	 		$survey['questions'] = $questions;
		}
		else
		{
	 		$survey['questions'] = [];
		}

		$this->adminLayout("surveys/take/index", [
			'surveys' => $survey
		]);
	}

	public function save()
	{
		if(isset($_POST) && $_POST)
		{
			$answers = $_POST['answer'];
			if(isset($answers) && $answers)
			{
				foreach($answers as $Sk => $Sv)
				{
					$survey_id = $Sk;

					foreach($Sv as $Qk => $Qv)
					{
						$question_id = $Qk;

						$answer = json_encode($Qv);

						$answer_data = [
							'survey_id' => $survey_id,
							'question_id' => $question_id,
							'answer' => $answer,
							'user_id' => isset($_SESSION['user']) && $_SESSION['user'] && isset($_SESSION['user']['id']) && $_SESSION['user']['id'] ? $_SESSION['user']['id'] : null
						];

						$this->answersModel->insert($answer_data);

					}
				}
				
				header("Location: ".base_url("welcome"));
				die;
			}
		}
	}

	public function report($id = null)
	{
		if(isset($id) && $id)
		{
			// Get Survey
			$survey = $this->surveyModel->getRow($id);

			// Get Questions
			$questions = $this->questionModel->getWhere(['questions.*'], ['questions.survey_id' => $id]);
			
			if(isset($questions) && $questions && is_array($questions) && count($questions) > 0)
			{
				foreach($questions as $k => $v)
				{
					if(isset($v['frm_option']) && $v['frm_option'] != "")
					{
						$questions[$k]['frm_option'] = json_decode($v['frm_option'], true);
					}

					$questions[$k]['answer_data'] = [];

					$questions[$k]['answers'] = $this->answersModel->getWhere(['answers.answer'], [
						'answers.survey_id' => $id,
						'answers.question_id' => $v['id']
					]);

					foreach($questions[$k]['answers'] as $kA => $vA)
					{
						$answers = isset($vA['answer']) && $vA['answer'] && $vA['answer'] != "" ? json_decode($vA['answer']) : null;

						if(isset($answers) && $answers && is_array($answers))
						{
							foreach($answers as $kD => $vD)
							{
								if(isset($vD) && $vD && in_array($vD, $questions[$k]['frm_option']))
								{
									if(isset($questions[$k]['answer_data'][$vD]) && $questions[$k]['answer_data'][$vD])
									{
										$questions[$k]['answer_data'][$vD]++;
									}
									else
									{
										$questions[$k]['answer_data'][$vD] = 1;
									}
								}
							}
						}
						elseif(isset($answers) && $answers)
						{
							if(isset($answers) && $answers && is_array($questions[$k]['frm_option']) && in_array($answers, $questions[$k]['frm_option']))
							{
								if(isset($questions[$k]['answer_data'][$answers]) && $questions[$k]['answer_data'][$answers])
								{
									$questions[$k]['answer_data'][$answers]++;
								}
								else
								{
									$questions[$k]['answer_data'][$answers] = 1;
								}
							}
						}
					}
				}
		 		$survey['questions'] = $questions;
			}
			else
			{
		 		$survey['questions'] = [];
			}
			
			$this->adminLayout("surveys/report/view", [
				'surveys' => $survey
			]);
		}
		else
		{
			// Get All Surveys
			$surveys = $this->surveyModel->getListing();

			$this->adminLayout("surveys/report/index", [
				"surveys" =>  isset($surveys) && $surveys ? $surveys : []
			]);
		}

	}
}

