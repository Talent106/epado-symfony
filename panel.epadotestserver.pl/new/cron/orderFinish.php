<h2>TZM RESOLVER v0.1b</h2>
Rozpoczynam wybor najlepszych ofert z dnia <?echo date('d-m-Y');?>
<br/><br/><br/>
<?php
error_reporting(E_ERROR);
include('../db.php');


//****************************************************************************************************************************
//                                 GLOWNY SKRYPT ROZSTRZYGAJACY NAJLEPSZE 2 OFERTY                                           *
//                                 OPIS STATUSOW:                                                                            *
//                                 0 - NOWE ZAMOWIENIE (ZBIERANIE OFERT)                                                     *
//                                 1 - ZAMOWIENIE WSTEPNIE ROZSTRZYGNIETE (OCZEKUJE NA RUCH KLIENTA)                         *
//                                 2 - ZAMOWIENIE ROZSTRZYGNIETE (PARTNER I KLIENT DOSTAJA SWOJE DANE)                       *
//                                                                                                                           *
//                                 PRIORYTETY:                                                                               *
//                                 CENA - SUMUJE CENY WSZYSTKICH PRODUKTOW (EWENTUALNIE OBLICZA CENY PO UPUSTACH             *
//                                 CZAS DOSTAWY - SORTUJE PO CZASIE REALIZACJI                                               *
//                                 TERMIN PLATNOSCI - SORTUJE PO TERMINIE PLATNOSCI (NAJDLUZSZA WYGRYWA)                     *                                                                                                                  *
//****************************************************************************************************************************

//  Orlen: pb95 = 1, pb98 = 2, ekodiesel = 3, ark = 4, oo plus = 5, oo = 6
//  TZM:        = 4,      = 5,           = 1,     = 8,         = 10,   = 10


$i=0;

$from = array("Cena","Termin płatności","Czas dostawy");
$to = array("price","payment_date","realisation_date");

$sql = mysql_query("select * from orders where date_from = CURDATE()"); //pobieram wszystkie zamowienia, gdzie data dostawy od jest dzisiaj
while($data = mysql_fetch_array($sql)){
	$id_order = $data['id'];
	
	
	echo '______________________________________________________________<br/>';
	echo 'ZAMOWIENIE:'.$data['number'].'<br/>';
	echo '______________________________________________________________<br/>';
	
	$sql_offers = mysql_query("select * from offers where id_order = $id_order"); //pobieram oferty do zamowienia
	while($data_offers = mysql_fetch_assoc($sql_offers)){
		$id_offer = $data_offers['id'];
		$sum_final_price = 0;
		
		$sql_products = mysql_query("select * from offers_products where id_offer = ".$data_offers['id'].""); //pobieram produkty z ofert
		while($data_products = mysql_fetch_assoc($sql_products)){			
			$id_product = $data_products['id_product'];
			
			$sql_order = mysql_query("select amount from orders_products where id_product = $id_product limit 1"); //pobieram ilosc zamowionego towaru
			$data_order = mysql_fetch_array($sql_order);
			$amount = $data_order['amount'];			
			
			if($data_products['price'] == 0){																		//procedura obliczenia ceny po upuscie

				$sql_map = mysql_query("select id_orlen from orlen_map where id_tzm = $id_product limit 1");          //kompatybilnosc z tabela produktow orlen
				$data_map = mysql_fetch_array($sql_map);
				$id_product_orlen = $data_map['id_orlen'];

				echo '<br/>id produktu orlen: '.$id_product_orlen.'<br/>';

				$sql_orlen = mysql_query("select price from orlen_products where id = $id_product_orlen limit 1");    //pobieram cene produktu wg cennika orlen
				$data_orlen = mysql_fetch_array($sql_orlen);
				$price_orlen = $data_orlen['price'];
				
				
				echo '<br/>cena produktu orlen: '.$price_orlen.'<br/>';


				$full_price = $amount * $price_orlen;																  //obliczam pln/litr po upuscie
				$full_price_with_discount = $full_price + $data_products['discount'];	
				$final_price = $full_price_with_discount;
				
				
				echo '<br/>upust: ilosc: '.$amount.'<br/>';
				echo '<br/>upust: cena calosc: '.$full_price.'<br/>';				
				echo '<br/>upust: cena calosc + upust: '.$final_price.'<br/>';
				
			} else {
				$final_price = $data_products['price'] * $amount;
				
				
				echo '<br/>cena: '.$data_products['price'].'<br/>';
				echo '<br/>ilosc: '.$amount.'<br/>';
				echo '<br/>cena calosc: '.$final_price.'<br/>';				
						
				
			}
			
			$sum_final_price = $sum_final_price + $final_price;
		}


		//przygotowanie danych do wstawienia w tabele robocza		
		$temp_price = $sum_final_price;
		$temp_delivery = $data_offers['realisation_date'];
		$temp_payment = $data_offers['payment_date'];
		
		mysql_query("insert into temp_offers_parameters values ('', $id_offer, $id_order, $temp_price, $temp_payment, '$temp_delivery')");		
		
		
		echo '--------------------------------<br/>';
		echo '        SZCZEGOLY OFERTY<br/>';
		echo 'Suma cen: '.$temp_price.'<br/>';
		echo 'Czas dostawy: '.$temp_delivery.'<br/>';
		echo 'Termin platnosci: '.$temp_payment.'<br/>';
		echo '--------------------------------<br/>';
	}


echo '______________________________________________________________<br/>';
echo 'KONIEC SZCZEGOLOW ZAMOWIENIA<br/>';
echo '______________________________________________________________<br/><br/><br/><br/><br/>';
}










/*





///////////////////////OLD
	
	echo 'ORDER ID: '.$data['id'].'<br/>ORDER NUMBER: '.$data['number'].'<br/>';
	
	echo '<br/>Ustalam ceny przy upustach...<br/>';

	
	$sql_offers = mysql_query("select * from offers where id_order = $id_order and discount <> 0");
	while($data_offers = mysql_fetch_assoc($sql_offers)){
		
		$sql_products = mysql_query("select * from offers_products where id_offer = ".$data_offers['id']."");
		while($data_products = mysql_fetch_assoc($sql_products)){			
			$id_product = $data_products['id_product'];
			
			$sql_order = mysql_query("select amount from order_products where id_product = $id_product limit 1");
			$data_order = mysql_fetch_array($sql_order);
			
			$amount = $data_order['amount'];

			$sql_map = mysql_query("select id_orlen from orlen_map where id_tzm = $id_product limit 1");
			$data_map = mysql_fetch_array($sql_map);
			$id_product_orlen = $data_map['id_orlen'];
			
			$sql_orlen = mysql_query("select price from orlen_products where id = $id_product_orlen limit 1");
			$data_orlen = mysql_fetch_array($sql_orlen);
			$price_orlen = $data_orlen['price'];
			
			$full_price = $amount * $price_orlen;
			$full_price_with_discount = $full_price + $data_products['discount'];	
			$price_by_liter_with_discount = $full_price_with_discount / $amount;
			
			mysql_query("update offers_products set price = '$price_by_liter_with_discount' where id_product = ".$data_products['id']." limit 1");
			echo 'Ustawiono!<br/><br/>';
		}
	}
	
	$priority = explode(",",$data['priority']);
	$pr   = array();
	$sort = array();
	
	$sort[0] = 'asc';
	$sort[1] = 'asc';
	$sort[2] = 'asc';

	$pr[0] = str_replace($from, $to, $priority[0]);
	$pr[1] = str_replace($from, $to, $priority[1]);
	$pr[2] = str_replace($from, $to, $priority[2]);

	if($pr[0] == 'payment_date') $sort[0] = 'desc';
	if($pr[1] == 'payment_date') $sort[1] = 'desc';
	if($pr[2] == 'payment_date') $sort[2] = 'desc';

	$sql1 = "select * from offers where id_order = $id_order order by ".$pr[0]." ".$sort[0].", ".$pr[1]." ".$sort[1].", ".$pr[2]." ".$sort[2]." limit 2"; //pobieram wszystkie oferty tego zamowienia
	
	echo '<br/>'.$sql1.'<br/>';
	
	echo '<br/>Wyszukuje 2 najlepsze oferty...<br/><br/>';
	
	$sql1 = mysql_query($sql1);
	
	$win_offers = array();
	
	while($data1 = mysql_fetch_array($sql1)){		
		echo 'OFFER ID:'.$data1['id'].'<br/>';
		$win_offers[] = $data1['id'];	
	}
	
	if(!mysql_error()){	
		//TODO: tutaj SMS i mail do kupujacego		
		echo '<br/>Uzytkownik zostal powiadomiony.<br/>';	
	} else echo mysql_error();

	echo '<hr/>';
	$i++;
}
*/
?>
<br/><br/>
Przetworzonych ofert: <?echo $i;?><br/>
---------------------------<br/>
KONIEC PRACY

