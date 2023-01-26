<?php
	session_start();    
	$_SESSION = array();
	session_destroy();	
	setcookie('usuario', 123, time() - 1000); 
	header("Location: login.php");

	/*Se crea un logout para cerrar sesion y las cookies, y te manda de nuevo al login.php */
?>