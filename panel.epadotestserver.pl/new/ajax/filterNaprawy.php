<?
include("../db.inc.php");
include("../core.inc.php");

$id = (int)$_GET['id'];


$search = strip_tags($_GET['search']);
$from   = strip_tags($_GET['from']);
$to     = strip_tags($_GET['to']);

if($from!=='' && $to !==''){
	$myDateTime1 = DateTime::createFromFormat('d-m-Y', $from);
	$from = $myDateTime1->format('Y-m-d');

	$myDateTime1 = DateTime::createFromFormat('d-m-Y', $to);
	$to = $myDateTime1->format('Y-m-d');
}

$str_sql = "";

if(strlen($search)>2)
	$str_sql .= " and (czesci like '%$search%' or opis like '%$search%' or uwagi like '%$search%') ";


if($search == 'all')
	$s = "select * from naprawy 
																				where id_pojazd = $id group by rodzaj order by rodzaj asc";
else $s = "select * from naprawy 
																				where id_pojazd = $id 
																				$str_sql
																				and data >= '$from 00:00:00' and data <= '$to 23:59:59'
																				group by rodzaj order by rodzaj asc";


$repairs = '<h2>Rejestr napraw '.getCarName($id).' '.getCarMark($id).' '.getCarModel($id).'</h2><hr/><br/>';

?>


										<ul class="nav nav-tabs">
										
												<?
													$sql_naprawy = mysql_query($s);
													while($data_naprawy = mysql_fetch_array($sql_naprawy)){		
														$id_element = preg_replace('/\W+/', '-', strtolower($data_naprawy['rodzaj']));
														
												?>											
													<li class="nav-item" role="presentation"><a class="nav-link" style="color:#444;" href="#<?echo $id_element;?>" aria-controls="<?echo $id_element;?>" role="tab1" data-toggle="tab"><?echo $data_naprawy['rodzaj'];?></a></li>
												<?
													}
												?>
										
										
											
									   </ul>
										<div class="tab-content">
											

<?										
if($search == 'all')
	$s = "select * from naprawy 
																				where id_pojazd = $id 																																					
																				group by rodzaj order by rodzaj asc";

else 
	$s = "select * from naprawy 
																				where id_pojazd = $id 
																				$str_sql
																				and data >= '$from 00:00:00' and data <= '$to 23:59:59'																				
																				group by rodzaj order by rodzaj asc";
	
													
?>
												<?
													$sql_naprawy1 = mysql_query($s);
													while($data_naprawy1 = mysql_fetch_array($sql_naprawy1)){

													$id_element = preg_replace('/\W+/', '-', strtolower($data_naprawy1['rodzaj']));	
												?>	
													<div role="tabpanel" class="tab-pane" id="<?echo $id_element;?>">
														<ul class="comments-list list-unstyled clearfix">
												
															<?
															
															
if($search == 'all')
	$s = "select * from naprawy 
																				where id_pojazd = $id 
																				and rodzaj like '".$data_naprawy1['rodzaj']."' 	
																				order by id desc";

else 
	$s = "select * from naprawy 
																							where id_pojazd = $id 
																							and rodzaj like '".$data_naprawy1['rodzaj']."' 
																							$str_sql
																							and data >= '$from 00:00:00' and data <= '$to 23:59:59'																							
																							order by id desc";															
															
																$sql_naprawy = mysql_query($s);
																while($data_naprawy = mysql_fetch_array($sql_naprawy)){
															?>				
																<li class="clearfix">
																	<img src="assets/img/avtar-2.png" alt="" width="70" class="rounded-circle circle-border">
																	<div class="content">
																		<div class="comments-header">
																			<strong><? echo $data_naprawy['mechanik']; ?></strong>
																			<small class="text-muted"><? echo $data_naprawy['data']; ?></small>		
																			<a style="color:#777;" href="?module=naprawy&open=<?echo $data_naprawy['id']; ?>"><span><b>#<?echo str_pad($data_naprawy['id'], 7, '0', STR_PAD_LEFT);?></b></span></a>
																		</div>		
																		<br/>
																		<p><b>Stan licznika: </b> <? echo $data_naprawy['stan_licznika']; ?> </p>	
																		<p><b>Opis naprawy: </b> <? echo $data_naprawy['opis']; ?> </p>
																		<p><b>Części: </b><br/><? echo nl2br($data_naprawy['czesci']); ?> </p>	
																		<p><b>Data naprawy: </b> <? echo $data_naprawy['data_naprawy']; ?> </p>	
																		<p><b>Uwagi: </b> <? echo $data_naprawy['uwagi']; ?> </p>
																		<p><b>Dodał: </b> <? echo getUserName($data_naprawy['id_uzytkownik']); ?> </p>
																	</div>
																</li>
																
																
																<?
																
																$repairs.= 
																
																'
																
																		<b>Naprawa #'.$data_naprawy['id'].'</b><br/>
																		<p><b>Stan licznika: </b> '.$data_naprawy['stan_licznika'] .' </p>	
																		<p><b>Opis naprawy: </b> '.$data_naprawy['opis']  .' </p>
																		<p><b>Części: </b><br/>'.nl2br($data_naprawy['czesci'])  .'  </p>	
																		<p><b>Data naprawy: </b> '. $data_naprawy['data_naprawy']  .'  </p>	
																		<p><b>Uwagi: </b> '. $data_naprawy['uwagi']  .'  </p>
																		<p><b>Dodał: </b> '. getUserName($data_naprawy['id_uzytkownik'])  .'  </p>	
																		<br/>
																
																';
																
																?>
																
															<?
																}
															?>
														</ul>
													</div>																								
												<?
													}
												?>												
												
											
											
										</div>
										
										<div id="repairs_list" style="display:none;">
										<?echo $repairs;?>
										</div>