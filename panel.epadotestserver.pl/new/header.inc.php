wertyu
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>System Serwisowy dla Transportu</title>
		<link rel="icon" type="image/png" sizes="16x16" href="assets/img/icon.png">
		
        <!-- Common Plugins -->
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Vector Map Css-->
        <link href="assets/lib/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
		
		<!-- Chart C3 -->
		<link href="assets/lib/chart-c3/c3.min.css" rel="stylesheet">
		<link href="assets/lib/chartjs/chartjs-sass-default.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/lib/toast/jquery.toast.min.css" rel="stylesheet">
		<link href="assets/lib/datatables/buttons.dataTables.css" rel="stylesheet" type="text/css">
		<link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet" type="text/css">
		

		<!-- DataTimePicker -->
        <link href="assets/lib/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		
		<link href="assets/css/jquery-editable-select.css" rel="stylesheet">
		
        <!-- Custom Css-->
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
			<!-- ============================================================== -->
			<!-- 						Topbar Start 							-->
			<!-- ============================================================== -->
			<div class="top-bar light-top-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<a class="admin-logo dark-logo" href="index.php">
							<h1>
								<img alt="" src="assets/img/icon.png" class="logo-icon margin-r-10">
								<img alt="" src="assets/img/logo-default.png" class="toggle-none hidden-xs">
							</h1>
						</a>				
						<div class="left-nav-toggle" >
							<a  href="#" class="nav-collapse"><i class="fa fa-bars"></i></a>
						</div>
						<div class="left-nav-collapsed" >
							<a  href="#" class="nav-collapsed"><i class="fa fa-bars"></i></a>
						</div>
						<ul class="list-inline top-right-nav">
							<li class="dropdown">
								<a class="right-sidebar-toggle d-none-m" href="javascript:%20void(0);"><i class="fa fa-align-right"></i></a>
							</li>
							<li class="dropdown avtar-dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<img alt="" class="rounded-circle" src="assets/img/avtar-2.png" width="30">
									<? echo getUserName($_SESSION['id']); ?>
								</a>
								<ul class="dropdown-menu top-dropdown">
									<li class="dropdown-divider"></li>
									<li>
										<a class="dropdown-item" href="?logout"><i class="icon-logout"></i> Wyloguj</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!--                        Topbar End                              -->
		<!-- ============================================================== -->
		
		
		<!-- ============================================================== -->
		<!--                        Right Side Start                        -->
		<!-- ============================================================== -->
		<nav class="toggle-sidebar" id="right-sidebar-toggle">
			<div class="nano">
				<div class="nano-content">
					<div>
						<ul class="list-inline nav-tab-card clearfix" role="tablist">
							
							<li class="active" role="presentation">
								<a aria-controls="friends" data-toggle="tab" href="#friends" role="tab">Użytkownicy</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="friends" role="tabcard">
								<ul class="list-unstyled sidebar-contact-list">
								<!--
									<li class="clearfix">
										<a class="media-box" href="#"><span class="float-right"><span class="circle circle-success circle-lg"></span></span> <span class="float-left">
										 <img alt="user" class="media-box-object rounded-circle" src="assets/img/avtar-2.png" width="50"></span>
										 <span class="media-box-body"><span class="media-box-heading"><strong>John Doe</strong><br>
										<small class="text-muted">Designer</small></span></span></a>
									</li>
								-->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<!-- ============================================================== -->
		<!--                        Right Side End                          -->
		<!-- ============================================================== -->
		

        <!-- ============================================================== -->
		<!-- 						Navigation Start 						-->
		<!-- ============================================================== -->
        <div class="main-sidebar-nav dark-navigation">
            <div class="nano">
                <div class="nano-content sidebar-nav">
				
					<div class="card-body border-bottom text-center nav-profile">
						<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                        <img alt="profile" class="margin-b-10  " src="assets/img/avtar-2.png" width="80">
                        <p class="lead margin-b-0 toggle-none"><? echo getUserName($_SESSION['id']); ?></p>
                        <p class="text-muted mv-0 toggle-none">Witaj</p>						
                    </div>				
					<?					
						$sql = mysql_query("select grupa from uzytkownicy where id = ".$_SESSION['id']." limit 1");
						$data = mysql_fetch_array($sql);
						
						$sql = mysql_query("select uprawnienia from grupy where id = ".$data['grupa']." limit 1");
						$data = mysql_fetch_array($sql);				

						$this_user_uprawnienia = explode(",",$data['uprawnienia']);					
					
						$nowe_txt = '';
						$nowe = mysql_num_rows(mysql_query("select * from usterki where status like 'Nowe'"));				
						if($nowe > 0) $nowe_txt = '('.$nowe.')';				
					?>					
                    <ul class="metisMenu nav flex-column" id="menu">
                        <li class="nav-heading"><span>MENU GŁÓWNE</span></li>
						<li class="nav-item <?if($_GET['module']=='start' || !isset($_GET['module'])){?>active<?}?>"><a class="nav-link" href="?module=start"><i class="fa fa-home"></i> <span class="toggle-none">Panel startowy</span></a></li>						
                        <?if(in_array("show_pojazdy", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='pojazdy'){?>active<?}?>"><a class="nav-link" href="?module=pojazdy"><i class="fa fa-folder-open"></i> <span class="toggle-none">Pojazdy wewnętrzne</span></a></li><?}?>
                        <?if(in_array("show_pojazdy", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='pojazdyzew'){?>active<?}?>"><a class="nav-link" href="?module=pojazdyzew"><i class="fa fa-folder-open"></i> <span class="toggle-none">Pojazdy zewnętrzne</span></a></li><?}?>						
						<?if(in_array("show_rejestr", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='naprawy'){?>active<?}?>"><a class="nav-link" href="?module=naprawy"><i class="fa fa-cogs"></i> <span class="toggle-none">Rejestr napraw</span></a></li><?}?>
						<?if(in_array("show_usterki", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='usterki'){?>active<?}?>"><a class="nav-link" href="?module=usterki"><i class="fa fa-warning"></i> <span class="toggle-none">Usterki <?echo $nowe_txt;?></span></a></li><?}?>
						<?if(in_array("show_kierowcy", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='kierowcy'){?>active<?}?>"><a class="nav-link" href="?module=kierowcy"><i class="fa fa-user"></i> <span class="toggle-none">Kierowcy wewnętrzni</span></a></li><?}?>
						<?if(in_array("show_kierowcy", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='kierowcyzew'){?>active<?}?>"><a class="nav-link" href="?module=kierowcyzew"><i class="fa fa-user"></i> <span class="toggle-none">Kierowcy zewnętrzni</span></a></li><?}?>
						<?if(in_array("show_obiekty", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='obiekty'){?>active<?}?>"><a class="nav-link" href="?module=obiekty"><i class="fa fa-database"></i> <span class="toggle-none">Obiekty logistyczne</span></a></li><?}?>

						<?if(in_array("show_pojazdy_koszty", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='koszty'){?>active<?}?>"><a class="nav-link" href="?module=koszty"><i class="fa fa-money"></i> <span class="toggle-none">Koszty</span></a></li><?}?>
					
						<?if(in_array("show_zlecenia", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='zlecenia'){?>active<?}?>"><a class="nav-link" href="?module=zlecenia"><i class="fa fa-car"></i> <span class="toggle-none">Zlecenia transportowe</span></a></li><?}?>

						<?if(in_array("show_zadania", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='zadania'){?>active<?}?>"><a class="nav-link" href="?module=zadania"><i class="fa fa-list"></i> <span class="toggle-none">Zadania</span></a></li><?}?>

						<?if(in_array("show_notatki", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='notatki'){?>active<?}?>"><a class="nav-link" href="?module=notatki"><i class="fa fa-edit"></i> <span class="toggle-none">Notatki</span></a></li><?}?>


						<?if(in_array("show_uzytkownicy", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='ustawienia'){?>active<?}?>"><a class="nav-link" href="?module=ustawienia"><i class="fa fa-codepen"></i> <span class="toggle-none">Ustawienia systemu</span></a></li><?}?>						
						<?if(in_array("show_magazyn", $this_user_uprawnienia)){?><li class="nav-item <?if($_GET['module']=='magazyn'){?>active<?}?>"><a class="nav-link" href="?module=magazyn"><i class="fa fa-database"></i> <span class="toggle-none">Magazyn</span></a></li><?}?>
						
					</ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
		<!-- 						Navigation End	 						-->
		<!-- ============================================================== -->