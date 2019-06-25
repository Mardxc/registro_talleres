<?php 
    class Registro{
		private $db;
		private $respuesta = array(
			"status" => "",
			"body" => ["count" => "","elements" => ""]
		);
        
		public function __construct(){
			require_once 'ConnectDB.php';
			$clase = new Connection();
			$this->db = $clase->connection();
			session_start();
        }
        
        public function registrar_asistente($registro){
            try{
                $sql = "
                    INSERT INTO
                        tal_registro(empresa, nombre, ape_pat, ape_mat, correo, telefono)
                    VALUES
                        (:empresa, :nombre, :ape_pat, :ape_mat, :correo, :telefono)";
                $sql = $this->db->prepare($sql);
                $sql->bindParam(':id',$id);
		        
		        $sql->execute();
		        $this->respuesta['status']="ok";
		        $this->respuesta['body']=$sql->fetchAll(PDO::FETCH_ASSOC);;
	       }catch(PDOException $e){
				$this->respuesta["status"] = 'err';
				$this->respuesta["body"] = $e->getMessage().' LINEA['.$e->getLine().'].';
			}
	        return $this->respuesta;
        }
    }
?>