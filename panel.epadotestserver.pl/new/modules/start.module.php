		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Panel Startowy</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Panel Startowy</li>
					</ol>
				</div>
				<!--
				<div class="col-lg-6 align-self-center text-right">
					<a href="#" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Utwórz nowy</a>
				</div>
				-->
		</div>
		
        <section class="main-content">
           

	
				<div class="row">
					<div class="col-lg-12 col-xlg-12">
					
					
		<?
			if(isset($_GET['archive'])){
				$archive = (int)$_GET['archive'];
				mysql_query("update notatki set status = 1 where id = $archive");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie zarchiwizowano.
						</div>
		<?		
			}
		?>		
			

<?
$i=0;
$sql = mysql_query("select * from notatki where status = 0 order by id desc");
while($data = mysql_fetch_assoc($sql))													
	if($data['typ'] == 'Biurowa' || ($data['typ'] == 'Prywatna' && $_SESSION['id'] == 15) || ($data['typ'] == 'Prywatna' && $_SESSION['id'] == $data['id_uzytkownik']))
		$i++;



if($i>0){
?>			
                        <div class="card">
							<div class="card-header card-default">
                            Notatki					
							</div>
                            <div class="card-body">
								<div class="row">
<?							
												$sql = mysql_query("select * from notatki where status = 0 order by id desc");
												while($data = mysql_fetch_assoc($sql)){													
													if($data['typ'] == 'Biurowa' || ($data['typ'] == 'Prywatna' && $_SESSION['id'] == 15)){															
?>															
															<div class="col-md-3">
																<div class="widget  bg-light" style="background-color: #ffffcc !important;">
																	<div class="row row-table ">
																		<i><?echo $data['data'];?></i><br/>
																		<?echo $data['tresc'];?>
																		<br/>
																		<a href="?module=start&archive=<?echo $data['id'];?>" title="Archiwizuj"><i class="fa fa-archive"></i></a>
																	</div>
																</div>
															</div>	
														
<?
													}
												}
?>
								</div>							
							</div>
						</div>
<?}?>												
					</div>
				</div>
		
				<div class="row">
					<div class="col-lg-8 col-xlg-9">
                        <div class="card">
							<div class="card-header card-default">
                            Zbliżające się terminy					
							</div>
                            <div class="card-body">
								<div class="row">
							<? 
								$sql = mysql_query("select * from pojazdy where zew = 0 and archiwum = 0 and (
													data_badania <= (NOW() + INTERVAL 14 DAY)
												 OR data_legalizacji_tacho <= (NOW() + INTERVAL 14 DAY)
												 OR data_ubezpieczenia <= (NOW() + INTERVAL 25 DAY)
												 OR data_odczytu_tacho <= (NOW() + INTERVAL 14 DAY)
												 OR (doz_tech <= (NOW() + INTERVAL 14 DAY) AND doz_tech != '0000-00-00')
												 )
												 ");
												 
								while($data = mysql_fetch_array($sql)){									 
							
							
													if($data['data_badania'] !== '0000-00-00'){
														//badanie techniczne
														$myDateTime = DateTime::createFromFormat('Y-m-d', $data['data_badania']);
														$newDateString = $myDateTime->format('d-m-Y');															
														
														$timestamp = strtotime($newDateString);
														$now = time();
														
														$days = $timestamp - $now;													
														$days_count = round($days / 60 / 60 / 24);
												
														if($days <= 1209600){
															
															if($days_count > 10)
																$warn = 'success';
															
															if($days_count <= 10)
																$warn = 'warning';

															if($days_count < 3)
																$warn = 'danger';														
	?>														

															<?if(in_array("show_data_badania", $this_user_uprawnienia)){?>
															<div class="col-md-3">
																<div class="widget  bg-light">
																	<div class="row row-table ">
																		<div class="margin-b-30">
																			<h2 class="margin-b-5"><?echo $data['nazwa'];?></h2>
																			<p class="text-muted">Badanie tech.</p>
																			<span class="float-right text-<?echo $warn;?> widget-r-m"><?echo $days_count.' dni';?></span>
																			<small>Ostatni wpis: <b><?echo $newDateString;?></b></small>
																		</div>
																		<div class="progress margin-b-10 progress-mini">
																			<div style="width:<?echo ($days_count/14)*100?>%;" class="progress-bar bg-<?echo $warn;?>"></div>
																		</div>
																		<p class="text-muted float-left margin-b-0"><a href="?module=pojazdy&open=<?echo $data['id'];?>">Przejdź</a></p>
																		
																	</div>
																</div>
															</div>
															<?}?>
	<?
														}														
													}

													if($data['data_legalizacji_tacho'] !== '0000-00-00'){
													//tacho
													$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_legalizacji_tacho']);
													$newDateString1 = $myDateTime1->format('d-m-Y');											

													$timestamp = strtotime($newDateString1);
													$now = time();
													
													$days = $timestamp - $now;
													$days_count = round($days / 60 / 60 / 24);
													
													if($days <= 1209600){
														
														if($days_count > 10)
															$warn = 'success';
														
														if($days_count <= 10)
															$warn = 'warning';

														if($days_count < 3)
															$warn = 'danger';													
?>														

														<?if(in_array("show_leg_tacho", $this_user_uprawnienia)){?>
														<div class="col-md-3">
															<div class="widget  bg-light">
																<div class="row row-table ">
																	<div class="margin-b-30">
																		<h2 class="margin-b-5"><?echo $data['nazwa'];?></h2>
																		<p class="text-muted">Legalizacja tacho</p>
																		<span class="float-right text-<?echo $warn;?> widget-r-m"><?echo $days_count.' dni';?></span>
																		<small>Ostatni wpis: <b><?echo $newDateString1;?></b></small>
																	</div>
																	<div class="progress margin-b-10 progress-mini">
																		<div style="width:<?echo ($days_count/14)*100?>%;" class="progress-bar bg-<?echo $warn;?>"></div>
																	</div>
																	<p class="text-muted float-left margin-b-0"><a href="?module=pojazdy&open=<?echo $data['id'];?>">Przejdź</a></p>
																	
																</div>
															</div>
														</div>														
														<?}?>
<?
													}
													}
													
													
													if($data['data_ubezpieczenia'] !== '0000-00-00'){
														//ubezpieczenie
														$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_ubezpieczenia']);
														$newDateString1 = $myDateTime1->format('d-m-Y');											

														$timestamp = strtotime($newDateString1);
														$now = time();
														
														$days = $timestamp - $now;
														$days_count = round($days / 60 / 60 / 24);
														
														if($days <= 1209600){
															
															if($days_count > 20)
																$warn = 'success';
															
															if($days_count <= 20)
																$warn = 'warning';

															if($days_count < 14)
																$warn = 'danger';														
	?>														
															<?if(in_array("show_oc", $this_user_uprawnienia)){?>
															<div class="col-md-3">
																<div class="widget  bg-light">
																	<div class="row row-table ">
																		<div class="margin-b-30">
																			<h2 class="margin-b-5"><?echo $data['nazwa'];?></h2>
																			<p class="text-muted">Ubezpieczenie</p>
																			<span class="float-right text-<?echo $warn;?> widget-r-m"><?echo $days_count.' dni';?></span>
																			<small>Ostatni wpis: <b><?echo $newDateString1;?></b></small>
																		</div>
																		<div class="progress margin-b-10 progress-mini">
																			<div style="width:<?echo ($days_count/14)*100?>%;" class="progress-bar bg-<?echo $warn;?>"></div>
																		</div>
																		<p class="text-muted float-left margin-b-0"><a href="?module=pojazdy&open=<?echo $data['id'];?>">Przejdź</a></p>
																		
																	</div>
																</div>
															</div>	
															<?}?>
															
	<?
														}
													}													
							?>
							

<?
													if($data['data_odczytu_tacho'] !== '0000-00-00'){
														//odczyt tacho
														$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['data_odczytu_tacho']);
														$newDateString1 = $myDateTime1->format('d-m-Y');											

														$timestamp = strtotime($newDateString1);
														$now = time();
														
														$days = $timestamp - $now;
														$days_count = round($days / 60 / 60 / 24);
														
														if($days <= 1209600){
															
															if($days_count > 10)
																$warn = 'success';
															
															if($days_count <= 10)
																$warn = 'warning';

															if($days_count < 3)
																$warn = 'danger';														
	?>														
															<?if(in_array("show_odc_tacho", $this_user_uprawnienia)){?>
															<div class="col-md-3">
																<div class="widget  bg-light">
																	<div class="row row-table ">
																		<div class="margin-b-30">
																			<h2 class="margin-b-5"><?echo $data['nazwa'];?></h2>
																			<p class="text-muted">Odczyt TACHO</p>
																			<span class="float-right text-<?echo $warn;?> widget-r-m"><?echo $days_count.' dni';?></span>
																			<small>Ostatni wpis: <b><?echo $newDateString1;?></b></small>
																		</div>
																		<div class="progress margin-b-10 progress-mini">
																			<div style="width:<?echo ($days_count/14)*100?>%;" class="progress-bar bg-<?echo $warn;?>"></div>
																		</div>
																		<p class="text-muted float-left margin-b-0"><a href="?module=pojazdy&open=<?echo $data['id'];?>">Przejdź</a></p>
																		
																	</div>
																</div>
															</div>
														<?}?>
															
	<?
														}
													}													
							?>
							
							
							
<?
													//dozor tech
													
													if($data['doz_tech'] !== '0000-00-00'){
																								
														$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data['doz_tech']);
														$newDateString1 = $myDateTime1->format('d-m-Y');											

														$timestamp = strtotime($newDateString1);
														$now = time();
														
														$days = $timestamp - $now;
														$days_count = round($days / 60 / 60 / 24);
														
														if($days <= 1209600){
															
															if($days_count > 10)
																$warn = 'success';
															
															if($days_count <= 10)
																$warn = 'warning';

															if($days_count < 3)
																$warn = 'danger';														
	?>														
															<?if(in_array("show_dt", $this_user_uprawnienia)){?>
															<div class="col-md-3">
																<div class="widget  bg-light">
																	<div class="row row-table ">
																		<div class="margin-b-30">
																			<h2 class="margin-b-5"><?echo $data['nazwa'];?></h2>
																			<p class="text-muted">Dozór techniczny</p>
																			<span class="float-right text-<?echo $warn;?> widget-r-m"><?echo $days_count.' dni';?></span>
																			<small>Ostatni wpis: <b><?echo $newDateString1;?></b></small>
																		</div>
																		<div class="progress margin-b-10 progress-mini">
																			<div style="width:<?echo ($days_count/14)*100?>%;" class="progress-bar bg-<?echo $warn;?>"></div>
																		</div>
																		<p class="text-muted float-left margin-b-0"><a href="?module=pojazdy&open=<?echo $data['id'];?>">Przejdź</a></p>
																		
																	</div>
																</div>
															</div>														
															<?}?>
	<?
														}
													}													
							?>							
							



									

							<?
								}
								
							?>
							
							
							<?
								$sql = mysql_query("select * from pojazdy where zew = 0 and archiwum = 0");
								while($data = mysql_fetch_array($sql)){
									
									$id_pojazd = $data['id'];
									
									$sql1 = mysql_query("select * from naprawy where id_pojazd = $id_pojazd and rodzaj like 'Oleje i Fitry' order by data_naprawy desc limit 1");
									$data1 = mysql_fetch_array($sql1);
									
									if(mysql_num_rows($sql1)>0){
									
										$myDateTime1 = DateTime::createFromFormat('Y-m-d', $data1['data_naprawy']);
										$newDateString1 = $myDateTime1->format('d-m-Y');											

										$timestamp = strtotime($newDateString1);
										$now = time();
														
										$days = $now - $timestamp;
										
									
										
										if($days > 10368000){
											
											$days_count = round($days / 60 / 60 / 24 / 30);
											
											
									
							?>
													<?if(in_array("show_start_olej", $this_user_uprawnienia)){?>
														<div class="col-md-3">
															<div class="widget  bg-light">
																<div class="row row-table ">
																	<div class="margin-b-30">
																		<h2 class="margin-b-5"><?echo $data['nazwa'];?></h2>
																		<p class="text-muted">Serwis olejowy</p>
																		<span class="float-right text-primary widget-r-m">Teraz</span>
																		<small>Ostatni serwis: <b><?echo $days_count;?> miesiące temu</b></small>
																	</div>
																	<div class="progress margin-b-10 progress-mini">
																		<div style="width:<?echo (4/$days_count)*100?>%;" class="progress-bar bg-primary"></div>
																	</div>
																	<p class="text-muted float-left margin-b-0"><a href="?module=pojazdy&open=<?echo $data['id'];?>">Przejdź</a></p>
																	
																</div>
															</div>
														</div>								
													<?}?>
							
							<?
										}
									}
								}
							?>
								</div>
                            </div>
                        </div>						
					
					
					
					
					<?if(in_array("show_zadania", $this_user_uprawnienia)){?>
					
                        <div class="card">
							<div class="card-header card-default">
                            Zadania
							</div>
                            <div class="card-body">
								<div class="row">
											<?
											$i_zadan = 0;
											$sql = mysql_query("select * from zadania where status like 'Nowe' order by id desc");
											while($data = mysql_fetch_array($sql)){
												$i_zadan++;
											?>


															<div class="col-md-6">
																<div class="card">
																	<div class="card-header  card-danger">																	  
																	   <a href="?module=zadania&open=<?echo $data['id'];?>">#<?echo str_pad($data['id'], 7, '0', STR_PAD_LEFT);?></a>																	   
																	</div>
																	<div class="card-body">
																		<small><?echo $data['data'];?></small>
																		<p><?echo $data['tresc'];?></p>
																	</div>
																</div>
															</div>
											<?
											}
											?>
											
											<?
											$sql = mysql_query("select * from zadania where status like 'W trakcie' order by id desc");
											while($data = mysql_fetch_array($sql)){
												$i_zadan++;
											?>


															<div class="col-md-6">
																<div class="card">
																	<div class="card-header  card-primary">
																	
																	<div class="row">
																		<div class="col-md-6 col-sm-12">
																			<a href="?module=zadania&open=<?echo $data['id'];?>">#<?echo str_pad($data['id'], 7, '0', STR_PAD_LEFT);?></a>
																		</div>
																		
																		<div class="col-md-6 col-sm-12 text-right fe-pulse">
																			<small>W trakcie...</small>
																		</div>																		
																	</div>
																	
																	   
																	   
																	</div>
																	<div class="card-body">
																		<small><?echo $data['data'];?></small>
																		<p><?echo $data['tresc'];?></p>
																	</div>
																</div>
															</div>
											<?
											}
											
											if($i_zadan == 0){
											?>	
											<div class="col-md-12 text-center">
												<p align="center">Aktualnie brak zadań w systemie.</p>
											</div>
											<?
											}
											?>											
											
								</div> 
                            </div>
                        </div>					
					
					
						<?}?>
					
					
					
					
					<?if(in_array("show_usterki", $this_user_uprawnienia) && in_array("show_start_usterki", $this_user_uprawnienia)){?>
					
                        <div class="card">
							<div class="card-header card-default">
                            Usterki wymagające naprawy
							</div>
                            <div class="card-body">
								<div class="row">
											<?
											$sql = mysql_query("select * from usterki where status like 'Nowe' order by id desc");
											while($data = mysql_fetch_array($sql)){
											?>


															<div class="col-md-6">
																<div class="card">
																	<div class="card-header  card-danger">
																	   <a href="?module=usterki&open=<?echo $data['id'];?>"><?echo getCarName($data['id_pojazd']);?></a>
																	   <small><?echo getCarMark($data['id_pojazd']);?> <?echo getCarModel($data['id_pojazd']);?></small>
																	   <br/>
																	   <i><?echo getDriverName(getCarDriver($data['id_pojazd']));?></i>
																	</div>
																	<div class="card-body">
																		<small><?echo $data['data'];?></small>
																		<p><?echo $data['usterka'];?></p>
																	</div>
																</div>
															</div>
											<?
											}
											?>
											
											<?
											$sql = mysql_query("select * from usterki where status like 'W trakcie naprawy' order by id desc");
											while($data = mysql_fetch_array($sql)){
											?>


															<div class="col-md-6">
																<div class="card">
																	<div class="card-header  card-primary">
																	
																	<div class="row">
																		<div class="col-md-6 col-sm-12">
																			<a href="?module=usterki&open=<?echo $data['id'];?>"><?echo getCarName($data['id_pojazd']);?></a>
																		</div>
																		
																		<div class="col-md-6 col-sm-12 text-right fe-pulse">
																			<small>Trwa naprawa...</small>
																		</div>																		
																	</div>
																	
																	   
																	   
																	</div>
																	<div class="card-body">
																		<small><?echo $data['data'];?></small>
																		<p><?echo $data['usterka'];?></p>
																	</div>
																</div>
															</div>
											<?
											}
											?>											
											
								</div> 
                            </div>
                        </div>
						
					<?}?>
						
						
                    </div>
					
					<div class="col-md-4">
						<div class="card">
							<br/>
							<iframe frameborder="0" id="randomid" src="https://i.meteoapi.com/plugin/box?theme=white&amp;version=1.0&amp;data=hourly&amp;data_limit=1&amp;place_id=217" width="100%" height="250" scrolling="no" style="margin: auto;"></iframe>							
							<br/>
						</div>
						
						<div class="card">
							<div class="card-header card-default">
                            Ceny paliw Orlen
							</div>
                            <div class="card-body">							
								<table class="table table-hover">
									<tbody>							
								<?
									$sql = mysql_query("select * from orlen_products");
									while($data = mysql_fetch_array($sql)){
								?>
									<tr>
										<td><?echo $data['name'];?></td>
										<td><?echo $data['price'];?></td>

									</tr>																
								<?
									}
								?>								
									</tbody>
								</table>								
							</div>																			
						</div>	

						<div class="card">
							<div class="card-header card-default">
                            Kurs Walut
							</div>
                            <div class="card-body">							
								<div id="cinkciarzPlWidget" style="margin:0 auto;"></div>
								<div id="cinkciarzPlWidgetNbp"></div>
								<script src="https://cinkciarz.pl/widget/cinkciarz.widget.js?currencies=CHF,EUR,GBP,RUB,USD"></script>			
							</div>																			
						</div>	
						
					</div>					
				</div>      
        </section>
 