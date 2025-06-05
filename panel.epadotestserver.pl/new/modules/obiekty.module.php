
		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		<div class="row page-header no-background no-shadow margin-b-0">
				<div class="col-lg-6 align-self-center ">
				  <h2>Obiekty logistyczne</h2>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Start</a></li>
						<li class="breadcrumb-item active">Obiekty logistyczne</li>
					</ol>
				</div>
				
				<div class="col-lg-6 align-self-center text-right">
					
				<?if(!isset($_GET['add'])){?>
					<?if(in_array("add_obiekty", $this_user_uprawnienia)){?><a href="?module=obiekty&add" class="btn btn-success box-shadow btn-icon btn-rounded"><i class="fa fa-plus"></i> Dodaj obiekt</a><?}?>
				<?}?>	
				</div>
				
				
		</div>
		
        <section class="main-content">
		
		<?
			if(isset($_GET['del'])){
				$id_del = (int)$_GET['del'];
				mysql_query("delete from obiekty where id = $id_del");
		?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie usunięto wpis.
						</div>
		<?		
			}
		?>
		

	
		<?if(isset($_GET['add']) || isset($_GET['edit'])){?>
			<? if(isset($_POST['id_samochod'])){ 		
			
				//DODAWANIE
				if(isset($_GET['add'])){
					$id_samochod = strip_tags($_POST['id_samochod']);		
					$id_przyczepa = strip_tags($_POST['id_przyczepa']);
					$id_kierowca = strip_tags($_POST['id_kierowca']);


					$sql = mysql_query("insert into obiekty values ('', '$id_samochod', '$id_przyczepa', '$id_kierowca')");
																	
					if($sql){
	?>
						<div class="alert alert-success" role="alert">
						  Pomyślnie dodano obiekt.
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
					
					$id_samochod = strip_tags($_POST['id_samochod']);		
					$id_przyczepa = strip_tags($_POST['id_przyczepa']);
					$id_kierowca = strip_tags($_POST['id_kierowca']);

					$sql = mysql_query("update obiekty set id_auto = '$id_samochod', id_przyczepa = '$id_przyczepa', id_kierowca = '$id_kierowca' where id = $id limit 1");

					if($sql){
	?>	
						<div class="alert alert-success" role="alert">
						  Pomyślnie zapisano obiekt logistyczny.
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
				$sql = mysql_query("select * from obiekty where id = $id limit 1");
				$data = mysql_fetch_array($sql);
			}

	?>
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Zarządzaj obiektem logistycznym
                        </div>
                        <div class="card-body">
							<form <?if(isset($_GET['edit'])){?>onsubmit="return validate(this);"<?}?> method="post" action="">  						
                                <div class="form-group">
                                    <label>Samochód</label>
                                        <select name="id_samochod" class="form-control form-control-rounded">
										<? 
											$sql1 = mysql_query("select * from pojazdy order by nazwa asc");
											while($data1 = mysql_fetch_array($sql1)){
												
												$selected = '';												
												if(isset($_GET['edit'])){													
													if($data['id_auto'] == $data1['id']) $selected = 'selected';													
												}
									
										?>
											<option value="<?echo $data1['id'];?>" <?echo $selected;?>><?echo $data1['nazwa'];?> <?echo $data1['marka'];?> <?echo $data1['model'];?></option>											
											<?}?>
										</select>
                                </div>                          
                                <div class="form-group">
                                    <label>Naczepa</label>
                                        <select name="id_przyczepa" class="form-control form-control-rounded">
										<? 
											$sql1 = mysql_query("select * from pojazdy order by nazwa asc");
											while($data1 = mysql_fetch_array($sql1)){
										?>
											<option value="<?echo $data1['id'];?>"><?echo $data1['nazwa'];?> <?echo $data1['marka'];?> <?echo $data1['model'];?></option>											
											<?}?>
										</select>
                                </div>							   							   
                                <div class="form-group">
                                    <label>Kierowca</label>
                                        <select name="id_kierowca" class="form-control form-control-rounded">
										<? 
											$sql1 = mysql_query("select * from kierowcy order by nazwa asc");
											while($data1 = mysql_fetch_array($sql1)){
										?>
											<option value="<?echo $data1['id'];?>"><?echo $data1['nazwa'];?></option>											
											<?}?>
										</select>
                                </div>							   								
								<button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
								<a href="?module=obiekty" class="btn btn-sm btn-success">Anuluj</a>
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
                          Obiekty logistyczne
                        </div>
                        <div class="card-body">

							<a onclick="copySelected()" class="dt-button buttons-copy buttons-html5" style="color:#FFF;"><span>Kopiuj zaznaczone</span></a>
						
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
													<td></td>
                                                    <th>Samochód</th>	
													<th>Naczepa</th>
													<th>Kierowca</th>
													<th>Nr dowodu</th>
													<th>Telefon</th>
													<th>Akcje</th>
                                                </tr>
                                            </thead>
                                            <tbody>											
											<?
												$sql = mysql_query("select * from obiekty order by id desc");
												while($data = mysql_fetch_assoc($sql)){
											?>
                                                <tr>
													<td><input style="width:20px;height:20px;" type="checkbox" name="dane[]" value="<? echo getCarName($data['id_auto']); ?> <? echo getCarName($data['id_przyczepa']); ?>  <?echo getDriverName($data['id_kierowca']);?> <?echo getDriverID($data['id_kierowca']);?> tel <?echo getDriverPhone($data['id_kierowca']);?>" /></td>
                                                    <td><?echo getCarName($data['id_auto']);?></td>
													<td><?echo getCarName($data['id_przyczepa']);?></td>
													<td><?echo getDriverName($data['id_kierowca']);?></td>	
													<td><?echo getDriverDocument($data['id_kierowca']);?></td>	
													<td><?echo getDriverPhone($data['id_kierowca']);?></td>	
													<td>
														<center>
															<?if(in_array("edit_obiekty", $this_user_uprawnienia)){?><a onclick="copyToClipboard('<? echo getCarName($data['id_auto']); ?> <? echo getCarName($data['id_przyczepa']); ?> <?echo getDriverName($data['id_kierowca']);?> <?echo getDriverID($data['id_kierowca']);?> <?echo getDriverPhone($data['id_kierowca']);?>')" class="btn btn-primary">Kopiuj</a><?}?>
															<?if(in_array("edit_obiekty", $this_user_uprawnienia)){?><a href="?module=obiekty&edit=<?echo $data['id'];?>" class="btn btn-warning">Edytuj</a><?}?>
															<?if(in_array("del_obiekty", $this_user_uprawnienia)){?><a onclick="return confirm('Czy na pewno usunąć?')" href="?module=obiekty&del=<?echo $data['id'];?>" class="btn btn-danger">Usuń</a><?}?>
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