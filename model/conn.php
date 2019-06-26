<?php 
	class Connection{

		public function conn(){
			try{
				//$conn = new PDO('mysql:host=localhost;dbname=bpfsmx_moya','bpfsmx_toor','uvqUq!rMkwgC');
				$conn = new PDO('mysql:host=localhost;dbname=bpfsmx_talleres','root','');
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conn->exec("SET CHARACTER SET UTF8");
			}catch(PDOException $e){
				die('Error: '.$e->getMessage());
				echo "Error en la linea: ".$e->getLine();
			}
			return $conn;
		}
	}

 ?>