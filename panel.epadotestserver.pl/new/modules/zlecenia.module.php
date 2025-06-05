		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Zlecenia transportowe</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Zlecenia transportowe</li>
					</ol>
				</div>
				
				<div class="col-lg-6 align-self-center text-right">
					
				<?if(isset($_GET['zaladunki'])){?>
					<a href="?module=zlecenia&add&zaladunki" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj miejsce załadunku</a>
					<a href="?module=zlecenia" class="btn btn-primary box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Zlecenia</a>
				<?} else {?>
					<a href="?module=zlecenia&add&zaladunki" class="btn btn-primary box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Załadunki</a>				
	
					<?if(!isset($_GET['add'])){?>
						<?if(in_array("add_zlecenia", $this_user_uprawnienia)){?>
							<a href="?module=zlecenia&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj zlecenie</a>
						<?}?>
					<?}?>

				<?}?>
				</div>			
		</div>
		
        <section class="main-content">

		<?if(isset($_GET['zaladunki'])){?>
		

		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from zaladunki where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis.
						</div>
		<?		
			}
		?>

		
		<?if(isset($_GET['add'])){?>
		
		
			<?if(isset($_POST['nazwa'])){?>
			
	<?	
					$nazwa = strip_tags($_POST['nazwa']);

					$sql = mysql_query("insert into zaladunki values ('', '$nazwa')");
																	
					if($sql){
	?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano zlecenie.
						</div>				
	<?
					} else {
	?>
						<div class="alert alert-success" role="alert">
						  Błąd podczas dodawania: <?echo mysql_error();?>
						</div>					
	<?		
					}			
			
			}?>
		
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zarządzaj zleceniem
                        </div>
                        <div class="card-body">
							<form method="post" action="">  	
                                <div class="form-group">
                                    <label>Nazwa</label>
                                    <input class="form-control form-control-rounded" name="nazwa" />
                                </div> 							   								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=zlecenia&zaladunki" class="btn btn-sm btn-success">Anuluj</a>
                            </form>
						</div>
					</div>
				</div>
				</div>		
		
		<?}?>

			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
						<div class="card-body">
							<h3>Baza załadunków</h3>

                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nazwa</th>													
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												$sql = mysql_query("select * from zaladunki order by id desc");
												while($data = mysql_fetch_assoc($sql)){													
											?>
														<tr>
															<td><?echo $data['nazwa'];?></td>
															<td>
																<center>
																	<?if(in_array("del_zlecenia", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=zlecenia&zaladunki&del=<?echo $data['id'];?>&<?echo $get_archiwum;?>" class="btn btn-danger">Usuń</a><?}?>
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

		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from zlecenia where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis.
						</div>
		<?		
			}
		?>

		<?if(isset($_GET['add']) || isset($_GET['edit'])){?>
			<? if(isset($_POST['kierowca'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){					
					$zaladunek = strip_tags($_POST['zaladunek']);		
					$rozladunek = strip_tags($_POST['rozladunek']);
					$data = strip_tags($_POST['data']);
					$kierowca = strip_tags($_POST['kierowca']);
					$godzina = strip_tags($_POST['godzina']);
					$uwagi = strip_tags($_POST['uwagi']);
					
					$myDateTime1 = DateTime::createFromFormat('d-m-Y', $data);
					$data = $myDateTime1->format('Y-m-d');	

					$sql = mysql_query("insert into zlecenia values ('', '$zaladunek', '$rozladunek', '$kierowca', '$data $godzina', '$uwagi')");
																	
					if($sql){
	?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano zlecenie.
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
			
			if(isset($_GET['edit'])){
					$id = (int)$_GET['edit'];
					$zaladunek = strip_tags($_POST['zaladunek']);		
					$rozladunek = strip_tags($_POST['rozladunek']);
					$data = strip_tags($_POST['data']);
					$kierowca = strip_tags($_POST['kierowca']);	
					$godzina = strip_tags($_POST['godzina']);
					$uwagi = strip_tags($_POST['uwagi']);

					$myDateTime1 = DateTime::createFromFormat('d-m-Y', $data);
					$data = $myDateTime1->format('Y-m-d');	
					
			
					$sql = mysql_query("update zlecenia set zaladunek = '$zaladunek', rozladunek = '$rozladunek', data2 = '$data $godzina', kierowca = '$kierowca', uwagi = '$uwagi' where id = $id limit 1");

					if($sql){
	?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano zlecenie.
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
				echo mysql_error();																			
			}
			
			if(isset($_GET['edit'])){
				$id = (int)$_GET['edit'];
				$sql = mysql_query("select * from zlecenia where id = $id limit 1");
				$data = mysql_fetch_array($sql);
			}

	?>
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zarządzaj zleceniem
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">  	
                                <div class="form-group">
                                    <label>Załadunek</label>
                                        <select name="zaladunek" class="form-control form-control-rounded">
											<?
											$sql1 = mysql_query("select * from zaladunki order by nazwa asc");
											while($data1 = mysql_fetch_array($sql1)){
												
												if(isset($_GET['edit'])){
													
													if($data1['nazwa'] == $data['zaladunek']) $selected = 'selected'; else $selected = '';
													
												}
												
											?>
												<option value="<?echo $data1['nazwa'];?>" <?echo $selected;?>><?echo $data1['nazwa'];?></option>
											<?}?>
										</select>
                                </div> 								
                                <div class="form-group">
                                    <label>Rozładunek</label>
                                        <select name="rozladunek" id="rozladunek" class="form-control form-control-rounded">
											<?
											$sql1 = mysql_query("select * from zlecenia group by rozladunek order by rozladunek asc");
											while($data1 = mysql_fetch_array($sql1)){		
												if(isset($_GET['edit'])){											
													if($data1['rozladunek'] == $data['rozladunek']) $selected = 'selected'; else $selected = '';													
												}
											?>
												<option value="<?echo $data1['rozladunek'];?>" <?echo $selected;?>><?echo $data1['rozladunek'];?></option>
											<?}?>
										</select>
                                </div> 
								<?$rozladunek_js = 'yes';?>
                                <div class="form-group">
                                    <label>Data</label>
                                        <input type="text" class="form-control form-control-rounded datepicker" name="data" <?if(isset($_GET['edit'])){?> 
										
										
										<?
										
											$myDateTime1 = DateTime::createFromFormat('Y-m-d', explode(" ",$data['data2'])[0]);
											$data2 = $myDateTime1->format('d-m-Y');										
										?>
										
										value="<?echo $data2;?>" 
										
										
										
										<?}?> />
                                </div>	
                                <div class="form-group">
                                    <label>Godzina</label>
										<select name="godzina" class="form-control form-control-rounded">
													<?
														for($i=0;$i<24;$i++){
															
															$value = ''.str_pad($i, 2, 0, STR_PAD_LEFT).':00';
															
														
															
															if($value.':00' == explode(" ",$data['data2'])[1]) $selected = 'selected'; else $selected = '';
															
															echo '<option value="'.$value.'" '.$selected.'>'.str_pad($i, 1, 0, STR_PAD_LEFT).':00</option>';
														}
													?>
										</select>
                                </div>
                                <div class="form-group">
                                    <label>Obiekt logistyczny</label>
												<select name="kierowca" class="form-control form-control-rounded">
													<?
													$sql1 = mysql_query("select * from obiekty order by id desc");
													while($data1 = mysql_fetch_array($sql1)){
														if(getCarName($data1['id_auto']).' '. getDriverName($data1['id_kierowca']) == $data['kierowca']) $selected = 'selected'; else $selected = '';
													?>
														<option value="<?echo getCarName($data1['id_auto']);?> <?echo getDriverName($data1['id_kierowca']);?>" <?echo $selected;?>><?echo getCarName($data1['id_auto']);?> <?echo getDriverName($data1['id_kierowca']);?></option>
													<?}?>
												</select>	
                                </div>

                                <div class="form-group">
                                    <label>Uwagi</label>
                                        <input type="text" class="form-control form-control-rounded" name="uwagi" <?if(isset($_GET['edit'])){?> value="<?echo ($data['uwagi']);?>" <?}?> />
                                </div>	

								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=zlecenia" class="btn btn-sm btn-success">Anuluj</a>
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
                          Zlecenia transportowe
                        </div>
                        <div class="card-body">
						<form method="get" action="?module=zlecenia">
							<div class="row">								
									<div class="col-md-6 col-sm-12">
										<div class="row">
											<div class="col-md-4">
												<select name="kierowca" class="form-control form-control-rounded">
													<option value="">- Obiekt logistyczny -</option>
													<?
													$sql1 = mysql_query("select * from obiekty order by id desc");
													while($data1 = mysql_fetch_array($sql1)){
														if(getCarName($data1['id_auto']).' '. getDriverName($data1['id_kierowca']) == $_GET['kierowca']) $selected = 'selected'; else $selected = '';
													?>
														<option value="<?echo $data1['id'];?>" <?echo $selected;?>><?echo getCarName($data1['id_auto']);?> <?echo getDriverName($data1['id_kierowca']);?></option>
													<?}?>
												</select>											
											</div>
											<div class="col-md-4">						
												<select name="zaladunek" class="form-control form-control-rounded">
													<option value="">- Załadunek -</option>
													<?
													$sql1 = mysql_query("select * from zlecenia group by zaladunek order by zaladunek asc");
													while($data1 = mysql_fetch_array($sql1)){														
														if(isset($_GET['zaladunek'])) if($_GET['zaladunek'] == $data1['zaladunek']) $selected = 'selected'; else $selected = '';																																								
													?>
														<option value="<?echo $data1['zaladunek'];?>" <?echo $selected;?>><?echo $data1['zaladunek'];?></option>
													<?}?>
												</select>							
											</div>
											<div class="col-md-4">											
												<select name="rozladunek" class="form-control form-control-rounded">
													<option value="">- Rozładunek -</option>
													<?
													$sql1 = mysql_query("select * from zlecenia group by rozladunek order by rozladunek asc");
													while($data1 = mysql_fetch_array($sql1)){														
														if(isset($_GET['rozladunek'])) if($_GET['rozladunek'] == $data1['rozladunek']) $selected = 'selected'; else $selected = '';																																									
													?>
														<option value="<?echo $data1['rozladunek'];?>" <?echo $selected;?>><?echo $data1['rozladunek'];?></option>
													<?}?>
												</select>						
											</div>											
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="row">
											<div class="col-md-4 text-right">
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
												<input type="hidden" name="module" value="zlecenia" />
												<input type="submit" value="Filtruj" class="btn btn-success" />
											</div>										
										</div>																
									</div>								
							</div>
						</form>	
						<br/>
					
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Załadunek</th>	
													<th>Rozładunek</th>
													<th>Data / godzina</th>
													<th>Obiekt</th>
													<th>Uwagi</th>
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?	

												$sql_add = '';
												
												if(isset($_GET['od'])){
													$od = $_GET['od'];		


													$myDateTime1 = DateTime::createFromFormat('d-m-Y', $od);
													$od = $myDateTime1->format('Y-m-d');	
													
													$sql_add .= " and data2 >= '$od 00:00:00' ";
												}
												
												if(isset($_GET['do'])){
													$do = $_GET['do'];	

													$myDateTime1 = DateTime::createFromFormat('d-m-Y', $do);
													$do = $myDateTime1->format('Y-m-d');	
													
													$sql_add .= " and data2 <= '$do 23:59:59' ";
												}
																							
											
											
												if(($_GET['zaladunek'] !== '' && isset($_GET['zaladunek'])))
													$sql_add .= ' and zaladunek = "'.$_GET['zaladunek'].'" ';
												
												if(($_GET['rozladunek'] !== '' && isset($_GET['rozladunek'])))
													$sql_add .= ' and rozladunek = "'.$_GET['rozladunek'].'" ';												
												
												if(($_GET['kierowca'] !== '' && isset($_GET['kierowca'])))
													$sql_add .= ' and kierowca = "'.$_GET['kierowca'].'" ';							

												$sql = mysql_query("select * from zlecenia where 1=1 $sql_add order by id desc");						
												while($data = mysql_fetch_assoc($sql)){													
											?>
														<tr>
															<td><?echo $data['zaladunek'];?></td>
															<td><?echo $data['rozladunek'];?></td>
															<td><?echo $data['data2'];?></td>
															<td><?echo $data['kierowca'];?></td>
															<td><?echo $data['uwagi'];?></td>
															<td>
																<center>
																	<?if(in_array("edit_zlecenia", $this_user_uprawnienia)){?>																		
																			<a href="?module=zlecenia&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a>																																		
																	<?}?>
																	<?if(in_array("del_zlecenia", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=zlecenia&del=<?echo $data['id'];?>&<?echo $get_archiwum;?>" class="btn btn-danger">Usuń</a><?}?>
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