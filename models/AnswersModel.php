<?php

class AnswersModel extends SiteModel{
	function __construct()
	{
		parent::__construct();
		$this->table_name = "answers";
	}

	public function create($data)
	{
		$data['date_created'] = date("Y-m-d");
		return $this->insert($data);
	}

	public function getListing()
	{
		return $this->select(['*'])->get_array();
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

	public function getWhere($select = ['*'], $where = [])
	{
		return $this->select($select)->where($where)->get_array();
	}
}

