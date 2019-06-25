<?php
    header('Content-type: application/json');
    $status = array(
        'type'=>'success',
       'message'=>'Your email has been sent!'
    );


    $name = @trim(stripslashes($_POST['name']));
    $empresa = @trim(
        stripslashes(
            $_POST['nombre-empresa']
        )
    );
    $proyecto = @trim(
        stripslashes(
            $_POST['nombre-proyecto']
        )
    );
    $localizacion = @trim(
        stripslashes(
            $_POST['nombre-localizacion']
        )
    );
    $fecha = @trim(
        stripslashes(
            $_POST['fecha-limite']
        )
    );
    $email = @trim(
        stripslashes(
            $_POST['email']
        )
    ); 
    $presupuesto = @trim(
        stripslashes(
            $_POST['nombre-presupuesto']
        )
    );
    $subject = @trim(
        stripslashes(
            $_POST['subject']
        )
    );
    $message = @trim(
        stripslashes(
            $_POST['message']
        )
    ); 

    $email_from = $email;
    $email_to = 'ventas@bpfs1.com.mx';
    
    $body = 
        'Name: '.$name."\n\n".
        'Empresa:'.$empresa."\n\n". 
        'Proyecto: '.$proyecto."\n\n". 
        'Localizacion: '.$localizacion."\n\n".
        'Fecha: '.$fecha."\n\n". 
        'Email: '. $email."\n\n".
        'Presupuesto: '.$presupuesto."\n\n".
        'Subject: '.$subject."\n\n".
        'Message: '.$message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;
    ?>