<?php 
	class DbConnect {
		private $host = 'localhost';
		private $dbName = 'test';
		private $user = 'root';
		private $pass = '';

		public function connect() {
			try {
				$conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbName, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch( PDOException $e) {
				echo 'Database Error: ' . $e->getMessage();
			}
		}
	}
 ?> 
 
 
 <?php 
	require('DbConnect.php');
	$db = new DbConnect;
	$conn = $db->connect();
	
	$sql = 'SELECT * from fbusers';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$fbusers = $stmt->fetchAll(PDO::FETCH_ASSOC);
	print_r($fbusers);
