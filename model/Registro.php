<?php 
    class Registro{
		private $db;
		private $respuesta = array(
			"status" => "",
			"body" => ["count" => "","elements" => ""]
		);
        
		public function __construct(){
			require_once 'conn.php';
			$clase = new Connection();
			$this->db = $clase->conn();
			session_start();
        }
        
        public function registrar_asistente($registro){
            try{
                $empresa    =   $registro['empresa'];
                $nombre     =   $registro['nombre'];
                $ape_pat    =   $registro['ape_pat'];
                $ape_mat    =   $registro['ape_mat'];
                $correo     =   $registro['correo'];
                $telefono   =   $registro['telefono'];
                $sql = "INSERT INTO
                        tal_registro(empresa, nombre, ape_pat, ape_mat, correo, telefono)
                    VALUES
                        (:empresa, :nombre, :ape_pat, :ape_mat, :correo, :telefono)";
                $sql = $this->db->prepare($sql);
                $sql->bindParam(':empresa',$empresa);
                $sql->bindParam(':nombre',$nombre);
                $sql->bindParam(':ape_pat',$ape_pat);
                $sql->bindParam(':ape_mat',$ape_mat);
                $sql->bindParam(':correo',$correo);
                $sql->bindParam(':telefono',$telefono);
		        
		        $sql->execute();
		        $this->respuesta['status']="ok";
		        $this->respuesta['body']="Registrado";
	       }catch(PDOException $e){
				$this->respuesta["status"] = 'err';
				$this->respuesta["body"] = $e->getMessage().' LINEA['.$e->getLine().'].';
			}
	        return $this->respuesta;
        }
    }
?>