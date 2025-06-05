<?
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('db.inc.php');
include('core.inc.php');


include 'mail/Exception.php';
include 'mail/PHPMailer.php';
include 'mail/SMTP.php';
?>


					<?
						$err = false;
						if(isset($_POST['login'])){
							
							$login = ($_POST['login']);
							$haslo = ($_POST['password']);
							
							$sql = mysql_query("select * from uzytkownicy where login like '%$login%' and haslo like '%$haslo%' limit 1");
							if(mysql_num_rows($sql)>0){	
								$data = mysql_fetch_array($sql);
								
								$_SESSION['id'] = $data['id'];
								$_SESSION['login'] = $login;
							
								header("location: index.php");
							
							} else {
								$err = true;
							}

						}
					?>


					<?
						$err = false;
						$send = false;
						if(isset($_POST['email'])){
							
							$email = strip_tags($_POST['email']);
						
							$sql = mysql_query("select * from uzytkownicy where email like '%$email%' limit 1");
							if(mysql_num_rows($sql)>0){	
								$data = mysql_fetch_array($sql);



								// Instantiation and passing `true` enables exceptions
								$mail = new PHPMailer(true);

								try {
									//Server settings
									$mail->SMTPDebug = 0;                                       // Enable verbose debug output
									$mail->isSMTP();                                            // Set mailer to use SMTP
									$mail->Host       = 'poczta23190.e-kei.pl';  // Specify main and backup SMTP servers
									$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
									$mail->Username   = 'biuro@transluz.pl';                     // SMTP username
									$mail->Password   = 'Transluz!123';                               // SMTP password
									$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
									$mail->Port       = 587;                                    // TCP port to connect to

									//Recipients
									$mail->setFrom('biuro@transluz.pl', 'Biuro Transluz');
									$mail->addAddress($email, $data['nazwa']);     // Add a recipient

									$mail->CharSet = 'UTF-8';

									// Content
									$mail->isHTML(true);                                  // Set email format to HTML
									$mail->Subject = 'Twoje hasło w systemie';
									$mail->Body    = '<br/><img src="http://transluz.pl/serwis/assets/img/icon.png" alt="Logo" /><img src="http://transluz.pl/serwis/assets/img/logo-dark.png" alt="Logo" /><br/><br/>Twoje hasło: <b>'.$data['haslo'].'</b>';
									$mail->AltBody = 'Hasło: '.$data['haslo'];

									$mail->send();
									$send = true;
								} catch (Exception $e) {
									echo "Mailer Error: {$mail->ErrorInfo}";
								}

							} else {
								$err = true;
							}
							
						}
					?>						



<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Serwis - logowanie</title>

        <!-- Common Plugins -->
        <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Css-->
        <link href="assets/css/style.css" rel="stylesheet">
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            html,body{
                height: 100%;
            }
        </style>
    </head>
    <body class="bg-light">

        <div class="misc-wrapper">
            <div class="misc-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-12">
                              <div class="misc-header text-center">
								<img alt="" src="assets/img/icon.png" class="logo-icon margin-r-10">
								<img alt="" src="assets/img/logo-dark.png" class="toggle-none hidden-xs">
                            </div>
                            <div class="misc-box"> 
<?if(!isset($_GET['forget'])){?>
							
                                <form role="form" action="" method="post">
                                    <div class="form-group">                                      
                                        <label  for="exampleuser1">Login</label>
                                        <div class="group-icon">
                                        <input id="exampleuser1" name="login" type="text" placeholder="Login" class="form-control" required="">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hasło</label>
                                        <div class="group-icon">
                                        <input id="exampleInputPassword1" name="password" type="password" placeholder="Hasło" class="form-control">
                                        <span class="icon-lock text-muted icon-input"></span>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="float-left">
                                           <div class="checkbox checkbox-primary margin-r-5">
												<input id="checkbox2" type="checkbox" checked="">
												<label for="checkbox2"> Zapamiętaj mnie </label>
											</div>
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-block btn-primary btn-rounded box-shadow">Zaloguj się</button>
                                        </div>
                                    </div>
                                    <hr>
									<center><a href="?forget">Nie pamiętam hasła</a></center>
									
									<?if($err){?>
									
										<div class="alert alert-danger" role="alert">
										  Zły login lub hasło.
										</div>
									
									<?}?>
                                   
                                </form>
<?} else {?>								
								
                                <form role="form" action="" method="post">
                                    <div class="form-group">                                      
                                        <label  for="exampleuser1">Email</label>
                                        <div class="group-icon">
                                        <input id="exampleuser1" name="email" type="text" placeholder="Email" class="form-control" required="">
                                        <span class="icon-user text-muted icon-input"></span>
                                        </div>
                                    </div>

                                    <div class="clearfix">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-block btn-primary btn-rounded box-shadow">Wyślij hasło</button>
                                        </div>
                                    </div>
                                    <hr>
									<center><a href="login.php">Przejdź do logowania</a></center>
									
									<?if($err){?>								
										<div class="alert alert-danger" role="alert">
										  Błąd, brak takiego adresu w bazie.
										</div>
									<?}?>
									
									<?if($send){?>								
										<div class="alert alert-success" role="alert">
										  Hasło zostało wysłane na podany adres email.
										</div>
									<?}?>									
                                   
                                </form>	

<?}?>	
                            </div>
                            <div class="text-center misc-footer">
                               <p>Copyright &copy; 2019 Luksoft.info</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Common Plugins -->
        <script src="assets/lib/jquery/dist/jquery.min.js"></script>
        <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/lib/pace/pace.min.js"></script>
        <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="assets/lib/metisMenu/metisMenu.min.js"></script>
        <script src="assets/js/custom.js"></script>
		
    </body>
</html>