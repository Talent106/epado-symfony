<?

function isLogged(){
	if($_SESSION['id'] == null) return false; else return true;
}


function getUserName($id){
	$sql = mysql_query("select nazwa from uzytkownicy where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['nazwa'];
}

function getCarName($id){
	$sql = mysql_query("select nazwa from pojazdy where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['nazwa'];
}

function getCarID($nazwa){
	$sql = mysql_query("select id from pojazdy where nazwa like '$nazwa' limit 1");
	$data = mysql_fetch_array($sql);
	return $data['id'];
}

function getCarMark($id){
	$sql = mysql_query("select marka from pojazdy where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['marka'];
}

function getCarModel($id){
	$sql = mysql_query("select model from pojazdy where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['model'];
}


function getCarDriver($id){
	$sql = mysql_query("select kierowca from pojazdy where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['kierowca'];
}

function getCategoryName($id){
	$sql = mysql_query("select nazwa from magazyn_kategorie where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['nazwa'];
}

function getDriverName($id){
	$sql = mysql_query("select nazwa from kierowcy where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['nazwa'];
}

function getDriverDocument($id){
	$sql = mysql_query("select nrdow from kierowcy where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['nrdow'];
}

function getDriverPhone($id){
	$sql = mysql_query("select telefon from kierowcy where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['telefon'];
}


function getDriverID($id){
	$sql = mysql_query("select nrdow from kierowcy where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['nrdow'];
}



function getPartName($id){
	$sql = mysql_query("select nazwa from magazyn where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	return $data['nazwa'];
}



function statusColor($status){
	switch($status){
		case "Nowe":
				return "danger";
				break;
		case "W trakcie naprawy":
				return "primary";
				break;
		case "Naprawione":
				return "success";
				break;
		case "Anulowane":
				return "default";
				break;		
		case "W trakcie":
				return "primary";
				break;
		case "Zakończone":
				return "success";
				break;
				
	}
}

function statusToNumber($status){
	switch($status){
		case "Nowe":
				return 0;
				break;
		case "W trakcie naprawy":
				return 1;
				break;
		case "Naprawione":
				return 2;
				break;
		case "Anulowane":
				return 3;
				break;				
	}
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>