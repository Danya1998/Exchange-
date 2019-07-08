<?php
		$pdo = new PDO('mysql:host=localhost;dbname=userlistdb','root','');
    	$pdo->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$mail     = $_POST['email'];
?>