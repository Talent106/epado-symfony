<?
include("../db.inc.php");
include("../core.inc.php");

$id = (int)$_GET['id'];


$search = strip_tags($_GET['search']);
$from   = strip_tags($_GET['from']);
$to     = strip_tags($_GET['to']);



$myDateTime1 = DateTime::createFromFormat('d-m-Y', $from);
$from = $myDateTime1->format('Y-m-d');

$myDateTime1 = DateTime::createFromFormat('d-m-Y', $to);
$to = $myDateTime1->format('Y-m-d');


$str_sql = "";

if(strlen($search)>2)
	$str_sql .= " and produkty like '%$search%' ";


										$suma_calkowita = 0;
									
										$i = 0;
										
										$sql_txt = "select * from pojazdy_koszty
															where id_pojazd = $id 
															$str_sql
															and data >= '$from 00:00:00' and data <= '$to 23:59:59'															
															order by id desc limit 20";
										
										$sql = mysql_query($sql_txt);
										while($data = mysql_fetch_array($sql)){
											$i++;
									?>
									<div class="card">
										<div class="card-header" role="tab" id="heading-<?echo $i;?>">
										 
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?echo $i;?>" aria-expanded="false" aria-controls="collapse-<?echo $i;?>" class="collapsed">
												   <p><b>Koszt #<?echo str_pad($data['id'], 5, '0', STR_PAD_LEFT);?></b> (<?echo $data['data'];?>) <i>dodane przez: <b><?echo getUserName($data['id_uzytkownik']);?></b></i></p>
												</a>
									 
										</div>
										<div id="collapse-<?echo $i;?>" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="heading-<?echo $i;?>" style="">
											<div class="card-body">
									<table class="table table-hover">
										<thead>
										<tr>
											<th>Produkty</th>
											<th>Suma</th>
											
										</tr>
										</thead>
										<tbody>															
		
											<tr>
												<td><?echo nl2br($data['produkty']);?></td>
												<td><?echo $data['koszt'];?></td>

											</tr>																		
										</tbody>
									</table>																
											</div>
										</div>
									</div>		
									<?
											$suma_calkowita = $suma_calkowita + $data['koszt'];
									
									
										}
									?>
										<div class="row">
											<div class="col-md-12 text-right">
												<h3><b>SUMA: </b><? echo $suma_calkowita; ?></h3>
											</div>
										</div>
										
<?echo mysql_error();?>								