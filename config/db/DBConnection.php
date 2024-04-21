<?php
	
	class DBConnection {
		public $server;
		public $username;
		public $password;
		public $db_name;
		public $conn;

		function __construct()
		{
			$this->server = $_ENV['SERVER'];
			$this->username = $_ENV['USERNAME'];
			$this->password = $_ENV['PASSWORD'];
			$this->db_name = $_ENV['DB_NAME'];

			$this->connectDB();
		}

		function connectDB(){
			try{
				$servername = "mysql:host={$this->server};dbname={$this->db_name}";
				
				$this->conn = new PDO($servername, $this->username, $this->password);

				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// echo "Connected Successfully";
			} catch(PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}
		}

	}