		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Grupy użytkowników</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Grupy użytkowników</li>
					</ol>
				</div>
				
				<div class="col-lg-6 align-self-center text-right">
					<a href="?module=ustawienia" class="btn btn-primary box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Użytkownicy</a>
				<?if(!isset($_GET['add'])){?>
					<a href="?module=grupy&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj grupę</a>
				<?}?>	
				</div>
				
				
		</div>
		
        <section class="main-content">
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from grupy where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis.
						</div>
		<?		
			}
		?>
		

	
		<?if(isset($_GET['add']) || isset($_GET['edit'])){?>
			<? if(isset($_POST['nazwa'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){				
					$nazwa = strip_tags($_POST['nazwa']);
					$uprawnienia = implode(",", $_POST['uprawnienia']);

					$sql = mysql_query("insert into grupy values ('', '$nazwa', '$uprawnienia')");
																	
					if($sql){
	?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano grupę.
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
					$uprawnienia = implode(",", $_POST['uprawnienia']);

					$sql = mysql_query("update grupy set nazwa = '$nazwa', uprawnienia = '$uprawnienia' where id = $id limit 1");
																	
					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zapisano grupę.
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
				$sql = mysql_query("select * from grupy where id = $id limit 1");
				$data = mysql_fetch_array($sql);
				
				
				$uprawnienia = explode(",", $data['uprawnienia']);
			}

	?>
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zarządzaj grupą
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">  						
                                 <div class="form-group">
                                    <label>Nazwa</label>
                                        <input type="text" value="<?echo $data['nazwa'];?>" name="nazwa" class="form-control form-control-rounded">
                                </div>
								
                                <div class="form-group">
                                    <label>Pojazdy</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_pojazdy" name="uprawnienia[]" id="show_pojazdy" <?if(in_array("show_pojazdy", $uprawnienia)){?> checked <?}?> /> <label for="show_pojazdy">Podgląd</label></td>
											<td><input type="checkbox" value="add_pojazdy" name="uprawnienia[]" id="add_pojazdy" <?if(in_array("add_pojazdy", $uprawnienia)){?> checked <?}?> /> <label for="add_pojazdy">Dodawanie</label></td>
											<td><input type="checkbox" value="del_pojazdy" name="uprawnienia[]" id="del_pojazdy" <?if(in_array("del_pojazdy", $uprawnienia)){?> checked <?}?> /> <label for="del_pojazdy">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_pojazdy" name="uprawnienia[]" id="edit_pojazdy" <?if(in_array("edit_pojazdy", $uprawnienia)){?> checked <?}?> /> <label for="edit_pojazdy">Edycja</label></td>
										</tr>
									</table>
                                </div> 


                                <div class="form-group">
                                    <label>Edycja pojazdów</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="edit_pojazdy_primary" name="uprawnienia[]" id="edit_pojazdy_primary" <?if(in_array("edit_pojazdy_primary", $uprawnienia)){?> checked <?}?> /> <label for="edit_pojazdy_primary">Główne info</label></td>
											<td><input type="checkbox" value="edit_pojazdy_info" name="uprawnienia[]" id="edit_pojazdy_info" <?if(in_array("edit_pojazdy_info", $uprawnienia)){?> checked <?}?> /> <label for="edit_pojazdy_info">Marka/model</label></td>
											<td><input type="checkbox" value="edit_pojazdy_parts" name="uprawnienia[]" id="edit_pojazdy_parts" <?if(in_array("edit_pojazdy_parts", $uprawnienia)){?> checked <?}?> /> <label for="edit_pojazdy_parts">Podzespoły</label></td>
											<td><input type="checkbox" value="edit_pojazdy_termins" name="uprawnienia[]" id="edit_pojazdy_termins" <?if(in_array("edit_pojazdy_termins", $uprawnienia)){?> checked <?}?> /> <label for="edit_pojazdy_termins">Terminy</label></td>
										</tr>
									</table>
                                </div>		

								
                                <div class="form-group">
                                    <label>Rejestr napraw</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_rejestr" name="uprawnienia[]" id="show_rejestr" <?if(in_array("show_rejestr", $uprawnienia)){?> checked <?}?> /> <label for="show_rejestr">Podgląd</label></td>
											<td><input type="checkbox" value="add_rejestr" name="uprawnienia[]" id="add_rejestr" <?if(in_array("add_rejestr", $uprawnienia)){?> checked <?}?> /> <label for="add_rejestr">Dodawanie</label></td>
											<td><input type="checkbox" value="del_rejestr" name="uprawnienia[]" id="del_rejestr" <?if(in_array("del_rejestr", $uprawnienia)){?> checked <?}?> /> <label for="del_rejestr">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_rejestr" name="uprawnienia[]" id="edit_rejestr" <?if(in_array("edit_rejestr", $uprawnienia)){?> checked <?}?> /> <label for="edit_rejestr">Edycja</label></td>
										</tr>
									</table>
                                </div>  
                                <div class="form-group">
                                    <label>Usterki</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_usterki" name="uprawnienia[]" id="show_usterki" <?if(in_array("show_usterki", $uprawnienia)){?> checked <?}?> /> <label for="show_usterki">Podgląd</label></td>
											<td><input type="checkbox" value="add_usterki" name="uprawnienia[]" id="add_usterki" <?if(in_array("add_usterki", $uprawnienia)){?> checked <?}?> /> <label for="add_usterki">Dodawanie</label></td>
											<td><input type="checkbox" value="del_usterki" name="uprawnienia[]" id="del_usterki" <?if(in_array("del_usterki", $uprawnienia)){?> checked <?}?> /> <label for="del_usterki">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_usterki" name="uprawnienia[]" id="edit_usterki" <?if(in_array("edit_usterki", $uprawnienia)){?> checked <?}?> /> <label for="edit_usterki">Edycja</label></td>
										</tr>
									</table>
                                </div> 
                                <div class="form-group">
                                    <label>Użytkownicy</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_uzytkownicy" name="uprawnienia[]" id="show_uzytkownicy" <?if(in_array("show_uzytkownicy", $uprawnienia)){?> checked <?}?> /> <label for="show_uzytkownicy">Podgląd</label></td>
											<td><input type="checkbox" value="add_uzytkownicy" name="uprawnienia[]" id="add_uzytkownicy" <?if(in_array("add_uzytkownicy", $uprawnienia)){?> checked <?}?> /> <label for="add_uzytkownicy">Dodawanie</label></td>
											<td><input type="checkbox" value="del_uzytkownicy" name="uprawnienia[]" id="del_uzytkownicy" <?if(in_array("del_uzytkownicy", $uprawnienia)){?> checked <?}?> /> <label for="del_uzytkownicy">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_uzytkownicy" name="uprawnienia[]" id="edit_uzytkownicy" <?if(in_array("edit_uzytkownicy", $uprawnienia)){?> checked <?}?> /> <label for="edit_uzytkownicy">Edycja</label></td>
										</tr>
									</table>
                                </div>	
								
                                <div class="form-group">
                                    <label>Kierowcy</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_kierowcy" name="uprawnienia[]" id="show_kierowcy" <?if(in_array("show_kierowcy", $uprawnienia)){?> checked <?}?> /> <label for="show_kierowcy">Podgląd</label></td>
											<td><input type="checkbox" value="add_kierowcy" name="uprawnienia[]" id="add_kierowcy" <?if(in_array("add_kierowcy", $uprawnienia)){?> checked <?}?> /> <label for="add_kierowcy">Dodawanie</label></td>
											<td><input type="checkbox" value="del_kierowcy" name="uprawnienia[]" id="del_kierowcy" <?if(in_array("del_kierowcy", $uprawnienia)){?> checked <?}?> /> <label for="del_kierowcy">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_kierowcy" name="uprawnienia[]" id="edit_kierowcy" <?if(in_array("edit_kierowcy", $uprawnienia)){?> checked <?}?> /> <label for="edit_kierowcy">Edycja</label></td>
										</tr>
									</table>
                                </div>								
								
                                <div class="form-group">
                                    <label>Magazyn</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_magazyn" name="uprawnienia[]" id="show_magazyn" <?if(in_array("show_magazyn", $uprawnienia)){?> checked <?}?> /> <label for="show_magazyn">Podgląd</label></td>
											<td><input type="checkbox" value="add_magazyn" name="uprawnienia[]" id="add_magazyn" <?if(in_array("add_magazyn", $uprawnienia)){?> checked <?}?> /> <label for="add_magazyn">Dodawanie</label></td>
											<td><input type="checkbox" value="del_magazyn" name="uprawnienia[]" id="del_magazyn" <?if(in_array("del_magazyn", $uprawnienia)){?> checked <?}?> /> <label for="del_magazyn">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_magazyn" name="uprawnienia[]" id="edit_magazyn" <?if(in_array("edit_magazyn", $uprawnienia)){?> checked <?}?> /> <label for="edit_magazyn">Edycja</label></td>
										</tr>
									</table>
                                </div>	

                                <div class="form-group">
                                    <label>Zadania</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_zadania" name="uprawnienia[]" id="show_zadania" <?if(in_array("show_zadania", $uprawnienia)){?> checked <?}?> /> <label for="show_zadania">Podgląd</label></td>
											<td><input type="checkbox" value="add_zadania" name="uprawnienia[]" id="add_zadania" <?if(in_array("add_zadania", $uprawnienia)){?> checked <?}?> /> <label for="add_zadania">Dodawanie</label></td>
											<td><input type="checkbox" value="del_zadania" name="uprawnienia[]" id="del_zadania" <?if(in_array("del_zadania", $uprawnienia)){?> checked <?}?> /> <label for="del_zadania">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_zadania" name="uprawnienia[]" id="edit_zadania" <?if(in_array("edit_zadania", $uprawnienia)){?> checked <?}?> /> <label for="edit_zadania">Edycja</label></td>
										</tr>
									</table>
                                </div>


                                <div class="form-group">
                                    <label>Obiekty logistyczne</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_obiekty" name="uprawnienia[]" id="show_obiekty" <?if(in_array("show_obiekty", $uprawnienia)){?> checked <?}?> /> <label for="show_obiekty">Podgląd</label></td>
											<td><input type="checkbox" value="add_obiekty" name="uprawnienia[]" id="add_obiekty" <?if(in_array("add_obiekty", $uprawnienia)){?> checked <?}?> /> <label for="add_obiekty">Dodawanie</label></td>
											<td><input type="checkbox" value="del_obiekty" name="uprawnienia[]" id="del_obiekty" <?if(in_array("del_obiekty", $uprawnienia)){?> checked <?}?> /> <label for="del_obiekty">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_obiekty" name="uprawnienia[]" id="edit_obiekty" <?if(in_array("edit_obiekty", $uprawnienia)){?> checked <?}?> /> <label for="edit_obiekty">Edycja</label></td>
										</tr>
									</table>
                                </div>	


                                <div class="form-group">
                                    <label>Notatki</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_notatki" name="uprawnienia[]" id="show_notatki" <?if(in_array("show_notatki", $uprawnienia)){?> checked <?}?> /> <label for="show_notatki">Podgląd</label></td>
											<td><input type="checkbox" value="add_notatki" name="uprawnienia[]" id="add_notatki" <?if(in_array("add_notatki", $uprawnienia)){?> checked <?}?> /> <label for="add_notatki">Dodawanie</label></td>
											<td><input type="checkbox" value="del_notatki" name="uprawnienia[]" id="del_notatki" <?if(in_array("del_notatki", $uprawnienia)){?> checked <?}?> /> <label for="del_notatki">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_notatki" name="uprawnienia[]" id="edit_notatki" <?if(in_array("edit_notatki", $uprawnienia)){?> checked <?}?> /> <label for="edit_notatki">Edycja</label></td>
										</tr>
									</table>
                                </div>
								
								
                                <div class="form-group">
                                    <label>Koszty</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_pojazdy_koszty" name="uprawnienia[]" id="show_pojazdy_koszty" <?if(in_array("show_pojazdy_koszty", $uprawnienia)){?> checked <?}?> /> <label for="show_pojazdy_koszty">Podgląd</label></td>
											<td><input type="checkbox" value="add_pojazdy_koszty" name="uprawnienia[]" id="add_pojazdy_koszty" <?if(in_array("add_pojazdy_koszty", $uprawnienia)){?> checked <?}?> /> <label for="add_pojazdy_koszty">Dodawanie</label></td>
											<td><input type="checkbox" value="del_pojazdy_koszty" name="uprawnienia[]" id="del_pojazdy_koszty" <?if(in_array("del_pojazdy_koszty", $uprawnienia)){?> checked <?}?> /> <label for="del_pojazdy_koszty">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_pojazdy_koszty" name="uprawnienia[]" id="edit_pojazdy_koszty" <?if(in_array("edit_pojazdy_koszty", $uprawnienia)){?> checked <?}?> /> <label for="edit_pojazdy_koszty">Edycja</label></td>
										</tr>
									</table>
                                </div>

                                <div class="form-group">
                                    <label>Zlecenia transportowe</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_zlecenia" name="uprawnienia[]" id="show_zlecenia" <?if(in_array("show_zlecenia", $uprawnienia)){?> checked <?}?> /> <label for="show_zlecenia">Podgląd</label></td>
											<td><input type="checkbox" value="add_zlecenia" name="uprawnienia[]" id="add_zlecenia" <?if(in_array("add_zlecenia", $uprawnienia)){?> checked <?}?> /> <label for="add_zlecenia">Dodawanie</label></td>
											<td><input type="checkbox" value="del_zlecenia" name="uprawnienia[]" id="del_zlecenia" <?if(in_array("del_zlecenia", $uprawnienia)){?> checked <?}?> /> <label for="del_zlecenia">Usuwanie</label></td>
											<td><input type="checkbox" value="edit_zlecenia" name="uprawnienia[]" id="edit_zlecenia" <?if(in_array("edit_zlecenia", $uprawnienia)){?> checked <?}?> /> <label for="edit_zlecenia">Edycja</label></td>
										</tr>
									</table>
                                </div>


                                <div class="form-group">
                                    <label>Terminy</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_leg_tacho" name="uprawnienia[]" id="show_leg_tacho" <?if(in_array("show_leg_tacho", $uprawnienia)){?> checked <?}?> /> <label for="show_leg_tacho">Legalizacja tacho</label></td>
											<td><input type="checkbox" value="show_odc_tacho" name="uprawnienia[]" id="show_odc_tacho" <?if(in_array("show_odc_tacho", $uprawnienia)){?> checked <?}?> /> <label for="show_odc_tacho">Odczyt tacho</label></td>
											<td><input type="checkbox" value="show_data_badania" name="uprawnienia[]" id="show_data_badania" <?if(in_array("show_data_badania", $uprawnienia)){?> checked <?}?> /> <label for="show_data_badania">Badanie techniczne</label></td>
											<td><input type="checkbox" value="show_oc" name="uprawnienia[]" id="show_oc" <?if(in_array("show_oc", $uprawnienia)){?> checked <?}?> /> <label for="show_oc">Data ubezpieczenia</label></td>
											<td><input type="checkbox" value="show_dt" name="uprawnienia[]" id="show_dt" <?if(in_array("show_dt", $uprawnienia)){?> checked <?}?> /> <label for="show_dt">Dozór tech.</label></td>
										</tr>
									</table>
                                </div>
								
								
                                <div class="form-group">
                                    <label>Panel startowy</label>
									<table class="table">
										<tr>
											<td><input type="checkbox" value="show_start_usterki" name="uprawnienia[]" id="show_start_usterki" <?if(in_array("show_start_usterki", $uprawnienia)){?> checked <?}?> /> <label for="show_start_usterki">Usterki</label></td>
											<td><input type="checkbox" value="show_start_olej" name="uprawnienia[]" id="show_start_olej" <?if(in_array("show_start_olej", $uprawnienia)){?> checked <?}?> /> <label for="show_start_olej">Serwis olejowy</label></td>
										</tr>
									</table>
                                </div>								
								
								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=grupy" class="btn btn-sm btn-success">Anuluj</a>
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
                          Grupy użytkowników
                        </div>
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
													<th>#</th>
                                                    <th>Nazwa</th>									
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												$sql = mysql_query("select * from grupy order by id desc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
													<td>#<?echo $data['id'];?></td>
                                                    <td><?echo $data['nazwa'];?></td>
													<td>
														<center>
															<a href="?module=grupy&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a>
															<a onclick="return confirm('Czy na pewno usunąć?')" href="?module=grupy&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a>
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