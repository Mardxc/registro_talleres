<?php
	/*ini_set('display_errors', 'On');
	error_reporting(E_ALL);*/

    header('Content-type: application/json');
    $status = array(
        'type'=>'success',
       'message'=>'Your email has been sent!'
    );

    $empresa = @trim(stripslashes($_POST['empresa']));
    $nombre = @trim(stripslashes($_POST['nombre']));
    $correo = @trim(stripslashes($_POST['correo']));
    $telefono = @trim(stripslashes($_POST['telefono']));
    $subject = 'Registro via pagina';

    $email_from = $correo;
    //$email_to = 'ventas@bpfs.com.mx';
    $email_to = 'daryamz392@gmail.com';
    
    $body = 
        'Nombre: '.$empresa."\n\n".
        'Empresa:'.$empresa."\n\n".
        'Email: '. $correo."\n\n".
        'Telefono: '.$telefono;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    //echo json_encode($body);

	header('Location: http://bpfs.com.mx');
    die;
    ?>