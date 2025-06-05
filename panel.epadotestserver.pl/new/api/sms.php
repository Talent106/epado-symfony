<?
include('../db.inc.php');

$sender = $_GET['sender'];
$text = $_GET['text'];

$number = substr($sender, 2);

$text_array = explode(" ", $text);


if($text_array[1] == 'zadanie'){

	
	 $opis = substr($text, 16);
	
	 mysql_query("insert into zadania values ('', '$opis', NOW(), 'Nowe')");
	
} 

if($text_array[1] == 'notatka'){
	
	$typ = $text_array[2];
	
	if($typ == 'prv') $typ = 'Prywatna';
	if($typ == 'pub') $typ = 'Biurowa';
	
	$notatka = substr($text, 20);
	
	$id_user = 0;
	
	$sql = mysql_query("select nazwa from uzytkownicy where login like '$number' limit 1");
	if(mysql_num_rows($sql)>0){	
		$data = mysql_fetch_assoc($sql);
		$id_user = $data['id'];
	}	
	

	mysql_query("insert into notatki values ('', '$notatka', NOW(), 0, '$typ', $id_user, 0)");
	

}

if($text_array[1] == 'zlecenie'){
	
	$zaladunek   = $text_array[2];
	$rozladunek  = $text_array[3];
	$data        = $text_array[4];
	$godzina     = $text_array[5];
	$kierowca    = $text_array[6];
	


	

	mysql_query("insert into zlecenia values ('', '$zaladunek', '$rozladunek', '$data $godzina', '$kierowca')");
	

} 

else {

	$sql = mysql_query("select id from pojazdy where nazwa like '".$text_array[1]."' limit 1");
	if(mysql_num_rows($sql)>0){	
		$data = mysql_fetch_assoc($sql);
		$car_id = $data['id'];

	//czyszcze smsa z parametrow
	$usterka = substr($text, 8);
	$usterka = str_replace($text_array[1], "", $usterka);



	$sql = mysql_query("select nazwa from uzytkownicy where login like '$number' limit 1");
	if(mysql_num_rows($sql)>0){	
		$data = mysql_fetch_assoc($sql);
		$number = $data['nazwa'];
	}

	mysql_query("insert into usterki values ('', $car_id, '$usterka', NOW(), 'Nowe', '$number')");
	echo 'ok';
	} else echo 'not_found: '.$text_array[1];



}

echo mysql_error();

mysql_close($conn);



//DEBUG
$file = 'sms.txt';

// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= "$sender $text\n";
// Write the contents back to the file
file_put_contents($file, $current);

?>

<hr/>

<?

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://flotamenago.pl/panel/api/sms.php?sender='.$_GET['sender'].'&text='.urlencode($_GET['text']).''
]);

$result = curl_exec($curl);
echo $result;
?>




<?
/**********************/
/******FLOTAMENAGO*****

	$conn = mysql_connect('23190.m.tld.pl','admin23190_transport_demo','8Wq8%ZOfP6') or die('Brak polaczenia');
	mysql_select_db('baza23190_transport_demo');
	mysql_query("SET NAMES utf8");
	
	$sender = $_GET['sender'];
	$text = $_GET['text'];

	$number = substr($sender, 2);

	$text_array = explode(" ", $text);




	$sql = mysql_query("select id from pojazdy where nazwa like '".$text_array[1]."' limit 1");
	if(mysql_num_rows($sql)>0){	
		$data = mysql_fetch_assoc($sql);
		$car_id = $data['id'];


	//czyszcze smsa z parametrow
	$usterka = substr($text, 8);
	$usterka = str_replace($text_array[1], "", $usterka);



	$sql = mysql_query("select nazwa from uzytkownicy where login like '$number' limit 1");
	if(mysql_num_rows($sql)>0){	
		$data = mysql_fetch_assoc($sql);
		$number = $data['nazwa'];
	}

	mysql_query("insert into usterki values ('', $car_id, '$usterka', NOW(), 'Nowe', '$number')");
	echo 'ok';
	} else echo 'not_found: '.$text_array[1];

	echo mysql_error();

	mysql_close($conn);	
	
	*/

?>