<?
/****************************/
/****************************/
/****GLOWNY PLIK LADUJACY****/
/******WWW.LUKSOFT.INFO******/
/****************************/
/****************************/

session_start();
error_reporting(E_ERROR);
$module = @strip_tags($_GET['module']);

include('db.inc.php');
include('core.inc.php');


if(!isLogged()) header("location: login.php");

if(isset($_GET['logout'])){
	session_destroy();
	$_SESSION['id'] = null;
	header("location: login.php");
}


include('header.inc.php');


//------------------------------------
//			ZALADOWANY MODUL
//------------------------------------
if(isset($_GET['module'])){
	$module = strip_tags($_GET['module']);
	
	switch($module){
		case "":
			$inc = "start";
			break;
		case "start":
			$inc = "start";
			break;	
		case "pojazdy":
			$inc = "pojazdy";
			break;	
		case "naprawy":
			$inc = "naprawy";
			break;	
		case "usterki":
			$inc = "usterki";
			break;				
		case "ustawienia":
			$inc = "ustawienia";
			break;
		case "magazyn":
			$inc = "magazyn";
			break;
		case "grupy":
			$inc = "grupy";
			break;	
		case "kierowcy":
			$inc = "kierowcy";
			break;	
		case "zadania":
			$inc = "zadania";
			break;
		case "pojazdyzew":
			$inc = "pojazdyzew";
			break;	
		case "kierowcyzew":
			$inc = "kierowcyzew";
			break;
		case "obiekty":
			$inc = "obiekty";
			break;
		case "notatki":
			$inc = "notatki";
			break;	
		case "koszty":
			$inc = "koszty";
			break;	
		case "zlecenia":
			$inc = "zlecenia";
			break;				
	} 	
} else {
	if(isLogged()) $inc = "start";
}

if($inc !== ""){
	include("modules/".$inc.".module.php");	
}

include('footer.inc.php');
?>