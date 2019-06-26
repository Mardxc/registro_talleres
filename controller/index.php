<?php
	header('Access-Control-Allow-Origin: *');
	ini_set('display_errors',0);
	error_reporting(0);
    switch($_GET['request']){
        case 'registro':{
            include 'registroController.php';
            break;
        }
        default:{
            echo "Accion invalida";
        }
    }
?>
