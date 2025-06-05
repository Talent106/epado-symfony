		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Historia Usterek</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Usterki</li>
					</ol>
				</div>
				<?if(!isset($_GET['add'])){?>
				<div class="col-lg-6 align-self-center text-right">
					<?if(in_array("add_usterki", $this_user_uprawnienia)){?><a href="?module=usterki&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Zgłoś usterkę</a><?}?>
				</div>
				<?}?>
				
		</div>
		
        <section class="main-content">
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from usterki where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis o usterce.
						</div>
		<?		
			}
		if(isset($_GET['open'])){			
			$id = (int)$_GET['open'];
			
			$sql = mysql_query("select * from usterki where id = $id limit 1");
			$data = mysql_fetch_array($sql);
			
		?>
		 <div class="row">
			  <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                            Usterka <b>#<?echo str_pad((int)$_GET['open'], 7, '0', STR_PAD_LEFT);?></b>
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
                                <td><?echo $data['kierowca'];?></td>
                            </tr>
                            <tr>
                                <td><b>Data zgłoszenia</b></td>
                                <td><?echo $data['data'];?></td>
                            </tr>                          
                            <tr>
                                <td><b>Opis usterki</b></td>
                                <td><?echo nl2br($data['usterka']);?></td>
                            </tr>							
                            <tr>
                                <td><b>Status</b></td>
                                <td><span class ="label label-<?echo statusColor($data['status']);?>"><?echo $data['status'];?></span></td>
                            </tr>								
                            </tbody>
                        </table>			
						<a href="?module=usterki&edit=<?echo $id;?>" class="btn btn-warning">Zmień status</a> <a href="?module=usterki" class="btn btn-primary">Zamknij</a>					
                         </div>
                    </div>
                </div>
			 </div>		 
			<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                            Historia usterki
                        </div>			
                        <div class="card-body">
                            <section id="cd-timeline" class="cd-container">
							
                                <div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-danger">
                                        
                                    </div> 
                                    <div class="cd-timeline-content">
                                        <h2><?echo $data['kierowca'];?></h2>
                                        <p><?echo $data['usterka'];?></p>
                                       
                                        <span class="cd-date"><?echo $data['data'];?></span>
                                    </div> 
                                </div> 							
<?
	$sql = mysql_query("select * from usterki_historia where id_usterki = $id order by id asc");
	while($data = mysql_fetch_array($sql)){
?>								
								
                                <div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-<?echo statusColor($data['status']);?>">
                                       
                                    </div> 
                                    <div class="cd-timeline-content">
										<h2><?echo $data['mechanik'];?></h2>
                                        <h5>dodał: <?echo getUserName($data['id_uzytkownik']);?></h5>
                                        <p><span class ="label label-<?echo statusColor($data['status']);?>"><?echo $data['status'];?></span></p>
                                        <p><?echo $data['uwagi'];?></p>
                                        <span class="cd-date"><?echo $data['data'];?></span>
                                    </div> 
                                </div> 								
<?
	}
?>
                            </section>
                        </div>
                    </div>
                </div>
            </div> 			  
		<?}?>	
		<?if(isset($_GET['add'])){?>
			<? if(isset($_POST['pojazd'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){				
					$pojazd = strip_tags($_POST['pojazd']);
					$usterka = strip_tags($_POST['usterka']);
					$kierowca = strip_tags($_POST['kierowca']);	

					$sql = mysql_query("insert into usterki values ('', '$pojazd', '$usterka', NOW(), 'Nowe', '$kierowca')");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zgłoszono usterkę.
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

	?>		
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zgłoś usterkę
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
										<option value="<? echo $data['id']; ?>" <?if($data['id'] == (int)$_GET['add']){?> selected <?}?>><? echo $data['nazwa']; ?></option>
									<?
										}
									?>
									</select>
                                </div>
                                <div class="form-group ">
                                    <label>Usterka</label>
                                        <textarea name="usterka"><?echo $data['usterka'];?></textarea>
                                </div>                         
                                <div class="form-group ">
                                    <label>Zgłaszający</label>
                                        <input type="text" value="<?echo getUserName($_SESSION['id']);?>" name="kierowca" class="form-control form-control-rounded">
                                </div>	                             						
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=usterki" class="btn btn-sm btn-success">Anuluj</a>
                            </form>
						</div>
					</div>
				</div>
				</div>
		<?}?>
		<?
		if(isset($_GET['edit'])){
			$id = (int)$_GET['edit'];
		?>
			<? if(isset($_POST['status'])){ 
				//EDYCJA
				if(isset($_GET['edit'])){				
					$status = strip_tags($_POST['status']);
					$uwagi = strip_tags($_POST['uwagi']);
					$mechanik = strip_tags($_POST['mechanik']);
					
					$sql = mysql_query("update usterki set status = '$status' where id = $id limit 1");				
					mysql_query("insert into usterki_historia values ('', $id, '$status', NOW(), ".(int)$_SESSION['id'].", '$uwagi', '$mechanik')");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zaktualizowano usterkę.
						</div>				
	<?					
					} else {
	?>	
						<div class="alert alert-success" role="alert">
						  Błąd podczas zaktualizacji: <?echo mysql_error();?>
						</div>					
	<?					
					}	
				}	
			}

	?>
	<?
		$sql = mysql_query("select * from usterki where id = $id limit 1");
		$data = mysql_fetch_array($sql);
	?>	
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zaktualizuj status usterki #<?echo str_pad($id, 7, '0', STR_PAD_LEFT);?>
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">
                                <div class="form-group ">
                                    <label>Status</label>							
									<select name="status" class="form-control form-control-rounded">
										<option value="Nowe" <?if($data['status'] == "Nowe"){?> selected <?}?>>Nowe</option>
										<option value="W trakcie naprawy" <?if($data['status'] == "W trakcie naprawy"){?> selected <?}?>>W trakcie naprawy</option>
										<option value="Naprawione" <?if($data['status'] == "Naprawione"){?> selected <?}?>>Naprawione</option>
										<option value="Anulowane" <?if($data['status'] == "Anulowane"){?> selected <?}?>>Anulowane</option>
									</select>
                                </div> 
                                <div class="form-group ">
                                    <label>Mechanik</label>
                                        <input class="form-control form-control-rounded" value="<?echo getUserName($_SESSION['id']);?>" name="mechanik" />
                                </div>								
                                <div class="form-group ">
                                    <label>Uwagi</label>
                                        <textarea name="uwagi"></textarea>
                                </div>								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=usterki" class="btn btn-sm btn-success">Anuluj</a>
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
                          Historia usterek
                        </div>
                        <div class="card-body">
                            <table id="datatable4" class="table table-striped dt-responsive">
                                            <thead>
                                                <tr>
													<th>#</th>
													<th>Status</th>
                                                    <th>Pojazd</th>
                                                    <th>Usterka</th>
                                                    <th>Data zgłoszenia</th>
													<th>Ostatnia modyfikacja</th>   
													<th>Dodał</th>												
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												$sql = mysql_query("select * from usterki order by id desc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
													<td>#<?echo str_pad($data['id'], 7, '0', STR_PAD_LEFT);?></td>
													<td><span style="color:transparent"><?echo statusToNumber($data['status']);?></span><span class ="label label-<?echo statusColor($data['status']);?>"><?echo $data['status'];?></span></td>
                                                    <td><?echo getCarName($data['id_pojazd']);?></td>
                                                    <td><?echo $data['usterka'];?></td>
                                                    <td><?echo $data['data'];?></td>
													<td>
														<?
															$sql1 = mysql_query("select * from usterki_historia where id_usterki = ".$data['id']." order by id desc limit 1");
															$data1 = mysql_fetch_array($sql1);
															echo $data1['data'];
														?>
													</td>		
                                                    <td><?echo $data['kierowca'];?></td>
													<td>
														<center>
															<?if(in_array("show_usterki", $this_user_uprawnienia)){?><a href="?module=usterki&open=<?echo $data['id'];?>" class="btn btn-primary">Otwórz</a><?}?>
															<?if(in_array("edit_usterki", $this_user_uprawnienia)){?><a href="?module=usterki&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a><?}?>
															<?if(in_array("del_usterki", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=usterki&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
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
		
		
		
		
 