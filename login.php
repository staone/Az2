<?php

$email = $_POST['email'];
$password = $_POST['password'];

include 'dbconfig.php';

$collection = $db->users;

$cursor = $collection->find(array("password" => $password, 
      "email" => $email,));
foreach ($cursor as $document) {
	if ($document['email'] == $email && $document['password']==$password) {
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['uname'] = $document['uname'];
		header('Location: http://localhost:8012/MoodSync');
	}
	else
	{
		header('Location: http://localhost:8012/MoodSync');
	}
}

header('Location: http://localhost:8012/MoodSync');

?>