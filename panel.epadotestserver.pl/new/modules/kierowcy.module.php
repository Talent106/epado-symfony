<?	if($zew){
		$sql_zew = 1;
		$module = 'kierowcyzew';
}else{
		$sql_zew = 0;
		$module = 'kierowcy';
}


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
				<div class="col-lg-6 align-self-center ">
				  <h2>Kierowcy <?if($zew){?> zewnętrzni <?} else {?>wewnętrzni<?}?></h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Kierowcy <?if($zew){?> zewnętrzni <?} else {?>wewnętrzni<?}?></li>
					</ol>
				</div>
				
				<div class="col-lg-6 align-self-center text-right">
					
				<?if(isset($_GET['archiwum'])){?>
					<a href="?module=<?echo $module;?>" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Aktualne</a>
				<?}else{?>
					<a href="?module=<?echo $module;?>&archiwum" class="btn btn-danger box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Archiwum</a>
				<?}?>
					
				<?if(!isset($_GET['add'])){?>
					<?if(in_array("add_kierowcy", $this_user_uprawnienia)){?><a href="?module=<?echo $module;?>&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj kierowcę</a><?}?>
				<?}?>	
				</div>
				
				
		</div>
		
        <section class="main-content">
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from kierowcy where id = $id_del limit 1");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis.
						</div>
		<?		
			}
		?>
		
		
		<?
			if(isset($_GET['archive'])){
				$id_archive = (int)$_GET['archive'];
				mysql_query("update kierowcy set archiwum = 1 where id = $id_archive limit 1");
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
				mysql_query("update kierowcy set archiwum = 0 where id = $id_archive limit 1");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie zdearchiwizowano wpis.
						</div>
		<?		
			}
		?>			
		

	
		<?if(isset($_GET['add']) || isset($_GET['edit'])){?>
			<? if(isset($_POST['nazwa'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){
					$telefon = strip_tags($_POST['telefon']);		
					$nazwa = strip_tags($_POST['nazwa']);
					$pesel = strip_tags($_POST['pesel']);
					$uwagi = strip_tags($_POST['uwagi']);
					$nrdow = strip_tags($_POST['nrdow']);
					$karta = strip_tags($_POST['karta']);
					

					$sql = mysql_query("insert into kierowcy values ('', '$telefon', '$nazwa', '$pesel', '$uwagi', '$sql_zew', '$nrdow', 0, '$karta')");
																	
					if($sql){
	?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano kierowcę.
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
					
					$telefon = strip_tags($_POST['telefon']);		
					$nazwa = strip_tags($_POST['nazwa']);
					$pesel = strip_tags($_POST['pesel']);
					$uwagi = strip_tags($_POST['uwagi']);
					$nrdow = strip_tags($_POST['nrdow']);
					$karta = strip_tags($_POST['karta']);
					

					$sql = mysql_query("update kierowcy set telefon = '$telefon', nazwa = '$nazwa', pesel = '$pesel', uwagi = '$uwagi', nrdow = '$nrdow', karta = '$karta' where id = $id limit 1");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zapisano kierowcę.
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
				$id = (int)$_GET['edit'];
				$sql = mysql_query("select * from kierowcy where id = $id limit 1");
				$data = mysql_fetch_array($sql);
				
				if(isset($_GET['delfile'])){
					mysql_query("delete from kierowcy_pliki where id = ".$_GET['delfile']." limit 1");
					
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
								mysql_query("insert into kierowcy_pliki values ('', ".$_GET['edit'].", '$plik')");
							}
						}
					} 				
				
			}

	?>
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zarządzaj kierowcą
                        </div>
                        <div class="card-body">
							<form  method="post" action="">  						
                                <div class="form-group">
                                    <label>Nazwa</label>
                                        <input type="text" value="<?echo $data['nazwa'];?>" name="nazwa" class="form-control form-control-rounded">
                                </div>
								
                                <div class="form-group">
                                    <label>Telefon</label>
                                        <input type="text" value="<?echo $data['telefon'];?>" name="telefon" class="form-control form-control-rounded">
                                </div>   

                                <div class="form-group">
                                    <label>PESEL</label>
                                        <input type="text" value="<?echo $data['pesel'];?>" name="pesel" class="form-control form-control-rounded">
                                </div>
								

                                <div class="form-group">
                                    <label>Nr i seria dowodu osobistego</label>
                                        <input type="text" value="<?echo $data['nrdow'];?>" name="nrdow" class="form-control form-control-rounded">
                                </div>

                                <div class="form-group">
                                    <label>Karta i PIN</label>
                                        <input type="text" value="<?echo $data['karta'];?>" name="karta" class="form-control form-control-rounded">
                                </div>								

                                <div class="form-group">
                                    <label>Uwagi</label>
                                        <input type="text" value="<?echo $data['uwagi'];?>" name="uwagi" class="form-control form-control-rounded">
                                </div>
								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=<?echo $module;?>" class="btn btn-sm btn-success">Anuluj</a>
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
											$sql_pliki = mysql_query("select * from kierowcy_pliki where id_kierowca = ".$_GET['edit']."");
											while($data_pliki = mysql_fetch_array($sql_pliki)){
										?>	
												<tr>
													<td><a target="_blank" href="upload/<?echo $data_pliki['plik'];?>"><?echo $data_pliki['plik'];?></a></td>
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
                          Kierowcy
                        </div>
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nazwa</th>	
													<th>Telefon</th>
													<th>PESEL</th>
													<th>Nr dowodu</th>
													<th>Uwagi</th>
													<th>Karta i PIN</th>
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												$sql = mysql_query("select * from kierowcy where zew = $sql_zew and archiwum = $set_archive order by id desc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
                                                    <td><?echo $data['nazwa'];?></td>
													<td><?echo $data['telefon'];?></td>
													<td><?echo $data['pesel'];?></td>
													<td><?echo $data['nrdow'];?></td>
													<td><?echo $data['uwagi'];?></td>	
													<td><?echo $data['karta'];?></td>	
													<td>
														<center>
															<?if(isset($_GET['archiwum'])){?> <a href="?module=<?echo $module;?>&dearchive=<?echo $data['id'];?>&archiwum" class="btn btn-warning">Dearchiwizuj</a> <?} else {?> <a href="?module=<?echo $module;?>&archive=<?echo $data['id'];?>" class="btn btn-warning">Archiwizuj</a> <?}?>
															<?if(in_array("edit_kierowcy", $this_user_uprawnienia)){?><a href="?module=<?echo $module;?>&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a><?}?>
															<?if(in_array("del_kierowcy", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=<?echo $module;?>&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
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