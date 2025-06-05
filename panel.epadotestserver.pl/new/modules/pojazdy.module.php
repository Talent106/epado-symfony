<?	if($zew)
		$sql_zew = 1;
	else
		$sql_zew = 0;
	
if(isset($_GET['archiwum'])){
	$set_archive = 1;
} else {
	$set_archive = 0;	
}
	
	
?>


		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6  ">
				  <h2>Baza pojazdów <?if($zew){?> zewnętrznych <?} else {?>wewnętrznych<?}?></h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Pojazdy <?if($zew){?> zewnętrzne <?} else {?>wewnętrzne<?}?></li>
					</ol>
				</div>
				
				
			
				
				
				<?if(!isset($_GET['add'])){?>

				<div class="col-lg-6 col-sm-12  text-right">
				
				<?if(isset($_GET['archiwum'])){?>
					<a href="?module=<?echo $module;?>" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Aktualne</a>
				<?}else{?>
					<a href="?module=<?echo $module;?>&archiwum" class="btn btn-danger box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Archiwum</a>
				<?}?>					
				
				
					<?if(in_array("add_pojazdy", $this_user_uprawnienia)){?><a href="?module=<?echo $_GET['module'];?>&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj nowy pojazd</a><?}?>
				</div>
				<?}?>
				
		</div>
		
        <section class="main-content">
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from pojazdy where id = $id_del limit 1");
				mysql_query("delete from usterki where id_pojazd = $id_del");
				mysql_query("delete from naprawy where id_pojazd = $id_del");
				mysql_query("delete from uwagi where id_pojazd = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto pojazd.
						</div>
		<?		
			}
		?>



		<?
			if(isset($_GET['archive'])){
				$id_archive = (int)$_GET['archive'];
				mysql_query("update pojazdy set archiwum = 1 where id = $id_archive limit 1");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie zarchiwizowano wpis.
						</div>
		<?		
			}
		?>	


		<?
			if(isset($_GET['dearchive'])){
				$id_archive = (int)$_GET['dearchive'];
				mysql_query("update pojazdy set archiwum = 0 where id = $id_archive limit 1");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie zdearchiwizowano wpis.
						</div>
		<?		
			}
		?>	



		<?if(isset($_GET['open'])){			
			$id = (int)$_GET['open'];
			
			$sql = mysql_query("select * from pojazdy where id = $id limit 1");
			$data = mysql_fetch_array($sql);
			
			$przebieg = $data['przebieg'];
			$nazwa = $data['nazwa'];
			
		?>


         <div class="row">
                <div class="col-md-4">
                    <div class="widget white-bg">
					<div class="row">
						<div class="col-lg-12 align-self-center text-right">
							<?if(in_array("edit_pojazdy", $this_user_uprawnienia) && in_array("edit_pojazdy_primary", $this_user_uprawnienia)){?><a href="?module=<?echo $_GET['module'];?>&edit=<?echo $id;?>&show=primary" class="label label-warning">Edytuj</a><?}?>
						</div>					
					</div>
                        <div class="padding-20 text-center">
						 <img alt="Profile Picture" width="140" class="rounded-circle mar-btm margin-b-10 circle-border " src="assets/img/truck.png">
                            <p class="lead font-500 margin-b-0"><? echo $data['nazwa']; ?></p>
                            <p class="text-muted"><?echo $data['firma'];?></p>
							<p class="text-muted"><?echo getDriverName($data['kierowca']);?></p>
                            
                            <hr>
                            <ul class="list-unstyled margin-b-0 text-center row">
                                <li class="col-4">
                                    <span class="font-600"><?echo mysql_num_rows(mysql_query("select id from usterki where id_pojazd = $id"));?></span>
                                    <p class="text-muted text-sm margin-b-0">Zgłoszonych usterek</p>
                                </li>
                                <li class="col-4">
                                    <span class="font-600"><?echo mysql_num_rows(mysql_query("select id from naprawy where id_pojazd = $id"));?></span>
                                    <p class="text-muted text-sm margin-b-0">Wykonanych napraw</p>
                                </li>
                                <li class="col-4">
                                    <span class="font-600"><?echo mysql_num_rows(mysql_query("select id from uwagi where id_pojazd = $id"));?></span>
                                    <p class="text-muted text-sm margin-b-0">Uwag</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class='widget white-bg '>
					
					<div class="row">
						<div class="col-lg-12 align-self-center text-right">
							<?if(in_array("edit_pojazdy", $this_user_uprawnienia) && in_array("edit_pojazdy_info", $this_user_uprawnienia)){?><a href="?module=<?echo $_GET['module'];?>&edit=<?echo $id;?>&show=info" class="label label-warning">Edytuj</a><?}?>
						</div>					
					</div>					
					
							<small class="text-muted">Marka </small>
                            <p><? echo $data['marka']; ?></p> 
							<small class="text-muted">Model</small>
                            <p><? echo $data['model']; ?></p> 
							<small class="text-muted">Rok produkcji</small>
                            <p><? echo $data['rok']; ?></p> 							
							<small class="text-muted">Pojemność</small>
                            <p><? echo $data['pojemnosc']; ?></p>
							<small class="text-muted">VIN</small>
                            <p><? echo $data['vin']; ?></p>                                                   
                    </div>
					
					
                    <div class='widget white-bg '>					
						<div class="row">
							<div class="col-lg-12">
							
								<h3>Pliki</h3>
								<hr/>
								<?
									$sql_pliki = mysql_query("select * from pojazdy_pliki where id_pojazd = ".$_GET['open']."");
									while($data_pliki = mysql_fetch_array($sql_pliki)){
								?>	

										<a href="upload/<?echo $data_pliki['plik'];?>"><?echo $data_pliki['plik'];?></a><br/>
								
								<?								
									}
								?>
								
								<?if(mysql_num_rows($sql_pliki) < 1) echo '<center>Brak plików.</center>';?>
							</div>					
						</div>									                                                  
                    </div>					
					
					
                    <div class='widget white-bg  clearfix'>
						<?if(in_array("add_rejestr", $this_user_uprawnienia)){?><a class="btn btn-success" href="?module=naprawy&add=<?echo $id;?>&pojazd=<?echo $nazwa;?>">Wpisz naprawę</a><?}?>
						<?if(in_array("add_usterki", $this_user_uprawnienia)){?><a class="btn btn-danger" href="?module=usterki&add=<?echo $id;?>&pojazd=<?echo $nazwa;?>">Zgłoś usterkę</a><?}?>
				
						<a class="btn btn-primary" href="?module=<?echo $_GET['module'];?>">Zamknij</a>
                    </div>										
                </div>
                <div class="col-md-8 col-sm-12">

						<div class="card">
						
						
					 	<div class="card-header card-default">
							<div class="row">
								<div class="col-lg-12 align-self-center text-right">
									<?if(in_array("edit_pojazdy", $this_user_uprawnienia) && in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?><a href="?module=<?echo $_GET['module'];?>&edit=<?echo $id;?>&show=parts" class="label label-warning">Edytuj</a><?}?>
								</div>					
							</div>							
						
						
                            Szczegóły dotyczące podzespołów
                        </div>
                        <div class="card-body">
						
						
						
							<div class="row">
								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Numer poduszki </small>
									<p><? echo $data['nr_poduszki']; ?></p> 								
								</div>
								
								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Nazwa i nr osi </small>
									<p><? echo $data['nazwa_osi']; ?></p> 								
								</div>								
	
								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Rozmiar i nr tarczy H </small>
									<p><? echo $data['rozmiar_tarczy_h']; ?></p> 								
								</div>

								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Rozmiar i nr klocków H </small>
									<p><? echo $data['rozmiar_klockow_h']; ?></p> 								
								</div>		

								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Rodzaj zacisku H </small>
									<p><? echo $data['rodzaj_zacisku_h']; ?></p> 								
								</div>

								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Rozmiar wałka sprężarki </small>
									<p><? echo $data['rozmiar_walka_sprezarki']; ?></p> 								
								</div>		

								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Rozmiar pasków sprężarki </small>
									<p><? echo $data['rozmiar_paskow_sprezarki']; ?></p> 								
								</div>

								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Rozmiar ogumienia </small>
									<p><? echo $data['rozmiar_ogumienia']; ?></p> 								
								</div>

								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Rodzaj filtrów </small>
									<p><? echo $data['rodzaj_filtrow']; ?></p> 								
								</div>

								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Inne </small>
									<p><? echo $data['inne']; ?></p> 								
								</div>	

								<div class="col-lg-3 col-md-4 col-sm-12">
									<small class="text-muted">Karta i PIN </small>
									<p><? echo $data['karta']; ?></p> 								
								</div>									
							</div>
                        </div>
                    </div>
					
						<div class="card">
					 	<div class="card-header card-default">
							<div class="row">
								<div class="col-lg-12 align-self-center text-right">
									<?if(in_array("edit_pojazdy", $this_user_uprawnienia) && in_array("edit_pojazdy_termins", $this_user_uprawnienia)){?><a href="?module=<?echo $_GET['module'];?>&edit=<?echo $id;?>&show=termins" class="label label-warning">Edytuj</a><?}?>
								</div>					
							</div>							
						
                            Terminy
                        </div>
                        <div class="card-body">
					
							<div class="row">
							
							
							<?if($data['data_badania'] !== '0000-00-00'){?>
							
								<div class="col-lg-3 col-md-4 col-sm-12">
									<span class="text-muted">Termin badania technicznego</span>
									<p><? 									
											$myDateTime = DateTime::createFromFormat('Y-m-d', $data['data_badania']);
											$newDateString = $myDateTime->format('d-m-Y');															
											echo $newDateString; 
											
											$timestamp = strtotime($newDateString);
											$now = time();
											
											$days = $timestamp - $now;

											if($days < 0)
												echo ' <span class ="label label-danger">Wygasło</span>';
											else if($days <= 1209600)
												echo ' <span class ="label label-warning">Kończy się</span>';											
											else
												echo ' <span class ="label label-success">Ważne</span>';
									    ?></p> 								
								</div>
								
							<?}?>	
								
							

							<?if($data['data_legalizacji_tacho'] !== '0000-00-00'){?>
								<div class="col-lg-3 col-md-4 col-sm-12">
									<span class="text-muted">Termin legalizacji TACHO</span>
									<p><? 
											$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_legalizacji_tacho']);
											$newDateString1 = $myDateTime1->format('d-m-Y');											
											echo $newDateString1;

											$timestamp = strtotime($newDateString1);
											$now = time();
											
											$days = $timestamp - $now;
											
											if($days < 0)
												echo ' <span class ="label label-danger">Wygasło</span>';
											else if($days <= 1209600)
												echo ' <span class ="label label-warning">Kończy się</span>';											
											else
												echo ' <span class ="label label-success">Ważne</span>';											
									
									?></p> 								
								</div>

							<?}?>	
								
	
							
							<?if($data['data_ubezpieczenia'] !== '0000-00-00'){?>
								<div class="col-lg-3 col-md-4 col-sm-12">
									<span class="text-muted">Ubezpieczenie</span>
									<p><?
											$myDateTime2 = DateTime::createFromFormat('Y-m-d', $data['data_ubezpieczenia']);
											$newDateString2 = $myDateTime2->format('d-m-Y');	
											echo $newDateString2; 
											
											$timestamp = strtotime($newDateString2);
											$now = time();
											
											$days = $timestamp - $now;
											
											if($days < 0)
												echo ' <span class ="label label-danger">Wygasło</span>';
											else if($days <= 1209600)
												echo ' <span class ="label label-warning">Kończy się</span>';											
											else
												echo ' <span class ="label label-success">Ważne</span>';											
									
									?></p> 								
								</div>		
							<?}?>


							<?if($data['data_odczytu_tacho'] !== '0000-00-00'){?>	
								<div class="col-lg-3 col-md-4 col-sm-12">
									<span class="text-muted">Termin odczytu TACHO</span>
									<p><?
											$myDateTime2 = DateTime::createFromFormat('Y-m-d', $data['data_odczytu_tacho']);
											$newDateString2 = $myDateTime2->format('d-m-Y');	
											echo $newDateString2; 
											
											$timestamp = strtotime($newDateString2);
											$now = time();
											
											$days = $timestamp - $now;
											
											if($days < 0)
												echo ' <span class ="label label-danger">Wygasło</span>';
											else if($days <= 1209600)
												echo ' <span class ="label label-warning">Kończy się</span>';											
											else
												echo ' <span class ="label label-success">Ważne</span>';											
									
									?></p> 								
								</div>	
							<?}?>
								
								
								<?if($data['doz_tech'] !== '0000-00-00'){?>
								<div class="col-lg-3 col-md-4 col-sm-12">
									<span class="text-muted">Dozór techniczny</span>
									<p><?
											$myDateTime2 = DateTime::createFromFormat('Y-m-d', $data['doz_tech']);
											$newDateString2 = $myDateTime2->format('d-m-Y');	
											echo $newDateString2; 
											
											$timestamp = strtotime($newDateString2);
											$now = time();
											
											$days = $timestamp - $now;
											
											if($days < 0)
												echo ' <span class ="label label-danger">Wygasło</span>';
											else if($days <= 1209600)
												echo ' <span class ="label label-warning">Kończy się</span>';											
											else
												echo ' <span class ="label label-success">Ważne</span>';											
									
									?></p> 								
								</div>									
								<?}?>
								
													
														
								
								
							</div>
                        </div>
                    </div>					
					
					
					 <div class="card">
                        <div class="card-body">
						<div class="tabs">
						<ul class="nav nav-tabs">
                            <li class="nav-item" role="presentation"><a class="nav-link  active" href="#usterki" aria-controls="usterki" role="tab" data-toggle="tab">Usterki</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#naprawy" aria-controls="naprawy" role="tab" data-toggle="tab">Naprawy</a></li>
							<li class="nav-item" role="presentation"><a class="nav-link" href="#uwagi" aria-controls="uwagi" role="tab" data-toggle="tab">Uwagi</a></li>
							<li class="nav-item" role="presentation"><a class="nav-link" href="#koszty" aria-controls="koszty" role="tab" data-toggle="tab">Koszty</a></li>
							<li class="nav-item" role="presentation"><a class="nav-link" href="#kierowcy" aria-controls="kierowcy" role="tab" data-toggle="tab">Kierowcy</a></li>
							<li class="nav-item" role="presentation"><a class="nav-link" href="#rejestracje" aria-controls="rejestracje" role="tab" data-toggle="tab">Nr rejestracyjne</a></li>
							<li class="nav-item" role="presentation"><a class="nav-link" href="#kilometry" aria-controls="kilometry" role="tab" data-toggle="tab">Kilometry</a></li>
                       </ul>
						<div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="usterki">
                                <div class="widget white-bg" >
								
								   <div class="row" style="margin-bottom: 10px;">
										<div class="col-md-2 col-sm-12">
											<input id="Ufrom" class="form-control datepicker" placeholder="Od" />
										</div>
										<div class="col-md-2 col-sm-12">
											<input id="Uto" class="form-control datepicker" placeholder="Do" />
										</div>								

										<div class="col-md-5 col-sm-12">
											<center><a class="btn btn-primary" id="UsearchFilter">Szukaj</a></center>
										</div>									
								   </div>									
								
									<div id="usterki_content">
										<ul class="comments-list list-unstyled clearfix">									
										<?
											$sql_usterki = mysql_query("select * from usterki where id_pojazd = $id order by id desc limit 15");
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
									</div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="naprawy">
                               <div class="widget white-bg">
							   
								   <div class="row" style="margin-bottom: 10px;">
										<div class="col-md-2 col-sm-12">
											<input id="Nfrom" class="form-control datepicker" placeholder="Od" />
										</div>
										<div class="col-md-2 col-sm-12">
											<input id="Nto" class="form-control datepicker" placeholder="Do" />
										</div>								
										<div class="col-md-3 col-sm-12">
											<input id="Nsearch" class="form-control" placeholder="Fraza..." />
										</div>
										<div class="col-md-5 col-sm-12">
											<center><a class="btn btn-primary" id="NsearchFilter">Szukaj</a>
											        <a class="btn btn-primary" id="searchAll">Wszystko</a>
													<a class="btn btn-primary" id="printServices">Drukuj</a>
													
													</center>
										</div>									
								   </div>							   
							   
									<div class="tabs" id="naprawyFilter">

									</div>
							  </div>
                            </div>
							
                            <div role="tabpanel" class="tab-pane" id="uwagi">
                               <div class="widget white-bg">
                                    <ul class="comments-list list-unstyled clearfix">								
									<?
										$sql_uwagi = mysql_query("select * from uwagi where id_pojazd = $id order by id desc");
										while($data_uwagi = mysql_fetch_array($sql_uwagi)){
											
											
									
											
									?>				
                                        <li class="clearfix">
                                            <img src="assets/img/avtar-2.png" alt="" width="70" class="rounded-circle circle-border">
                                            <div class="content">
                                                <div class="comments-header">
                                                    <strong><? echo getUserName($data_uwagi['id_pracownik']); ?></strong>
                                                    <small class="text-muted"><? echo $data_uwagi['data']; ?></small>		
                                                </div>		
												<br/>
                                                <p><? echo $data_uwagi['opis']; ?> </p>
                                            </div>
                                        </li>
									<?
										}
									?>
                                    </ul>
							  </div>
                            </div>	

                            <div role="tabpanel" class="tab-pane" id="koszty">
                               <div class="widget white-bg">
							   
							   <div class="row" style="margin-bottom: 10px;">
									<div class="col-md-3 col-sm-12">
										<input id="from" class="form-control datepicker" placeholder="Od" />
									</div>
									<div class="col-md-3 col-sm-12">
										<input id="to" class="form-control datepicker" placeholder="Do" />
									</div>								
									<div class="col-md-3 col-sm-12">
										<input id="search" class="form-control" placeholder="Fraza..." />
									</div>
									<div class="col-md-3 col-sm-12">
										<center><a class="btn btn-primary" id="searchFilter">Szukaj</a></center>
										
									</div>									
							   </div>
							   
							   <hr/>
							   
							    
							   
							   <div id="kosztyFilter">
								<!-- AJAX CONTENT -->
							   </div>
							   
									
							  </div>
                            </div>	
							
							
                            <div role="tabpanel" class="tab-pane" id="kierowcy">
                               <div class="widget white-bg">

							   
									<table class="table">
										<tr>
											<td>Kierowca</td>
											<td>Data rozpoczęcia</td>											
										</tr>
									
									<?
										$sql = mysql_query("select * from pojazdy_kierowcy where id_pojazd = ".$_GET['open']." order by id desc");
										while($data = mysql_fetch_array($sql)){
									?>
									
										<tr>
											<td><?echo getDriverName($data['id_kierowca']);?></td>
											<td><?echo $data['data'];?></td>											
										</tr>

									<?
										}
									?>
									</table>
							   
									
							  </div>
                            </div>	

                            <div role="tabpanel" class="tab-pane" id="rejestracje">
                               <div class="widget white-bg">
									<table class="table">
										<tr>
											<td>Nr rejestracyjny</td>
											<td>Data zmiany</td>											
										</tr>
									
									<?
										$sql = mysql_query("select * from pojazdy_rejestracje where id_pojazd = ".$_GET['open']." order by id desc");
										while($data = mysql_fetch_array($sql)){
									?>
									
										<tr>
											<td><?echo $data['rejestracja'];?></td>
											<td><?echo $data['data'];?></td>											
										</tr>

									<?
										}
									?>
									</table>	
							  </div>
                            </div>	


                            <div role="tabpanel" class="tab-pane" id="kilometry">
                               <div class="widget white-bg">

								<?
									$sql = mysql_query("select * from naprawy where rodzaj = 'Oleje i Filtry' or rodzaj = 'Hamulce' and stan_licznika != '' and id_pojazd = ".$_GET['open']." order by id desc limit 1");
									$data = mysql_fetch_array($sql);
									
									if(mysql_num_rows($sql) > 0){
									?>	
									Ostatni serwis: <?echo $data['rodzaj']; ?>, przebieg: <?echo $data['stan_licznika']; ?>	<br/>
									<?	
									}
									
									$przejechane = (int)$data['stan_licznika'] - (int)$przebieg;
									
									if($przejechane > 0){
									?>
									
									Przejechane w firmie: <?echo $przejechane;?>
									
									<?
									}
									?>
									
							  </div>
                            </div>								
							
							
						</div>
						</div>
					</div>
					</div>
					

					
					
					
					
				
                </div>
            </div>


<?$show_all_repairs = 'yes';?>


		<?}?>

		<?if(isset($_GET['add']) || isset($_GET['edit'])){?>
			<? if(isset($_POST['nazwa'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){
				
					$nazwa = strip_tags($_POST['nazwa']);
					$vin = strip_tags($_POST['vin']);
					$rok = strip_tags($_POST['rok']);
					$marka = strip_tags($_POST['marka']);
					$model = strip_tags($_POST['model']);
					$pojemnosc = strip_tags($_POST['pojemnosc']);
					$nr_poduszki = strip_tags($_POST['nr_poduszki']);
					$nazwa_osi = strip_tags($_POST['nazwa_osi']);
					$rozmiar_tarczy_h = strip_tags($_POST['rozmiar_tarczy_h']);
					$rozmiar_klockow_h = strip_tags($_POST['rozmiar_klockow_h']);
					$rodzaj_zacisku_h = strip_tags($_POST['rodzaj_zacisku_h']);
					$rozmiar_walka_sprezarki = strip_tags($_POST['rozmiar_walka_sprezarki']);
					$rozmiar_paskow_sprezarki = strip_tags($_POST['rozmiar_paskow_sprezarki']);
					$przebieg = strip_tags($_POST['przebieg']);
					$karta = strip_tags($_POST['karta']);
					
					$rozmiar_ogumienia = strip_tags($_POST['rozmiar_ogumienia']);
					$rodzaj_filtrow = strip_tags($_POST['rodzaj_filtrow']);
					$inne = strip_tags($_POST['inne']);		
					
					$firma = strip_tags($_POST['firma']);	

					if(isset($_POST['data_badania'])){
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['data_badania']);
						$data_badania = $myDateTime1->format('Y-m-d');		
					} else $data_badania = "0000-00-00";

					if(isset($_POST['data_ubezpieczenia'])){
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['data_ubezpieczenia']);
						$data_ubezpieczenia = $myDateTime1->format('Y-m-d');			
					} else $data_ubezpieczenia = "0000-00-00";
		
					if(isset($_POST['data_legalizacji_tacho'])){		
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['data_legalizacji_tacho']);
						$data_legalizacji_tacho = $myDateTime1->format('Y-m-d');
					} else $data_legalizacji_tacho = "0000-00-00";
					
					if(isset($_POST['data_odczytu_tacho'])){					
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['data_odczytu_tacho']);
						$data_odczytu_tacho = $myDateTime1->format('Y-m-d');	
					} else $data_odczytu_tacho = "0000-00-00";

					if(isset($_POST['doz_tech'])){
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['doz_tech']);
						$doz_tech = $myDateTime1->format('Y-m-d');						
							
						$doz_tech_sql = "$doz_tech";	
					} else $doz_tech_sql = "0000-00-00";				
										
				
					$sql = mysql_query("insert into pojazdy values ('', '$nazwa', '$vin', '$rok', '$marka', '$model', '$pojemnosc', '$nr_poduszki', '$nazwa_osi', 
																	'$rozmiar_tarczy_h', '$rozmiar_klockow_h', '$rodzaj_zacisku_h', '$rozmiar_walka_sprezarki', 
																	'$rozmiar_paskow_sprezarki', '$data_badania', '$data_legalizacji_tacho', '$data_ubezpieczenia',
																	'$rozmiar_ogumienia', '$rodzaj_filtrow', '$inne', '$data_odczytu_tacho', '$firma', '$kierowca', 
																	$sql_zew, '$doz_tech_sql', '$przebieg', 0, '$karta')");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano pojazd.
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
					$old_nazwa = strip_tags($_POST['old_nazwa']);
					$vin = strip_tags($_POST['vin']);
					$rok = strip_tags($_POST['rok']);
					$marka = strip_tags($_POST['marka']);
					$model = strip_tags($_POST['model']);
					$pojemnosc = strip_tags($_POST['pojemnosc']);
					$nr_poduszki = strip_tags($_POST['nr_poduszki']);
					$nazwa_osi = strip_tags($_POST['nazwa_osi']);
					$rozmiar_tarczy_h = strip_tags($_POST['rozmiar_tarczy_h']);
					$rozmiar_klockow_h = strip_tags($_POST['rozmiar_klockow_h']);
					$rodzaj_zacisku_h = strip_tags($_POST['rodzaj_zacisku_h']);
					$rozmiar_walka_sprezarki = strip_tags($_POST['rozmiar_walka_sprezarki']);
					$rozmiar_paskow_sprezarki = strip_tags($_POST['rozmiar_paskow_sprezarki']);
					$kierowca = strip_tags($_POST['kierowca']);
					$old_kierowca = strip_tags($_POST['old_kierowca']);
					$przebieg = strip_tags($_POST['przebieg']);
					$karta = strip_tags($_POST['karta']);
					
						
					$rozmiar_ogumienia = strip_tags($_POST['rozmiar_ogumienia']);
					$rodzaj_filtrow = strip_tags($_POST['rodzaj_filtrow']);
					$inne = strip_tags($_POST['inne']);
					
					$firma = strip_tags($_POST['firma']);
					
					
					
					if(isset($_POST['data_badania'])){
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['data_badania']);
						$data_badania = $myDateTime1->format('Y-m-d');		
					} else $data_badania = "0000-00-00";

					if(isset($_POST['data_ubezpieczenia'])){
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['data_ubezpieczenia']);
						$data_ubezpieczenia = $myDateTime1->format('Y-m-d');			
					} else $data_ubezpieczenia = "0000-00-00";
		
					if(isset($_POST['data_legalizacji_tacho'])){		
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['data_legalizacji_tacho']);
						$data_legalizacji_tacho = $myDateTime1->format('Y-m-d');
					} else $data_legalizacji_tacho = "0000-00-00";
					
					if(isset($_POST['data_odczytu_tacho'])){					
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['data_odczytu_tacho']);
						$data_odczytu_tacho = $myDateTime1->format('Y-m-d');	
					} else $data_odczytu_tacho = "0000-00-00";

					if(isset($_POST['doz_tech'])){
						$myDateTime1 = DateTime::createFromFormat('d-m-Y', $_POST['doz_tech']);
						$doz_tech = $myDateTime1->format('Y-m-d');						
							
						$doz_tech_sql = "$doz_tech";	
					} else $doz_tech_sql = "0000-00-00";
					
					
					
					$sql = mysql_query("update pojazdy set nazwa = '$nazwa', vin = '$vin', rok = '$rok', marka = '$marka', model = '$model', pojemnosc = '$pojemnosc', nr_poduszki = '$nr_poduszki', nazwa_osi = '$nazwa_osi', 
																	rozmiar_tarczy_h = '$rozmiar_tarczy_h', rozmiar_klockow_h = '$rozmiar_klockow_h', rodzaj_zacisku_h = '$rodzaj_zacisku_h', rozmiar_walka_sprezarki = '$rozmiar_walka_sprezarki', 
																	rozmiar_paskow_sprezarki = '$rozmiar_paskow_sprezarki', data_badania = '$data_badania', data_legalizacji_tacho = '$data_legalizacji_tacho', data_ubezpieczenia = '$data_ubezpieczenia',
																	rozmiar_ogumienia = '$rozmiar_ogumienia', rodzaj_filtrow = '$rodzaj_filtrow', inne = '$inne', data_odczytu_tacho = '$data_odczytu_tacho', firma = '$firma', kierowca = '$kierowca',
																	doz_tech = '$doz_tech_sql', przebieg = '$przebieg', karta = '$karta'
																	where id = $id limit 1");	


					if($kierowca !== $old_kierowca)
						mysql_query("insert into pojazdy_kierowcy values ('', $id, $kierowca, NOW())");
					
					

					if($nazwa !== $old_nazwa)
						mysql_query("insert into pojazdy_rejestracje values ('', $id, '$old_nazwa', NOW())");					
					

																	
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


				if(isset($_GET['delfile'])){
					mysql_query("delete from pojazdy_pliki where id = ".$_GET['delfile']." limit 1");
					
				}



					if(isset($_FILES['files'])){
						foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
							$file_name = $key.$_FILES['files']['name'][$key];
							$file_size =$_FILES['files']['size'][$key];
							$file_tmp =$_FILES['files']['tmp_name'][$key];
							$file_type=$_FILES['files']['type'][$key];
							
							if(strlen($file_name)>3){
								$plik = generateRandomString(5).$file_name;
																
								move_uploaded_file($file_tmp, "upload/$plik"); 
								mysql_query("insert into pojazdy_pliki values ('', ".$_GET['edit'].", '$plik')");
							}
						}
					} 

					
			}
	?>
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zarządzaj pojazdem <?if(isset($_GET['edit'])){?> <b><?echo $data['nazwa'];?></b> <?}?>
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">
                                <div <?if(isset($_GET['show']) && $_GET['show'] !== 'primary'  || !in_array("edit_pojazdy_primary", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Nazwa pojazdu lub nr rejestracyjny</label>
                                        <input type="text" value="<?echo $data['nazwa'];?>" name="nazwa" class="form-control form-control-rounded">
										<input type="hidden" name="old_nazwa" value="<?echo $data['nazwa'];?>" />
                                </div>
								
								
<?if(!$zew){?>								
								
                                <div <?if(isset($_GET['show']) && $_GET['show'] !== 'info' || !in_array("edit_pojazdy_info", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Nr VIN</label>
                                        <input type="text" value="<?echo $data['vin'];?>" name="vin" class="form-control form-control-rounded">
                                </div>
                                <div <?if(isset($_GET['show']) && $_GET['show'] !== 'info' || !in_array("edit_pojazdy_info", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Przebieg</label>
                                        <input type="number" value="<?echo $data['przebieg'];?>" name="przebieg" class="form-control">
                                </div>																
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'info' || !in_array("edit_pojazdy_info", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Rok produkcji</label>
                                        <input type="text" value="<?echo $data['rok'];?>" name="rok" class="form-control form-control-rounded">
                                </div>
<?}?>								
								
                                <div <?if(isset($_GET['show']) && $_GET['show'] !== 'info' || !in_array("edit_pojazdy_info", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Marka</label>
                                        <input type="text" value="<?echo $data['marka'];?>" name="marka" class="form-control form-control-rounded">
                                </div>
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'info' || !in_array("edit_pojazdy_info", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Model</label>
                                        <input type="text" value="<?echo $data['model'];?>" name="model" class="form-control form-control-rounded">
                                </div>
								
								
<?if(!$zew){?>									
                                <div <?if(isset($_GET['show']) && $_GET['show'] !== 'info' || !in_array("edit_pojazdy_info", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Pojemność</label>
                                        <input type="text" value="<?echo $data['pojemnosc'];?>" name="pojemnosc" class="form-control form-control-rounded">
                                </div>
								
                                <div <?if(isset($_GET['show']) && $_GET['show'] !== 'info' || !in_array("edit_pojazdy_info", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Karta i PIN</label>
                                        <input type="text" value="<?echo $data['karta'];?>" name="karta" class="form-control form-control-rounded">
                                </div>
								
                                <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Nr poduszki</label>
                                        <input type="text" value="<?echo $data['nr_poduszki'];?>" name="nr_poduszki" class="form-control form-control-rounded">
                                </div>
                                <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Nazwa i nr osi</label>
                                        <input type="text" value="<?echo $data['nazwa_osi'];?>" name="nazwa_osi" class="form-control form-control-rounded">
                                </div>
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Rozmiar i nr tarczy H</label>
                                        <input type="text" value="<?echo $data['rozmiar_tarczy_h'];?>" name="rozmiar_tarczy_h" class="form-control form-control-rounded">
                                </div>
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Rozmiar i nr klocków H</label>
                                        <input type="text" value="<?echo $data['rozmiar_klockow_h'];?>" name="rozmiar_klockow_h" class="form-control form-control-rounded">
                                </div>
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Rodzaj zacisku H</label>
                                        <input type="text" value="<?echo $data['rodzaj_zacisku_h'];?>" name="rodzaj_zacisku_h" class="form-control form-control-rounded">
                                </div>
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Rozmiar wałka sprężarki</label>
                                        <input type="text" value="<?echo $data['rozmiar_walka_sprezarki'];?>" name="rozmiar_walka_sprezarki" class="form-control form-control-rounded">
                                </div>
                                  <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Rozmiar pasków sprężarki</label>
                                        <input type="text" value="<?echo $data['rozmiar_paskow_sprezarki'];?>" name="rozmiar_paskow_sprezarki" class="form-control form-control-rounded">
                                </div>															
                                <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Rozmiar ogumienia</label>
                                        <input type="text" value="<?echo $data['rozmiar_ogumienia'];?>" name="rozmiar_ogumienia" class="form-control form-control-rounded">
                                </div>
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Rodzaj filtrów</label>
                                        <input type="text" value="<?echo $data['rodzaj_filtrow'];?>" name="rodzaj_filtrow" class="form-control form-control-rounded">
                                </div>
                                  <div <?if(isset($_GET['show']) && $_GET['show'] !== 'parts' || !in_array("edit_pojazdy_parts", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Inne</label>
                                        <input type="text" value="<?echo $data['inne'];?>" name="inne" class="form-control form-control-rounded">
                                </div>																							
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'termins' || !in_array("edit_pojazdy_termins", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Data badania technicznego</label>
                                        <input type="checkbox" id="data_badania_check" <?if($data['data_badania'] !== '0000-00-00') echo 'checked';?>  /> <input type="text" id="data_badania" <?if($data['data_badania'] == '0000-00-00') echo 'disabled';?> value="<?if($data['data_badania']!==null){$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_badania']);$data_badania = $myDateTime1->format('d-m-Y'); if($data['data_badania'] == '0000-00-00') echo date("d-m-Y"); else  echo $data_badania;}?>" name="data_badania" class="form-control form-control-rounded datepicker">
                                </div>
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'termins' || !in_array("edit_pojazdy_termins", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Data legalizacji TACHO</label>
                                       <input type="checkbox" id="data_legalizacji_tacho_check" <?if($data['data_legalizacji_tacho'] !== '0000-00-00') echo 'checked';?>  /> <input id="data_legalizacji_tacho" <?if($data['data_legalizacji_tacho'] == '0000-00-00') echo 'disabled';?> type="text" value="<?if($data['data_legalizacji_tacho']!==null){$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_legalizacji_tacho']);$data_legalizacji_tacho = $myDateTime1->format('d-m-Y'); if($data['data_legalizacji_tacho'] == '0000-00-00') echo date("d-m-Y"); else  echo $data_legalizacji_tacho;}?>" name="data_legalizacji_tacho" class="form-control form-control-rounded datepicker">
                                </div>								
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'termins' || !in_array("edit_pojazdy_termins", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Data odczytu TACHO</label>
                                       <input type="checkbox" id="data_odczytu_tacho_check" <?if($data['data_odczytu_tacho'] !== '0000-00-00') echo 'checked';?>  /> <input id="data_odczytu_tacho" <?if($data['data_odczytu_tacho'] == '0000-00-00') echo 'disabled';?> type="text" value="<?if($data['data_odczytu_tacho']!==null){$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_odczytu_tacho']);$data_odczytu_tacho = $myDateTime1->format('d-m-Y'); if($data['data_odczytu_tacho'] == '0000-00-00') echo date("d-m-Y"); else  echo $data_odczytu_tacho;}?>" name="data_odczytu_tacho" class="form-control form-control-rounded datepicker">
                                </div>																
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'termins' || !in_array("edit_pojazdy_termins", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Data ubezpieczenia</label>
                                        <input type="checkbox" id="data_ubezpieczenia_check" <?if($data['data_ubezpieczenia'] !== '0000-00-00') echo 'checked';?>   /> <input id="data_ubezpieczenia" <?if($data['data_ubezpieczenia'] == '0000-00-00') echo 'disabled';?> type="text" value="<?if($data['data_ubezpieczenia']!==null){$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_ubezpieczenia']);$data_ubezpieczenia = $myDateTime1->format('d-m-Y'); if($data['data_ubezpieczenia'] == '0000-00-00') echo date("d-m-Y"); else  echo $data_ubezpieczenia;}?>" name="data_ubezpieczenia" class="form-control form-control-rounded datepicker">
                                </div>	
                                 <div <?if(isset($_GET['show']) && $_GET['show'] !== 'termins' || !in_array("edit_pojazdy_termins", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Dozór techniczny</label>
                                         <input type="checkbox" id="dozor_check" <?if($data['doz_tech'] !== '0000-00-00') echo 'checked';?>  /> <input id="dozor" <?if($data['doz_tech'] == '0000-00-00') echo 'disabled';?> type="text" value="<?if($data['doz_tech']!==null){$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['doz_tech']);$doz_tech = $myDateTime1->format('d-m-Y');  if($data['doz_tech'] == '0000-00-00') echo date("d-m-Y"); else echo $doz_tech;}?>" name="doz_tech" class="form-control form-control-rounded datepicker">
                                </div>
<?}?>




								
                                  <div <?if(isset($_GET['show']) && $_GET['show'] !== 'primary' || !in_array("edit_pojazdy_primary", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Firma</label>
                                        <input type="text" value="<?echo $data['firma'];?>" name="firma" class="form-control form-control-rounded">
                                </div>
                                  <div <?if(isset($_GET['show']) && $_GET['show'] !== 'primary' || !in_array("edit_pojazdy_primary", $this_user_uprawnienia)){?>style="visibility:hidden;position:absolute"<?}?> class="form-group ">
                                    <label>Kierowca</label>
									<select name="kierowca" class="form-control">
										<option>Wybierz...</option>
                                        <? 
										$sql1 = mysql_query("select * from kierowcy order by nazwa asc");
										while($data1 = mysql_fetch_array($sql1)){												
										?>										
										<option value="<?echo $data1['id'];?>" <?if($data['kierowca']==$data1['id']){?> selected <?}?>><?echo $data1['nazwa'];?></option>										
										<?
										}
										?>
									</select>
									<input type="hidden" name="old_kierowca" value="<?echo $data['kierowca'];?>" />
                                </div>	
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=<?echo $_GET['module'];?>" class="btn btn-sm btn-success">Anuluj</a>
                            </form>
							
							<?if(isset($_GET['edit'])){?>
							
								<hr/>
								
								<form action="" enctype="multipart/form-data" method="post">
								
									<table class="table">
										<tr>
											<td>Plik(i)</td>
											<td><input type="file" name="files[]" class="form-control" multiple /></td>
										</tr>						
										<?
											$sql_pliki = mysql_query("select * from pojazdy_pliki where id_pojazd = ".$_GET['edit']."");
											while($data_pliki = mysql_fetch_array($sql_pliki)){
										?>	
												<tr>
													<td><a href="upload/<?echo $data_pliki['plik'];?>"><?echo $data_pliki['plik'];?></a></td>
													<td><a href="?module=<?echo $_GET['module'];?>&edit=<?echo $_GET['edit'];?>&delfile=<?echo $data_pliki['id'];?>" class="btn btn-danger">Usuń</a></td>
												</tr>
												
										
										<?								
											}
										?>
										<tr>
											<td></td>
											<td><button type="submit" class="btn btn-sm btn-primary">Zapisz</button></td>
										</tr>
									</table>
								
								
								</form>
							
							<?}?>
							
						</div>
					</div>
				</div>
				</div>
		<?}?>
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Baza pojazdów
                        </div>
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nazwa</th>
													<th>Firma</th>
													<th>Kierowca</th>
                                                    <th>Marka</th>
                                                    <th>Model</th>													
                                                    <th>VIN</th>
                                                    <th>Rok produkcji</th>
                                                    <th>Pojemność</th>
													<th>Karta i PIN</th>
													<th>Akcje</th>
                                                </tr>
                                            </thead>

                                            <tbody>
											
											<?
												$sql = mysql_query("select * from pojazdy where zew = $sql_zew  and archiwum = $set_archive");
												while($data = mysql_fetch_assoc($sql)){
													
													////////////////////////////////////		
													///////////obliczam alerty//////////
													////////////////////////////////////
													
													$alert = false;
													
													//badanie techniczne
													$myDateTime = DateTime::createFromFormat('Y-m-d', $data['data_badania']);
													$newDateString = $myDateTime->format('d-m-Y');															
													
													$timestamp = strtotime($newDateString);
													$now = time();
													
													$days = $timestamp - $now;
											
													if($days <= 1209600)
														$alert = true;											
															
													//tacho
													$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_legalizacji_tacho']);
													$newDateString1 = $myDateTime1->format('d-m-Y');											

													$timestamp = strtotime($newDateString1);
													$now = time();
													
													$days = $timestamp - $now;
													
													if($days <= 1209600)
														$alert = true;

													//ubezpieczenie
													$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_ubezpieczenia']);
													$newDateString1 = $myDateTime1->format('d-m-Y');											

													$timestamp = strtotime($newDateString1);
													$now = time();
													
													$days = $timestamp - $now;
													
													if($days <= 1209600)
														$alert = true;
													
													
													//odczyt tacho
													$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_odczytu_tacho']);
													$newDateString1 = $myDateTime1->format('d-m-Y');											

													$timestamp = strtotime($newDateString1);
													$now = time();
													
													$days = $timestamp - $now;
													
													if($days <= 1209600)
														$alert = true;													



													//dozor tech
													if($data['doz_tech'] !== '0000-00-00'){
														$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['doz_tech']);
														$newDateString1 = $myDateTime1->format('d-m-Y');											

														$timestamp = strtotime($newDateString1);
														$now = time();
														
														$days = $timestamp - $now;
														
														if($days <= 1209600)
															$alert = true;
													}

													////////////////////////////////////		
													///////////obliczam alerty//////////
													////////////////////////////////////													
											?>											
                                                <tr>
                                                    <td><?echo $data['nazwa']; if($alert && !$zew){?> <i style="color:red" class="fa fa-exclamation warning pulse" aria-hidden="true" title="Wymagane działanie"></i> <?}?></td>
                                                    <td><?echo $data['firma'];?></td>
													<td><?echo getDriverName($data['kierowca']);?></td>
                                                    <td><?echo $data['marka'];?></td>
                                                    <td><?echo $data['model'];?></td>													
													<td><?echo $data['vin'];?></td>
                                                    <td><?echo $data['rok'];?></td>

                                                    <td><?echo $data['pojemnosc'];?></td>
													<td><?echo $data['karta'];?></td>
													<td>
														<center>
															
															<?if(in_array("show_pojazdy", $this_user_uprawnienia)){?><a href="?module=<?echo $_GET['module'];?>&open=<?echo $data['id'];?>" class="btn btn-primary">Otwórz</a><?}?>
															<?if(in_array("edit_pojazdy", $this_user_uprawnienia)){?><a href="?module=<?echo $_GET['module'];?>&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a><?}?>
															<?if(isset($_GET['archiwum'])){?> <a href="?module=<?echo $module;?>&dearchive=<?echo $data['id'];?>&archiwum" class="btn btn-warning">Dearchiwizuj</a> <?} else {?> <a href="?module=<?echo $module;?>&archive=<?echo $data['id'];?>" class="btn btn-warning">Archiwizuj</a> <?}?>
															<?if(in_array("del_pojazdy", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=<?echo $_GET['module'];?>&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
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
        </section>