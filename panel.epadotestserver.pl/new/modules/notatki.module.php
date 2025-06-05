<?
if(isset($_GET['archiwum'])) { $status = 1;  $get_archiwum = 'archiwum'; } else $status = 0;
?>
		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Notatki</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="?module=notatki">Katalog główny</a></li>		
						<?						
							$i = (int)$_GET['folder'];		
							$foldery = array();
							while($i > 0){
								
								$sql = mysql_query("select * from notatki_foldery where id = ".$i." limit 1");
								if(mysql_num_rows($sql)>0){
								$data = mysql_fetch_array($sql);
									
									$foldery[] = '<li class="breadcrumb-item"><a href="?module=notatki&folder='.$data['id'].'">'.$data['nazwa'].'</a></li>';
									
									//echo '<li class="breadcrumb-item"><a href="?module=notatki&folder='.$data['id'].'">'.$data['nazwa'].'</a></li>';
									
									$i = $data['id_folder'];
								
								} else $i = 0;						
							}

							$foldery_rev = array_reverse($foldery);	

							foreach ($foldery_rev as &$value) {
								echo $value;
							}							
						?>			
						<li class="breadcrumb-item active">Notatki</li>
					</ol>
				</div>				
				<div class="col-lg-6 align-self-center text-right">					
				<?if(!isset($_GET['add'])){?>			
					<a href="?module=notatki&folder=<?echo (int)$_GET['folder'];?>&new_folder&<?echo $get_archiwum;?>" class="btn btn-primary box-shadow btn-icon btn-rounded"><i class="fa fa-file"></i> Utwórz folder</a>							
					<?if(in_array("add_notatki", $this_user_uprawnienia)){?>									
					<?if(isset($_GET['archiwum'])){?>
						<a href="?module=notatki" class="btn btn-primary box-shadow btn-icon btn-rounded"><i class="fa fa-file"></i> Aktualne</a>
					<?} else {?>
						<a href="?module=notatki&add&folder=<?echo (int)$_GET['folder'];?>" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj notatkę</a>
					
						<a href="?module=notatki&archiwum" class="btn btn-warning box-shadow btn-icon btn-rounded"><i class="fa fa-archive"></i> Archiwum</a>
					<?}?>
					
					<?}?>
				<?}?>	
				</div>								
		</div>		
        <section class="main-content">	


		<?
		
		if($_POST['archive'] == 'archive'){
			
			mysql_query("update notatki set id_folder = '".(int)$_POST['folder']."', status = 1 where id = ".(int)$_POST['id_notatka']." limit 1");
		?>


						<div class="alert alert-success" role="alert">
						  Pomyślnie zarchiwizowano notatkę.
						</div>
		
		<?	
		}
		
		if(isset($_GET['notatka'])){		
			$id_notatka = (int)$_GET['notatka'];
			$sql = mysql_query("select * from notatki where id = $id_notatka limit 1");
			$data = mysql_fetch_array($sql);	
		?>
		
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Notatka
                        </div>
                        <div class="card-body">
							<form action="?module=notatki" method="post">
								<table class="table">
									<tr>
										<td>
											Data utworzenia
										</td>
										<td>
											<?echo $data['data'];?>
										</td>
									</tr>
									
									<tr>
										<td>
											Treść
										</td>
										<td>
											<?echo $data['tresc'];?>
										</td>
									</tr>								
									<tr>
										<td>
											<select name="folder" class="form-control">
												<?
													$sql1 = mysql_query("select * from notatki_foldery where status = 1 order by nazwa asc");
													while($data1 = mysql_fetch_array($sql1)){
												?>
												
												<option value="<?echo $data1['id'];?>"><?echo $data1['nazwa'];?></option>
												
												<?
													}
												?>
											</select>
										</td>
										<td>
											<input type="hidden" name="archive" value="archive" />
											<input type="hidden" name="id_notatka" value="<?echo $data['id'];?>" />
											<button class="btn btn-warning">Archiwizuj</button>
										</td>
									</tr>								
									
								</table>
							</form>
						</div>
					</div>
				</div>
				</div>		
		

		<?}?>
		
		<?if(isset($_GET['new_folder'])){?>	
		<?
		if(isset($_POST['nazwa'])){
			
			if(isset($_GET['archiwum'])) { $status = 1;  $get_archiwum = 'archiwum'; }else $status = 0;
			
			mysql_query("insert into notatki_foldery values ('', '".$_SESSION['id']."', '".(int)$_GET['folder']."', '".$_POST['nazwa']."', '".$_POST['typ']."', $status)");	
		}
		?>
		
		
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Utwórz folder
                        </div>
                        <div class="card-body">
							<form method="post" action="">  						
                                <div class="form-group">
                                    <label>Nazwa</label>
                                        <input name="nazwa" class="form-control" />
                                </div>                          
                                				   							   
                                <div class="form-group">
                                    <label>Typ</label>
                                        <select name="typ" class="form-control form-control-rounded">
											<option value="Prywatny">Prywatny<option>
											<option value="Biurowy">Biurowy<option>
										</select>
                                </div>							   								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=notatki&folder=<?echo (int)$_GET['folder'];?>&<?echo $get_archiwum;?>" class="btn btn-sm btn-success">Anuluj</a>
                            </form>
						</div>
					</div>
				</div>
				</div>			
		
		
		<?}?>
		
		<?
			if(isset($_GET['del_folder'])){
				$id_del = (int)$_GET['del_folder'];
				mysql_query("delete from notatki_foldery where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto folder.
						</div>
		<?		
			}
		?>		
		
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from notatki where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis.
						</div>
		<?		
			}
		?>
		
		
		<?
			if(isset($_GET['dearchive'])){
				$dearchive = (int)$_GET['dearchive'];
				mysql_query("update notatki set status = 0 where id = $dearchive");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie zdearchiwizowano.
						</div>
		<?		
			}
		?>		
		
		
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
		

	
		<?if(isset($_GET['add']) || isset($_GET['edit'])){?>
			<? if(isset($_POST['tresc'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){
					$tresc = strip_tags($_POST['tresc']);		
					$typ = strip_tags($_POST['typ']);
				


					$sql = mysql_query("insert into notatki values ('', '$tresc', NOW(), 0, '$typ', '".$_SESSION['id']."', '".$_GET['folder']."')");
					
					$sql = mysql_query("select * from notatki order by id desc limit 1");
					$data = mysql_fetch_array($sql);
					$id_notatka = $data['id'];
					
					
					if(isset($_FILES['files'])){
						foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
							$file_name = $key.$_FILES['files']['name'][$key];
							$file_size =$_FILES['files']['size'][$key];
							$file_tmp =$_FILES['files']['tmp_name'][$key];
							$file_type=$_FILES['files']['type'][$key];
							
							if(strlen($file_name)>3){
								$plik = generateRandomString(5).$file_name;
																
								move_uploaded_file($file_tmp, "upload/$plik"); 
								mysql_query("insert into notatki_pliki values ('', $id_notatka, '$plik')");
							}
						}
					} 					
					
					
																	
					if($sql){
	?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano notatkę.
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
																			
			}
			
			if(isset($_GET['edit'])){
				$id = (int)$_GET['edit'];
				$sql = mysql_query("select * from obiekty where id = $id limit 1");
				$data = mysql_fetch_array($sql);
			}

	?>
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zarządzaj notatką
                        </div>
                        <div class="card-body">
							<form enctype="multipart/form-data" method="post" action="">  						
                                <div class="form-group">
                                    <label>Treść</label>
                                        <textarea name="tresc" class="form-control"></textarea>
                                </div> 					
                                				   							   
                                <div class="form-group">
                                    <label>Typ</label>
                                        <select name="typ" class="form-control form-control-rounded">
											<option value="Prywatna">Prywatna<option>
											<option value="Biurowa">Biurowa<option>
										</select>
                                </div>

                                <div class="form-group">
                                    <label>Dołącz pliki</label>
                                        <input type="file" name="files[]" class="form-control" multiple />
                                </div> 
								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=notatki&folder=<?echo (int)$_GET['folder'];?>" class="btn btn-sm btn-success">Anuluj</a>
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
                          Foldery
                        </div>
                        <div class="card-body">
						
<!-- foldery -->	

			
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
													<th>Nazwa</th>
													<th>Typ</th>
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												if(isset($_GET['archiwum'])) { $status = 1;  $get_archiwum = 'archiwum'; }else $status = 0;
											
												$sql = mysql_query("select * from notatki_foldery where id_folder = ".(int)$_GET['folder']." and status = $status order by nazwa asc");
												while($data = mysql_fetch_assoc($sql)){
													
													if($data['typ'] == 'Biurowy' || ($data['typ'] == 'Prywatny' && $_SESSION['id'] == $data['id_uzytkownik'])){													
											?>
														<tr>
															<td><?echo $data['nazwa'];?></td>
															<td><?echo $data['typ'];?></td>											
															<td>
																<center>
																
																	<a href="?module=notatki&folder=<?echo $data['id'];?>&<?echo $get_archiwum;?>" class="btn btn-primary">Otwórz</a>
																	<?if(in_array("del_notatki", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=notatki&del_folder=<?echo $data['id'];?>&<?echo $get_archiwum;?>" class="btn btn-danger">Usuń</a><?}?>
																</center>
															</td>
														</tr>
											<?
													}
												}
											?>
                                            </tbody>
                            </table>
					
	
						
<!-- pliki -->

	                    <div class="card-header card-default">
                          Notatki
                        </div>					
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>	
													<th>Treść</th>
													<th>Pliki</th>
													<th>Typ</th>
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												if(isset($_GET['archiwum'])) { $status = 1;  $get_archiwum = 'archiwum'; }else $status = 0;
												
												$sql_add = " and id_folder = ".(int)$_GET['folder']." ";								
											
												$sql = mysql_query("select * from notatki where status = $status $sql_add order by id desc");												
												
												while($data = mysql_fetch_assoc($sql)){
													
													if($data['typ'] == 'Biurowa' || ($data['typ'] == 'Prywatna' && $_SESSION['id'] == 15) || ($data['typ'] == 'Prywatna' && $_SESSION['id'] == $data['id_uzytkownik'])){														
											?>
														<tr>
															<td><?echo $data['data'];?></td>
															<td><?echo $data['tresc'];?></td>
															<td>
															
												<?
													$sql1 = mysql_query("select * from notatki_pliki where id_notatka = ".$data['id']." order by id asc");
													while($data1 = mysql_fetch_array($sql1)){
												?>
														<a href="upload/<?echo $data1['plik'];?>" target="_blank"><?echo $data1['plik'];?></a>
												<?
													}
												?>			
															
															</td>
															<td><?echo $data['typ'];?></td>											
															<td>
																<center>
																	<a href="?module=notatki&folder=<?echo $_GET['folder'];?>&<?echo $get_archiwum;?>&notatka=<?echo $data['id'];?>" class="btn btn-primary">Otwórz</a>
																	<?if(in_array("edit_notatki", $this_user_uprawnienia)){?>
																		<?if(isset($_GET['archiwum'])) { ?>
																			<a href="?module=notatki&dearchive=<?echo $data['id'];?>&<?echo $get_archiwum;?>" class="btn btn-warning">Dearchiwizuj</a>
																		<?}else{?>
																			<a href="?module=notatki&archive=<?echo $data['id'];?>&<?echo $get_archiwum;?>" class="btn btn-warning">Archiwizuj</a>
																		<?}?>
																		
																		
																	<?}?>
																	<?if(in_array("del_notatki", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=notatki&del=<?echo $data['id'];?>&<?echo $get_archiwum;?>" class="btn btn-danger">Usuń</a><?}?>
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