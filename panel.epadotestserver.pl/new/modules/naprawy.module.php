		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Rejestr Napraw</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Naprawy</li>
					</ol>
				</div>
				<?if(!isset($_GET['add'])){?>
				<div class="col-lg-6 align-self-center text-right">
					<?if(in_array("add_rejestr", $this_user_uprawnienia)){?><a href="?module=naprawy&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj nową naprawę</a><?}?>
				</div>
				<?}?>
				
		</div>
		
        <section class="main-content">
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from naprawy where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis o naprawie.
						</div>
		<?		
			}
		?>
		

		
		
		<?if(isset($_GET['open'])){			
			$id = (int)$_GET['open'];
			
			$sql = mysql_query("select * from naprawy where id = $id limit 1");
			$data = mysql_fetch_array($sql);
			
		?>


		
		 <div class="row">
			  <div class="col-md-12">	  
                    <div class="card">
                        <div class="card-header card-default">
                            Szczegóły naprawy <b>#<?echo str_pad((int)$_GET['open'], 7, '0', STR_PAD_LEFT);?></b>
                        </div>
                        <div class="card-body">											
                            <table class="table">
                            <tbody>
                            <tr>
                                <td><b>Pojazd</b></td>
                                <td><a href="?module=pojazdy&open=<?echo $data['id_pojazd'];?>" title="Zobacz szczegóły pojazdu"><?echo getCarName($data['id_pojazd']);?></a></td>
                            </tr>
                            <tr>
                                <td><b>Dodał</b></td>
                                <td><?echo getUserName($data['id_uzytkownik']);?></td>
                            </tr>
                            <tr>
                                <td><b>Rodzaj naprawy</b></td>
                                <td><?echo ($data['rodzaj']);?></td>
                            </tr>
                            <tr>
                                <td><b>Data dodania</b></td>
                                <td><?echo ($data['data']);?></td>
                            </tr>
                            <tr>
                                <td><b>Stan licznika</b></td>
                                <td><?echo ($data['stan_licznika']);?></td>
                            </tr>
                            <tr>
                                <td><b>Części</b></td>
                                <td><?echo nl2br($data['czesci']);?></td>
                            </tr>
                            <tr>
                                <td><b>Opis</b></td>
                                <td><?echo nl2br($data['opis']);?></td>
                            </tr>
                            <tr>
                                <td><b>Uwagi</b></td>
                                <td><?echo nl2br($data['uwagi']);?></td>
                            </tr>
                            <tr>
                                <td><b>Mechanik</b></td>
                                <td><?echo ($data['mechanik']);?></td>
                            </tr>							
                            <tr>
                                <td><b>Data naprawy</b></td>
                                <td><?echo ($data['data_naprawy']);?></td>
                            </tr>								
                            </tbody>
                        </table>
						
						<?
							if(isset($_POST['comment'])){
								
								$comment = $_POST['comment'];
								
								mysql_query("insert into naprawy_komentarze values ('', '".$_GET['open']."', '".$_SESSION['id']."', NOW(), '$comment')");
							}
						
						?>
						
						
							<form action="" method="post">
								<table class="table">
									<tbody>
										<tr>
											<td><textarea name="comment" style="hegiht:200px;"></textarea></td>
										</tr>
										<tr>
											<td><input type="submit" value="Dodaj komentarz" class="btn btn-success" /></td>
										</tr>
									</tbody>
								</table>						
							</form>
				
                            <table class="table">
                            <tbody>
							
							<?
								$sql = mysql_query("select * from naprawy_komentarze where id_naprawa = ".$_GET['open']." order by id desc");
								while($data = mysql_fetch_array($sql)){
							?>			
								<tr>
									<td>
									<?echo $data['data']?><br/>
									<b><?echo getUserName($data['id_uzytkownik']);?></b><br/>
									<?echo $data['txt'];?>
									</td>								
								</tr>
								
							<?
								}
							?>	
							
                            </tbody>
                        </table>

				
						
						
						
						
						<a href="?module=naprawy" class="btn btn-primary">Zamknij</a>
						
                         </div>
                    </div>
                </div>
			 </div>



		<?}?>

		
		
		<?if(isset($_GET['add']) || isset($_GET['edit'])){?>
			<? if(isset($_POST['pojazd'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){
				
					$pojazd = getCarID(strip_tags($_POST['pojazd']));
					$rodzaj = strip_tags($_POST['rodzaj']);
					$stan_licznika = strip_tags($_POST['stan_licznika']);
					$czesci = strip_tags($_POST['czesci']);
					$opis = strip_tags($_POST['opis']);
					$uwagi = strip_tags($_POST['uwagi']);
					$mechanik = strip_tags($_POST['mechanik']);
					$data = strip_tags($_POST['data']);		
					
					$date = DateTime::createFromFormat('d-m-Y', $data);
					$dateToBeInserted = $date->format('Y-m-d H:i:s');
				
					$sql = mysql_query("insert into naprawy values ('', '$pojazd', '".$_SESSION['id']."', '$rodzaj', NOW(), '$stan_licznika', '$czesci', '$opis', '$uwagi', '$mechanik', '$dateToBeInserted')");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano naprawę.
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
				
					$pojazd = getCarID(strip_tags($_POST['pojazd']));
					$rodzaj = strip_tags($_POST['rodzaj']);
					$stan_licznika = strip_tags($_POST['stan_licznika']);
					$czesci = strip_tags($_POST['czesci']);
					$opis = strip_tags($_POST['opis']);
					$uwagi = strip_tags($_POST['uwagi']);
					$mechanik = strip_tags($_POST['mechanik']);
					$data = strip_tags($_POST['data']);
				
				
				
					$sql = mysql_query("update pojazdy set nazwa = '$nazwa', vin = '$vin', rok = '$rok', marka = '$marka', model = '$model', pojemnosc = '$pojemnosc', nr_poduszki = '$nr_poduszki', nazwa_osi = '$nazwa_osi', 
																	rozmiar_tarczy_h = '$rozmiar_tarczy_h', rozmiar_klockow_h = '$rozmiar_klockow_h', rodzaj_zacisku_h = '$rodzaj_zacisku_h', rozmiar_walka_sprezarki = '$rozmiar_walka_sprezarki', 
																	rozmiar_paskow_sprezarki = '$rozmiar_paskow_sprezarki', data_badania = '$data_badania', data_legalizacji_tacho = '$data_legalizacji_tacho', data_ubezpieczenia = '$data_ubezpieczenia'");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zapisano pojazd.
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
					$sql = mysql_query("select * from pojazdy where id = ".$_GET['edit']." limit 1");
					$data = mysql_fetch_array($sql);			
			}
	?>
		
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Dodaj nową naprawę
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">
                                <div class="form-group ">
                                    <label>Wybierz pojazd</label>
									
									<select id="rozladunek" name="pojazd" class="form-control form-control-rounded">
									<?
										$sql = mysql_query("select * from pojazdy where archiwum = 0 order by nazwa asc");
										while($data = mysql_fetch_array($sql)){
									?>
										<option value="<? echo $data['id']; ?>" <?if($data['id'] == (int)$_GET['add']){?> selected <?}?>><? echo $data['nazwa']; ?></option>
									<?
										}
									?>
									</select>
									<?$rozladunek_js = 'yes';?>
                                </div>
                                <div class="form-group ">
                                    <label>Rodzaj naprawy</label>                           
									<select name="rodzaj" class="form-control form-control-rounded">
										<option value="Oleje i Fitry">Oleje i Fitry</option>
										<option value="Hamulce">Hamulce</option>
										<option value="Sprzęgło/Skrzynia biegów">Sprzęgło/Skrzynia biegów</option>
										<option value="Ogumienie">Ogumienie</option>
										<option value="Silnik i podzespoły">Silnik i podzespoły</option>
										<option value="Zawieszenie pojazdu">Zawieszenie pojazdu</option>
										<option value="Układ kierowniczy">Układ kierowniczy</option>
										<option value="Układ elektryczny">Układ elektryczny</option>
										<option value="Inne naprawy">Inne naprawy</option>
									</select>	
                                </div>
                                <div class="form-group ">
                                    <label>Stan licznika</label>
                                        <input type="text" value="<?echo $data['stan_licznika'];?>" name="stan_licznika" class="form-control form-control-rounded">
                                </div>
                                <div class="form-group ">
                                    <label>Części</label>
                                        <textarea name="czesci"><?echo $data['czesci'];?></textarea>
                                </div>
                                <div class="form-group ">
                                    <label>Opis</label>
										<textarea name="opis"><?echo $data['opis'];?></textarea>
                                </div>
                                <div class="form-group ">
                                    <label>Uwagi</label>
                                        <textarea name="uwagi"><?echo $data['uwagi'];?></textarea>
                                </div>
                                <div class="form-group ">
                                    <label>Mechanik</label>
                                        <input type="text" value="<?echo $data['mechanik'];?>" name="mechanik" class="form-control form-control-rounded">
                                </div>
	                                <div class="form-group ">
                                    <label>Data wykonania naprawy</label>
                                        <input type="text" value="<?echo $data['data'];?>" name="data" class="form-control form-control-rounded datepicker">
                                </div>							
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=naprawy" class="btn btn-sm btn-success">Anuluj</a>
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
                          Rejestr napraw
                        </div>
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Pojazd</th>
                                                    <th>Dodał</th>
                                                    <th>Rodzaj naprawy</th>
													<th>Opis</th>
                                                    <th>Data dodania</th>
													<th>Data naprawy</th>
                                                    <th>Stan licznika</th>
                                                    <th>Mechanik</th>												
													<th>Akcje</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											
											<?
												$sql = mysql_query("select * from naprawy order by id desc");
												while($data = mysql_fetch_assoc($sql)){
													
													$sql1 = mysql_query("select * from pojazdy where id = ".$data['id_pojazd']." and archiwum = 0 limit 1");
													if(mysql_num_rows($sql1)>0){
											?>
                                                <tr>
                                                    <td><?echo getCarName($data['id_pojazd']);?></td>
                                                    <td><?echo getUserName($data['id_uzytkownik']);?></td>
                                                    <td><?echo $data['rodzaj'];?></td>
													<td><?echo $data['opis'];?></td>
                                                    <td><?echo $data['data'];?></td>
													<td><?echo $data['data_naprawy'];?></td>
                                                    <td><?echo $data['stan_licznika'];?></td>
                                                    <td><?echo $data['mechanik'];?></td>
													<td>
														<center>
															<?if(in_array("show_rejestr", $this_user_uprawnienia)){?><a href="?module=naprawy&open=<?echo $data['id'];?>" class="btn btn-primary">Otwórz</a><?}?>
															<!--<a href="?module=naprawy&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a>-->
															<?if(in_array("del_rejestr", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=naprawy&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
														</center>
													</td>
                                                </tr>
											<?
													}
												}
											?>
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>


        </section>
		
		
		
		

