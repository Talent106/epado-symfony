		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Magazyn</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active"><a href="?module=magazyn">Magazyn</a></li>
<?if(isset($_GET['kategoria'])){							
					$sql = mysql_query("select * from magazyn_kategorie where id = ".$_GET['kategoria']." limit 1");
					$data = mysql_fetch_array($sql);
?>
					<li class="breadcrumb-item active"><a href="?module=magazyn&kategoria=<?echo $data['id'];?>"><?echo $data['nazwa'];?></a></li>
					
<?}?>						
					</ol>
				</div>	
				
				<div class="col-lg-6 align-self-center text-right">		

					<a href="?module=magazyn&pobrane" class="btn btn-danger box-shadow btn-icon btn-rounded"><i class="fa fa-minus"></i> Pobrane części</a>

					<a href="?module=magazyn&all" class="btn btn-warning box-shadow btn-icon btn-rounded"><i class="fa fa-database"></i> Wszystkie części</a>
				
<?if(!isset($_GET['kategoria'])){?>								
					<?if(in_array("add_magazyn", $this_user_uprawnienia)){?><a href="?module=magazyn&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Nowa kategoria</a>		<?}?>		
<?}else {?>				
					<a href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Nowy produkt</a>				
<?}?>
					<a href="?module=magazyn&koszyk" class="btn btn-primary box-shadow btn-icon btn-rounded"><i class="fa fa-shopping-cart"></i> Pobierz części</a>
				</div>
				
		</div>		
        <section class="main-content">
		
		
<?if(isset($_GET['pobrane'])){?>


			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Pobrane części
                        </div>
                        <div class="card-body">
						
						
									<form method="get" action="?module=magazyn&pobrane=1">
										<div class="row">
											<div class="col-md-6 text-right">
												<span style="line-height: 39px;"><b>Szukaj po dacie:</b></span>
											</div>										
											<div class="col-md-2">
												<input name="od" type="text" value="<?echo $_GET['od'];?>" class="form-control form-control-rounded datepicker" />
											</div>		

											<div class="col-md-2">
												<input name="do" type="text" value="<?echo $_GET['do'];?>" class="form-control form-control-rounded datepicker" />
											</div>	
											<!--
											<div class="col-md-2">											
												<select name="godzina" class="form-control form-control-rounded">
													<option value="dowolna">Dowolna</option>
													<?
														for($i=0;$i<24;$i++){
															
															$value = ''.str_pad($i, 1, 0, STR_PAD_LEFT).':00';
															
															if($value == $_GET['godzina']) $selected = 'selected'; else $selected = '';
															
															echo '<option value="'.$value.'" '.$selected.'>'.str_pad($i, 1, 0, STR_PAD_LEFT).':00</option>';
														}
													?>
												</select>
											</div>
											-->
											<div class="col-md-2">
												<input type="hidden" name="module" value="magazyn" />
												<input type="hidden" name="pobrane" value="1" />
												<input type="submit" value="Filtruj" class="btn btn-success" />
											</div>										
										</div>																
									</form>				
										<br/><br/>
										
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Część</th>	
													<th>Pracownik</th>
													<th>Ilość</th>
													<th>Data</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											
											<?
												$sql_add = '';
											
												if(isset($_GET['od'])){
													$od = $_GET['od'];		


													$myDateTime1 = DateTime::createFromFormat('d-m-Y', $od);
													$od = $myDateTime1->format('Y-m-d');	
													
													$sql_add .= " and data >= '$od 00:00:00' ";
												}
												
												if(isset($_GET['do'])){
													$do = $_GET['do'];	

													$myDateTime1 = DateTime::createFromFormat('d-m-Y', $do);
													$do = $myDateTime1->format('Y-m-d');	
													
													$sql_add .= " and data <= '$do 23:59:59' ";
												}											
											
											
												$sql = mysql_query("select * from magazyn_akcje where akcja = 'Zdejmij' $sql_add order by data desc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
                                                    <td><?echo getPartName($data['id_magazyn']);?></td>
													<td><?echo $data['pracownik'];?></td>
													<td><?echo $data['ilosc'];?></td>
													<td><?echo $data['data'];?></td>
                                                </tr>
											<?
												}
											?>
                                            </tbody>
                            </table>
						</div>
					</div>
				</div>
				</div>


<?}?>		
		
		
		
		
<?if(isset($_GET['all'])){?>		

			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Wszystkie części w magazynie
                        </div>
                        <div class="card-body">
		
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nazwa</th>	
													<th>Cena</th>
													<th>Ilość</th>
													<th>Data ostatniego wprowadzenia</th>
													<th>Akcje</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											
											<?
												$sql = mysql_query("select * from magazyn order by nazwa asc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
                                                    <td><?echo $data['nazwa'];?></td>
													<td><?echo $data['cena'];?></td>
													<td><? if($data['ilosc'] == 0) echo '<span class="label label-danger">Brak</span>'; else echo $data['ilosc'];?></td>
													<td><?echo $data['data'];?></td>
													<td>
														<center>
															<?if(in_array("show_magazyn", $this_user_uprawnienia)){?><a href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>&open=<?echo $data['id'];?>" class="btn btn-primary">Otwórz</a><?}?>
															<?if(in_array("edit_magazyn", $this_user_uprawnienia)){?><a href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a><?}?>
															<?if(in_array("del_magazyn", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
														</center>
													</td>
                                                </tr>
											<?
												}
											?>
                                            </tbody>
                            </table>
						</div>
					</div>
				</div>
				</div>
		
		
<?}?>		
		
		
		
<?if(isset($_GET['koszyk'])){?>		


<?

if(isset($_POST['produkt'])){

	$id_pojazd = (int)$_POST['pojazd'];
	$pracownik = $_POST['pracownik'];
	
	mysql_query("insert into magazyn_wz values ('', ".(int)$_SESSION['id'].", $id_pojazd, '$pracownik', NOW())");
	
	$sql = mysql_query("select * from magazyn_wz order by id desc limit 1");
	$data = mysql_fetch_array($sql);
	
	$last_id = $data['id'];
	
	$cena_all = 0;
	$produkty = '';

	for($i=0;$i<count($_POST['produkt']);$i++){		
		$id_artykulu = $_POST['produkt'][$i];
		$ilosc       = $_POST['ilosc'][$i];
		
		$sql = mysql_query("select * from magazyn where id = $id_artykulu limit 1");
		$data = mysql_fetch_array($sql);
		
		$nazwa_artykulu = $data['nazwa'];
		$cena_artykulu = $data['cena'];
		
		mysql_query("insert into magazyn_wz_produkty values ('', $last_id, '$nazwa_artykulu', '$cena_artykulu', '$ilosc')");	
		mysql_query("update magazyn set ilosc = ilosc - $ilosc where id = $id_artykulu limit 1");
		mysql_query("insert into magazyn_akcje values ('', $id_artykulu, 'Zdejmij', '$ilosc', '".$_SESSION['id']."', '$pracownik', NOW())");
		
		$cena_all = $cena_all + ($cena_artykulu*$ilosc);
		
		$produkty = $produkty.' '.$nazwa_artykulu.' x'.$ilosc.' '.$cena_artykulu.'\n';
		
	}
	
	mysql_query("insert into pojazdy_koszty values ('', '$produkty', '$cena_all', NOW(), $id_pojazd, ".$_SESSION['id'].")");
	
	if(!mysql_error()){
?>		

						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano pobranie z magazynu.
						</div>

<?		
	} else {
?>		
						<div class="alert alert-success" role="alert">
						  Błąd podczas dodawania: <?echo mysql_error();?>
						</div>		
<?
	}
}
?>		
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Pobierz części z magazynu
                        </div>
                        <div class="card-body">
							<form method="post" action="">					
                                <div class="form-group ">
                                    <label>Wybierz pojazd</label>
									<select name="pojazd" class="form-control form-control-rounded">
                                        <?
											$sql = mysql_query("select * from pojazdy order by nazwa asc");
											while($data = mysql_fetch_array($sql)){
										?>									
											<option value="<?echo $data['id'];?>"><?echo $data['nazwa'];?></option>										
										<?
											}
										?>
									</select>
                                </div>																	
                                <div class="form-group">
									<h3>Produkty</h3>
									<div class="row productList" id="productList">
										<div class="col-md-12 oneProduct" id="oneProduct" style="margin-bottom:10px;">
											<div class="row">
												<div class="col-md-4">
													<select name="produkt[]" class="form-control form-control-rounded">
														<?
															$sql = mysql_query("select * from magazyn_kategorie order by nazwa asc");
															while($data = mysql_fetch_array($sql)){
														?>												
															 <optgroup label="<?echo $data['nazwa'];?>">
																<?
																	$sql1 = mysql_query("select * from magazyn where kategoria = ".$data['id']." order by nazwa asc");
																	while($data1 = mysql_fetch_array($sql1)){
																?>													 													 
																		<option value="<? echo $data1['id']; ?>" <?if($data1['ilosc'] == 0){?> disabled <?}?>><? echo $data1['nazwa']; ?> (<?echo $data1['ilosc'];?> szt.)</option>													 
																<?
																	}
																?>													 
															 </optgroup>												
														<?
															}
														?>
													</select>
												</div>
												<div class="col-md-2">
													 <input type="number" name="ilosc[]" placeholder="Ilość..." class="form-control form-control-rounded" required>
												</div>
												<div class="col-md-1 text-right">
													 <a title="Usuń pozycję" class="btn btn-danger removeButton" onclick="removeParent(this)"><i class="fa fa-trash"></i></a>
												</div>												
											</div>
										</div>	
										
										
									</div>
									<div class="row">										
										<div class="col-md-7 text-right">
											<br/>
											<a  onclick="addNewProduct();" class="btn btn-primary box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj kolejny produkt</a>
											<br/>
										</div>
									</div>
									
								</div>
								<hr/>
								<div class="form-group">
                                    <label>Pracownik</label>
                                        <input type="text" value="<?echo getUserName($_SESSION['id']);?>" name="pracownik" class="form-control form-control-rounded">
                                </div>			
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=magazyn" class="btn btn-sm btn-success">Anuluj</a>
                            </form>
						</div>
					</div>
				</div>
				</div>		
		
		
<script>
var num = 0;
function addNewProduct(){
	num++;
	$("#oneProduct").clone().prop('id', 'clone-'+num ).appendTo("#productList");
}

function removeParent(elem){
	
	var numItems = $('.removeButton').length;
	
	if(numItems > 1){
		var id = $(elem).parent().parent().parent().attr('id');
		$('#'+id).remove();
	}
	
	
	
}

</script>		
		
		
		
		
<?} else if(!isset($_GET['kategoria'])){?>

		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from magazyn_kategorie where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis o naprawie.
						</div>
		<?		
			}
		?>


		<?if(isset($_GET['add']) || isset($_GET['edit'])){?>
			<? if(isset($_POST['nazwa'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){
					$id = (int)$_GET['id'];
					$nazwa = strip_tags($_POST['nazwa']);
				
					$sql = mysql_query("insert into magazyn_kategorie values ('', '$nazwa')");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano kategorię.
						</div>				
	<?					
					} else {
	?>	
						<div class="alert alert-success" role="alert">
						  Błąd podczas dodawania: <?echo mysql_error();?>
						</div>					
	<?					
					}	
				}
				
		
				//EDYCJA
				if(isset($_GET['edit'])){
					$id = (int)$_GET['edit'];
					$nazwa = strip_tags($_POST['nazwa']);
				
				
				
					$sql = mysql_query("update magazyn_kategorie set nazwa = '$nazwa' where id = $id");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zapisano kategorię.
						</div>				
	<?					
					} else {
	?>	
						<div class="alert alert-success" role="alert">
						  Błąd podczas zapisywania: <?echo mysql_error();?>
						</div>					
	<?					
					}
		
				}	
			}
			
			
			if(isset($_GET['edit'])){
					$sql = mysql_query("select * from magazyn_kategorie where id = ".$_GET['edit']." limit 1");
					$data = mysql_fetch_array($sql);			
			}
	?>		
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Dodaj nową kategorię
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">
                                <div class="form-group ">
                                    <label>Nazwa</label>
                                        <input type="text" value="<?echo $data['nazwa'];?>" name="nazwa" class="form-control form-control-rounded">
                                </div>			
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=magazyn" class="btn btn-sm btn-success">Anuluj</a>
                            </form>
						</div>
					</div>
				</div>
				</div>
		<?}?>
			    <div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header card-default">
							  Kategorie
							</div>
							<div class="card-body">

                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nazwa</th>											
													<th>Akcje</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											
											<?
												$sql = mysql_query("select * from magazyn_kategorie order by nazwa asc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
                                                    <td><?echo $data['nazwa'];?></td>
													<td>
														<center>
															<?if(in_array("show_magazyn", $this_user_uprawnienia)){?><a href="?module=magazyn&kategoria=<?echo $data['id'];?>" class="btn btn-primary">Otwórz</a><?}?>
															<?if(in_array("edit_magazyn", $this_user_uprawnienia)){?><a href="?module=magazyn&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a><?}?>
															<?if(in_array("del_magazyn", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=magazyn&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
														</center>
													</td>
                                                </tr>
											<?
												}
											?>
                                            </tbody>
                                        </table>


							</div>
						</div>
					</div>
				</div>		
<?} else {?>


<?if(isset($_GET['edit'])){
	
	$id = (int)$_GET['edit'];
	
	?>




			<? if(isset($_POST['nazwa'])){ 		
			
				//EDYCJA					
					$nazwa = strip_tags($_POST['nazwa']);
					$ilosc = strip_tags($_POST['ilosc']);
					$pracownik = strip_tags($_POST['pracownik']);
					$akcja = strip_tags($_POST['akcja']);
					
					
					if($akcja == 'Dodaj')
						$sql_akcja = " + ";
					else $sql_akcja = " - ";
					
					$cena = str_replace(',', '.', strip_tags($_POST['cena']));			
				
					$s = "update magazyn set nazwa = '$nazwa', ilosc = ilosc $sql_akcja $ilosc, cena = '$cena' where id = $id limit 1";
					$sql = mysql_query($s);
																	
					if($sql){						
						if($ilosc == 0)
							$zmiana = "Brak zmiany stanu magazynowego";
						else $zmiana = $akcja;
						
						mysql_query("insert into magazyn_akcje values ('', $id, '$zmiana', '$ilosc', '".$_SESSION['id']."', '$pracownik', NOW())");
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zaktualizowano produkt.
						</div>				
	<?					
					} else {
	?>	
						<div class="alert alert-success" role="alert">
						  Błąd podczas zapisywania: <?echo mysql_error();?><br/><b><?echo $s;?></b>
						</div>					
	<?					
					}	
				}
	?>
	
	<?
		$sql = mysql_query("select * from magazyn where id = $id limit 1");
		$data = mysql_fetch_array($sql);	
	?>
	
	
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Edytuj / zmień stan magazynowy
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">
                                <div class="form-group ">
                                    <label>Nazwa</label>
                                        <input type="text" value="<?echo $data['nazwa'];?>" name="nazwa" class="form-control form-control-rounded">
                                </div>
                                <div class="form-group ">
                                    <label>Cena netto / szt</label>
                                        <input type="text" value="<?echo $data['cena'];?>" name="cena" class="form-control form-control-rounded">
                                </div>
                                <div class="form-group ">
                                    <label>Akcja</label>
										<br/>
                                        <input type="radio" name="akcja" value="Dodaj" id="dodaj" checked /> <label for="dodaj">Dodaj</label>
										<input type="radio" name="akcja" value="Zdejmij" id="zdejmij" <?if($data['ilosc'] == 0){?> disabled <?}?> /> <label for="zdejmij">Zdejmij</label>
										<p>Dostępna ilość: <b><?echo $data['ilosc'];?> szt.</b></p>
                                </div>								
                                <div class="form-group ">
                                    <label>Pracownik</label>
                                        <input type="text" name="pracownik" value="<?echo getUserName($_SESSION['id']);?>" class="form-control form-control-rounded">
                                </div>								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>" class="btn btn-sm btn-success">Anuluj</a>
                            </form>
						</div>
					</div>
				</div>
				</div>


<?}?>


<?if(isset($_GET['open'])){
	
	$id = (int)$_GET['open'];
	$sql = mysql_query("select * from magazyn where id = $id limit 1");
	$data = mysql_fetch_array($sql);
	
	?>
	
			    <div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header card-default">
							  Szczegóły produktu <?echo $data['nazwa'];?>
							</div>
							<div class="card-body">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Nazwa</td>
											<td><?echo $data['nazwa'];?></td>
										</tr>
										<tr>
											<td>Ilość</td>
											<td><?echo $data['ilosc'];?></td>
										</tr>
										<tr>
											<td>Cena za sztukę</td>
											<td><?echo $data['cena'];?></td>
										</tr>
										<tr>
											<td>Kategoria</td>
											<td><?echo getCategoryName($data['kategoria']);?></td>
										</tr>	
										<tr>
											<td>Wprowadzono do systemu</td>
											<td><?echo $data['data'];?></td>
										</tr>										
									</tbody>
								</table>
							<br/>	
							<h4>Wykonywane czynności magazynowe</h4>
							
                            <table id="datatable3" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Akcja</th>	
													<th>Ilość</th>
													<th>Użytkownik</th>
													<th>Pracownik</th>
													<th>Data</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											
								<?
									$sql = mysql_query("select * from magazyn_akcje where id_magazyn = $id order by id desc");
									while($data = mysql_fetch_array($sql)){
								?>								
												<tr>
													<td><?echo $data['akcja'];?></td>
													<td><?echo $data['ilosc'];?></td>
													<td><?echo getUserName($data['id_uzytkownik']);?></td>
													<td><?echo $data['pracownik'];?></td>
													<td><?echo $data['data'];?></td>
												</tr>	
								<?
									}
								?>
                                            </tbody>
                            </table>	
							
							<br/>
							
							<?if(in_array("edit_magazyn", $this_user_uprawnienia)){?><a href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>&edit=<?echo $id;?>" class="btn btn-warning">Edytuj</a><?}?>
							<a href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>" class="btn btn-danger">Zamknij</a>
							

							</div>
						</div>
					</div>
				</div>				
<?}?>



<?if(isset($_GET['add'])){?>




			<? if(isset($_POST['nazwa'])){ 		
			
				//DODAWANIE
				
					$id = (int)$_GET['id'];
					$nazwa = strip_tags($_POST['nazwa']);
					$ilosc = strip_tags($_POST['ilosc']);
					$pracownik = strip_tags($_POST['pracownik']);
					
					$cena = str_replace(',', '.', strip_tags($_POST['cena']));
				
					$sql = mysql_query("insert into magazyn values ('', '$nazwa', '$ilosc', '$cena', '".(int)$_GET['kategoria']."', NOW())");
					
					
																	
					if($sql){
						
						$sql = mysql_query("select * from magazyn order by id desc limit 1");
						$data = mysql_fetch_array($sql);
						$last_id = $data['id'];
						
						mysql_query("insert into magazyn_akcje values ('', $last_id, 'Wprowadzenie do bazy', '$ilosc', '".$_SESSION['id']."', '$pracownik', NOW())");
						
						echo mysql_error();
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano produkt.
						</div>				
	<?					
					} else {
	?>	
						<div class="alert alert-success" role="alert">
						  Błąd podczas dodawania: <?echo mysql_error();?>
						</div>					
	<?					
					}	
				}
	?>


			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Wprowadź nowy produkt
                        </div>
                        <div class="card-body">
							<form method="post" action="">
                                <div class="form-group ">
                                    <label>Nazwa</label>
                                        <input type="text" name="nazwa" class="form-control form-control-rounded">
                                </div>
                                <div class="form-group ">
                                    <label>Cena netto / szt</label>
                                        <input type="text" name="cena" class="form-control form-control-rounded">
                                </div>
                                <div class="form-group ">
                                    <label>Ilość</label>
                                        <input type="number" name="ilosc" class="form-control form-control-rounded">
                                </div>
                                <div class="form-group ">
                                    <label>Pracownik</label>
                                        <input type="text" name="pracownik" value="<?echo getUserName($_SESSION['id']);?>" class="form-control form-control-rounded">
                                </div>								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>" class="btn btn-sm btn-success">Anuluj</a>
                            </form>
						</div>
					</div>
				</div>
				</div>


<?}?>


<?
					$sql = mysql_query("select * from magazyn_kategorie where id = ".$_GET['kategoria']." limit 1");
					$data = mysql_fetch_array($sql);
?>

			    <div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header card-default">
							  <b><?echo $data['nazwa'];?></b> - asortyment
							</div>
							<div class="card-body">

                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nazwa</th>	
													<th>Cena</th>
													<th>Ilość</th>
													<th>Data ostatniego wprowadzenia</th>
													<th>Akcje</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											
											<?
												$sql = mysql_query("select * from magazyn where kategoria = ".(int)$_GET['kategoria']." order by nazwa asc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
                                                    <td><?echo $data['nazwa'];?></td>
													<td><?echo $data['cena'];?></td>
													<td><? if($data['ilosc'] == 0) echo '<span class="label label-danger">Brak</span>'; else echo $data['ilosc'];?></td>
													<td><?echo $data['data'];?></td>
													<td>
														<center>
															<?if(in_array("show_magazyn", $this_user_uprawnienia)){?><a href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>&open=<?echo $data['id'];?>" class="btn btn-primary">Otwórz</a><?}?>
															<?if(in_array("edit_magazyn", $this_user_uprawnienia)){?><a href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a><?}?>
															<?if(in_array("del_magazyn", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=magazyn&kategoria=<?echo (int)$_GET['kategoria'];?>&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
														</center>
													</td>
                                                </tr>
											<?
												}
											?>
                                            </tbody>
                            </table>


							</div>
						</div>
					</div>
				</div>
<?}?>			
        </section>
 