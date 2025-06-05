		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Historia Zadań</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">pojazdy_koszty</li>
					</ol>
				</div>
				<?if(!isset($_GET['add'])){?>
				<div class="col-lg-6 align-self-center text-right">
					<?if(in_array("add_pojazdy_koszty", $this_user_uprawnienia)){?><a href="?module=koszty&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Nowy koszt</a><?}?>
				</div>
				<?}?>
				
		</div>
		
        <section class="main-content">
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from pojazdy_koszty where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis o zadaniu.
						</div>
		<?		
			}
		if(isset($_GET['open'])){			
			$id = (int)$_GET['open'];
			
			$sql = mysql_query("select * from pojazdy_koszty where id = $id limit 1");
			$data = mysql_fetch_array($sql);
			
		?>
		 <div class="row">
			  <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                            Zadanie <b>#<?echo str_pad((int)$_GET['open'], 7, '0', STR_PAD_LEFT);?></b>
                        </div>
                        <div class="card-body">						
                            <table class="table">
                            <tbody>
                            <tr>
                                <td><b>Data zgłoszenia</b></td>
                                <td><?echo $data['data'];?></td>
                            </tr>                          
                            <tr>
                                <td><b>Opis pojazdy_koszty</b></td>
                                <td><?echo nl2br($data['tresc']);?></td>
                            </tr>							
                            <tr>
                                <td><b>Status</b></td>
                                <td><span class ="label label-<?echo statusColor($data['status']);?>"><?echo $data['status'];?></span></td>
                            </tr>								
                            </tbody>
                        </table>			
						<a href="?module=koszty&edit=<?echo $id;?>" class="btn btn-warning">Zmień status</a> <a href="?module=koszty" class="btn btn-primary">Zamknij</a>					
                         </div>
                    </div>
                </div>
			 </div>		 
			<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                            Historia pojazdy_koszty
                        </div>			
                        <div class="card-body">
                            <section id="cd-timeline" class="cd-container">
							
                                <div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-danger">
                                        
                                    </div> 
                                    <div class="cd-timeline-content">
                                        <p><?echo $data['tresc'];?></p>
                                       
                                        <span class="cd-date"><?echo $data['data'];?></span>
                                    </div> 
                                </div> 							
<?
	$sql = mysql_query("select * from pojazdy_koszty_historia where id_pojazdy_koszty = $id order by id asc");
	while($data = mysql_fetch_array($sql)){
?>								
								
                                <div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-<?echo statusColor($data['status']);?>">
                                       
                                    </div> 
                                    <div class="cd-timeline-content">
										
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
					$produkty = strip_tags($_POST['produkty']);
					$koszt = strip_tags($_POST['koszt']);

					$sql = mysql_query("insert into pojazdy_koszty values ('', '$produkty', '$koszt', NOW(), $pojazd, ".$_SESSION['id'].")");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano koszty.
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
                          Dodaj koszty
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
							
                                <div class="form-group ">
                                    <label>Wykaz części/usług</label>
                                        <textarea name="produkty"></textarea>
                                </div> 

                                <div class="form-group ">
                                    <label>Koszt całkowity</label>
                                        <input name="koszt" placeholder="0.00" class="form-control" />
                                </div>   								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=koszty" class="btn btn-sm btn-success">Anuluj</a>
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
					
					$sql = mysql_query("update pojazdy_koszty set status = '$status' where id = $id limit 1");				
					mysql_query("insert into pojazdy_koszty_historia values ('', $id, '$status', NOW(), ".(int)$_SESSION['id'].", '$uwagi')");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zaktualizowano zadanie.
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
		$sql = mysql_query("select * from pojazdy_koszty where id = $id limit 1");
		$data = mysql_fetch_array($sql);
	?>	
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zaktualizuj status pojazdy_koszty #<?echo str_pad($id, 7, '0', STR_PAD_LEFT);?>
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">
                                <div class="form-group ">
                                    <label>Status</label>							
									<select name="status" class="form-control form-control-rounded">
										<option value="Nowe" <?if($data['status'] == "Nowe"){?> selected <?}?>>Nowe</option>
										<option value="W trakcie" <?if($data['status'] == "W trakcie"){?> selected <?}?>>W trakcie</option>
										<option value="Zakończone" <?if($data['status'] == "Zakończone"){?> selected <?}?>>Zakończone</option>
										<option value="Anulowane" <?if($data['status'] == "Anulowane"){?> selected <?}?>>Anulowane</option>
									</select>
                                </div> 								
                                <div class="form-group ">
                                    <label>Uwagi</label>
                                        <textarea name="uwagi"></textarea>
                                </div>								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=koszty" class="btn btn-sm btn-success">Anuluj</a>
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
                          Rejestr kosztów
                        </div>
                        <div class="card-body">
                            <table id="datatable4" class="table table-striped dt-responsive">
                                            <thead>
                                                <tr>
													<th>#</th>
													<th>Pojazd</th>                                           
                                                    <th>Produkty</th>
                                                    <th>Koszt</th>
													<th>Data</th>   																	
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												$sql = mysql_query("select * from pojazdy_koszty order by id desc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
													<td>#<?echo str_pad($data['id'], 5, '0', STR_PAD_LEFT);?></td>                                 
                                                    <td><?echo getCarName($data['id_pojazd']);?></td>
													<td><?echo nl2br($data['produkty']);?></td>
													<td><?echo $data['koszt'];?></td>
                                                    <td><?echo $data['data'];?></td>		                                              
													<td>
														<center>
															<?if(in_array("del_pojazdy_koszty", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=koszty&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
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