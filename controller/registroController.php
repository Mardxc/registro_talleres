<?php 
	require_once '../model/Registro.php';
	$clase = new Registro();
	$respuesta = array();

	switch($_GET['accion']){
		case 'registrar_asistente':{
            $registro=$_POST['registro'];
            
            $empresa    =   $registro['empresa'];
            $nombre     =   $registro['nombre'];
            $ape_pat    =   $registro['ape_pat'];
            $ape_mat    =   $registro['ape_mat'];
            $correo     =   $registro['correo'];
            $telefono   =   $registro['telefono'];
            
            $to = "ventas@bpfs.com.mx";
            $email_from =   $correo;
            //$to= "daryamz392@gmail.com";
            $subject = "Nuevo registro";
            $message = 
            "Empresa: ".$empresa."\n".
            "Nombre: ".$nombre."\n".
            "Apellido Paterno: ".$ape_pat."\n".
            "Apellido Materno: ".$ape_mat."\n".
            "Correo: ".$correo."\n".
            "Telefono: ".$telefono;
            mail($to, $subject, $message, 'From: <'.$email_from.'>');
            
            $respuesta = $clase->registrar_asistente($registro);
            break;
		}

	}
	echo json_encode($respuesta);
?>