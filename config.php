<?php
	// connexion au serveur
	define("DB_USER","root");
	define("DB_NAME", "megmeg_zoopark");
	define("DB_HOST","localhost");
	define("DB_PASSWORD", "root");
	// changer les données lorsqu'on les migre vers un hebergeur


	$db_connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //établir la connexion au serveur
	//print_r($db_connect);

	if($db_connect->connect_errno) :
		echo "ERREUR ".$db_connect->error;
		exit;
		else: $db_connect->set_charset("utf8");
	endif;

	session_start();

	/**/
	define('TABLE_PREFIX','ost_');

	if(isset($_GET['lang'])) :


		switch($_GET['lang']) {
			case 'fr':
				$_SESSION['lang']='fr';
				$lang ='fr';
				break;

				case 'en':
				//echo "test";
				$_SESSION['lang']='en';
				$lang ='en';
				break;
			
				// default:
				// $_SESSION['lang']='fr';
				// $_GET['lang']='fr';
				// $lang ='fr';
				// break;	
		}

		define('LANG',$_SESSION['lang']);
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	else : 
		if(!$_SESSION['lang']) :
		$_SESSION['lang']='fr';
		$_GET['lang']='fr';
		$lang ='fr';
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
		endif;

	endif;


?>