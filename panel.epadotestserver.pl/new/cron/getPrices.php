<?php
error_reporting(0);
include('../db.inc.php');

require('simple_html_dom/simple_html_dom.php');

$table = array();

$html = file_get_html('http://www.orlen.pl/PL/DlaBiznesu/HurtoweCenyPaliw/Strony/default.aspx');
foreach($html->find('tr') as $row) {
    $type = $row->find('td',0)->plaintext;
    $price = $row->find('td',1)->plaintext;

	if($type !== '' && $price !== '' && strlen($type) < 50 && strlen($type) > 8){	
		$from = array('zł/m3', ' ', '&nbsp;', ' ', " ", '	');
		$to = '';
	
		$price = str_replace($from, $to, $price);
		//$price = str_replace('.', ',', $price);
		$price = trim($price);		
		
		$price = preg_replace("/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/","",$price);		
		
		//$arr = explode(".", $price);
		//$price = $arr[0];	
		
		//$price = $price / 1000;
		
		//$price = round($price, 2);
		//$price = number_format(round($price, 2), 2);		
		
		$table[$type]= $price;	
		
		$s = mysql_query("select * from orlen_products where name like '$type' limit 1");
		if(mysql_num_rows($s)>0){
			$sql = mysql_query("update orlen_products set price = '$price' where name like '$type' limit 1");
		} else {
			$sql = mysql_query("insert into orlen_products values ('', '$type', 'l', 1, '$price')");
		}
	}
}

echo mysql_error();
echo json_encode($table);
?>