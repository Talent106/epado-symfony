		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Historia Zadań</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Zadania</li>
					</ol>
				</div>
				<?if(!isset($_GET['add'])){?>
				<div class="col-lg-6 align-self-center text-right">
					<?if(in_array("add_zadania", $this_user_uprawnienia)){?><a href="?module=zadania&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Nowe zadanie</a><?}?>
				</div>
				<?}?>
				
		</div>
		
        <section class="main-content">
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from zadania where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis o zadaniu.
						</div>
		<?		
			}
		if(isset($_GET['open'])){			
			$id = (int)$_GET['open'];
			
			$sql = mysql_query("select * from zadania where id = $id limit 1");
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
                                <td><b>Opis zadania</b></td>
                                <td><?echo nl2br($data['tresc']);?></td>
                            </tr>							
                            <tr>
                                <td><b>Status</b></td>
                                <td><span class ="label label-<?echo statusColor($data['status']);?>"><?echo $data['status'];?></span></td>
                            </tr>								
                            </tbody>
                        </table>			
						<a href="?module=zadania&edit=<?echo $id;?>" class="btn btn-warning">Zmień status</a> <a href="?module=zadania" class="btn btn-primary">Zamknij</a>					
                         </div>
                    </div>
                </div>
			 </div>		 
			<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                            Historia zadania
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
	$sql = mysql_query("select * from zadania_historia where id_zadania = $id order by id asc");
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
			<? if(isset($_POST['opis'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){				
					$opis = strip_tags($_POST['opis']);


					$sql = mysql_query("insert into zadania values ('', '$opis', NOW(), 'Nowe')");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zgłoszono zadanie.
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
                          Zgłoś zadanie
                        </div>
                        <div class="card-body">
							<form method="post" action="">
                                <div class="form-group ">
                                    <label>Zadanie</label>
                                        <textarea name="opis"><?echo $data['opis'];?></textarea>
                                </div>                         	                             						
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=zadania" class="btn btn-sm btn-success">Anuluj</a>
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
					
					$sql = mysql_query("update zadania set status = '$status' where id = $id limit 1");				
					mysql_query("insert into zadania_historia values ('', $id, '$status', NOW(), ".(int)$_SESSION['id'].", '$uwagi')");
																	
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
		$sql = mysql_query("select * from zadania where id = $id limit 1");
		$data = mysql_fetch_array($sql);
	?>	
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zaktualizuj status zadania #<?echo str_pad($id, 7, '0', STR_PAD_LEFT);?>
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
								<a href="?module=zadania" class="btn btn-sm btn-success">Anuluj</a>
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
                          Historia zadań
                        </div>
                        <div class="card-body">
                            <table id="datatable4" class="table table-striped dt-responsive">
                                            <thead>
                                                <tr>
													<th>#</th>
													<th>Status</th>                                           
                                                    <th>Opis</th>
                                                    <th>Data zgłoszenia</th>
													<th>Ostatnia modyfikacja</th>   																	
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												$sql = mysql_query("select * from zadania order by id desc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
													<td>#<?echo str_pad($data['id'], 7, '0', STR_PAD_LEFT);?></td>
													<td><span style="color:transparent"><?echo statusToNumber($data['status']);?></span><span class ="label label-<?echo statusColor($data['status']);?>"><?echo $data['status'];?></span></td>                                  
                                                    <td><?echo $data['tresc'];?></td>
                                                    <td><?echo $data['data'];?></td>
													<td>
														<?
															$sql1 = mysql_query("select * from zadania_historia where id_zadania = ".$data['id']." order by id desc limit 1");
															$data1 = mysql_fetch_array($sql1);
															echo $data1['data'];
														?>
													</td>		                                              
													<td>
														<center>
															<?if(in_array("show_zadania", $this_user_uprawnienia)){?><a href="?module=zadania&open=<?echo $data['id'];?>" class="btn btn-primary">Otwórz</a><?}?>
															<?if(in_array("edit_zadania", $this_user_uprawnienia)){?><a href="?module=zadania&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a><?}?>
															<?if(in_array("del_zadania", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=zadania&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
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