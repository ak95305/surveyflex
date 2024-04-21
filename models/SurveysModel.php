<?php

class SurveyModel extends SiteModel{
	function __construct()
	{
		parent::__construct();
		$this->table_name = "survey_set";
	}

	public function create($data)
	{
		$data['date_created'] = date("Y-m-d");
		return $this->insert($data);
	}

	public function getListing()
	{
		return $this->select(['*'])->order_by("id", "desc")->get_array();
	}

	public function remove($id)
	{
		$this->where(['id' => $id])->delete();
	}

	public function getRow($id)
	{
		return $this->select(['*'])->where(['id' => $id])->get();
	}

	public function edit($id, $data)
	{
		$this->where(['id' => $id])->update($data);
	}
}

