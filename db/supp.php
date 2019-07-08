<?php
    $pdo = new PDO('mysql:host=localhost;dbname=userlistdb','root','');
    $pdo->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$mail     = $_POST['email'];
		$theme     = $_POST['theme'];
		$mess   = $_POST['mess'];
		$sth = $pdo->prepare($sql_insert);
		$sql_insert = 'INSERT INTO support (el_post,theme,message) 
								 VALUES (:email,:theme,:mess)';
		$sth = $pdo->prepare($sql_insert);
		$sth->execute([':email'=>$mail,':theme'=>$theme, ':mess' => $mess]);
		header("location:..\support.php")
		?>