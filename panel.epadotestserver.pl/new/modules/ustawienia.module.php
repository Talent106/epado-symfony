		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Ustawienia systemu</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Ustawienia</li>
					</ol>
				</div>

				
				<div class="col-lg-6 align-self-center text-right">
				
					<a href="?module=grupy" class="btn btn-primary box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Grupy użytkowników</a>
					<?if(!isset($_GET['add'])){?>
					<?if(in_array("add_uzytkownicy", $this_user_uprawnienia)){?><a href="?module=ustawienia&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj użytkownika</a><?}?>
					<?}?>
				</div>
				
				
		</div>
		
        <section class="main-content">
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from uzytkownicy where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis o naprawie.
						</div>
		<?		
			}
		?>
		

	
		<?if(isset($_GET['add']) || isset($_GET['edit'])){?>
			<? if(isset($_POST['haslo'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){				
					$nazwa = strip_tags($_POST['nazwa']);
					$login = strip_tags($_POST['login']);
					$haslo = strip_tags($_POST['haslo']);
					$grupa = strip_tags($_POST['grupa']);					
					$email = strip_tags($_POST['email']);

					$sql = mysql_query("insert into uzytkownicy values ('', '$login', '$haslo', '$nazwa', '$grupa', '$email')");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano użytkownika.
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
					$login = strip_tags($_POST['login']);
					$haslo = strip_tags($_POST['haslo']);	
					$grupa = strip_tags($_POST['grupa']);
					$email = strip_tags($_POST['email']);

					$sql = mysql_query("update uzytkownicy set haslo = '$haslo', grupa = '$grupa', email = '$email' where id = $id limit 1");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zapisano użytkownika.
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
				$sql = mysql_query("select * from uzytkownicy where id = $id limit 1");
				$data = mysql_fetch_array($sql);
			}

	?>
		
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zarządzaj użytkownikiem
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">  						
                                 <div class="form-group">
                                    <label>Nazwa wyświetlana</label>
                                        <input type="text" value="<?echo $data['nazwa'];?>" name="nazwa" class="form-control form-control-rounded" <?if(isset($_GET['edit'])){?>disabled<?}?>>
                                </div>                             
                                <div class="form-group">
                                    <label>Login</label>
                                        <input type="text" value="<?echo $data['login'];?>" name="login" class="form-control form-control-rounded" <?if(isset($_GET['edit'])){?>disabled<?}?>>
                                </div>     
                                <div class="form-group">
                                    <label>Email</label>
                                        <input type="text" value="<?echo $data['email'];?>" name="email" class="form-control form-control-rounded">
                                </div> 
								
                                <div class="form-group">
                                    <label>Hasło</label>
									 <div class="input-group" id="show_hide_password">
                                        <input type="password" value="<?echo $data['haslo'];?>" name="haslo" class="form-control form-control-rounded">
										  <div class="input-group-addon">
											<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
										  </div>
									 </div>										  
                                </div> 
                                <div class="form-group">
                                    <label>Grupa</label>
                                        <select name="grupa" class="form-control form-control-rounded">
										<?
											$sql1 = mysql_query("select * from grupy order by nazwa asc");
											while($data1 = mysql_fetch_array($sql1)){
										?>
										
											<option value="<?echo $data1['id'];?>" <?if($data['grupa'] == $data1['id']){?> selected <?}?>><?echo $data1['nazwa'];?></option>
										
										<?
											}
										?>
										</select>
                                </div> 

								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=ustawienia" class="btn btn-sm btn-success">Anuluj</a>
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
                          Użytkownicy systemu
                        </div>
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
													<th>#</th>
                                                    <th>Login</th>
                                                    <th>Nazwa</th>											
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												$sql = mysql_query("select * from uzytkownicy order by id desc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
													<td>#<?echo $data['id'];?></td>
                                                    <td><?echo $data['login'];?></td>
                                                    <td><?echo $data['nazwa'];?></td>
													<td>
														<center>
															<?if(in_array("edit_uzytkownicy", $this_user_uprawnienia)){?><a href="?module=ustawienia&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a><?}?>
															<?if(in_array("del_uzytkownicy", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=ustawienia&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
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