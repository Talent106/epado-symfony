<?
include("../db.inc.php");
include("../core.inc.php");

$id = (int)$_GET['id'];



$from   = strip_tags($_GET['from']);
$to     = strip_tags($_GET['to']);

if($from!=='' && $to !==''){
	$myDateTime1 = DateTime::createFromFormat('d-m-Y', $from);
	$from = $myDateTime1->format('Y-m-d');

	$myDateTime1 = DateTime::createFromFormat('d-m-Y', $to);
	$to = $myDateTime1->format('Y-m-d');
}



 $s = "select * from usterki 
		where id_pojazd = $id 
		and data >= '$from 00:00:00' and data <= '$to 23:59:59'
		group by rodzaj order by rodzaj asc";

?>




                                    <ul class="comments-list list-unstyled clearfix">									
									<?
										$sql_usterki = mysql_query("select * from usterki where id_pojazd = $id and data >= '$from 00:00:00' and data <= '$to 23:59:59' order by id desc");
										while($data_usterki = mysql_fetch_array($sql_usterki)){
									?>				
                                        <li class="clearfix">
                                            <img src="assets/img/avtar-2.png" alt="" width="70" class="rounded-circle circle-border">
                                            <div class="content">
                                                <div class="comments-header">
                                                    <strong><? echo $data_usterki['kierowca']; ?></strong>
                                                    <small class="text-muted"><? echo $data_usterki['data']; ?></small>												
													<span class ="label label-<?echo statusColor($data_usterki['status']);?>"><?echo $data_usterki['status'];?></span>
													<a style="color:#777;" href="?module=usterki&open=<?echo $data_usterki['id']; ?>"><span><b>#<?echo str_pad($data_usterki['id'], 7, '0', STR_PAD_LEFT);?></b></span></a>
                                                </div>												
                                                <p><? echo $data_usterki['usterka']; ?> </p>
                                            </div>
                                        </li>
									<?
										}
									?>
                                    </ul>