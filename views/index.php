<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="./assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Ticket Ecuador - Venta de Tickets
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<!-- CSS Files -->
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="./assets/css/now-ui-kit.css?v=1.2.0" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="./assets/demo/demo.css" rel="stylesheet" />
	<link href="./assets/css/animate.css" rel="stylesheet">
</head>

<body class="index-page sidebar-collapse">

	<!-- Start Navbar -->
	<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
		<div class="container">
		<div class="navbar-translate">
			<a class="navbar-brand" href="index" rel="tooltip" title="Inicio" data-placement="bottom">
				Ticket Ecuador
			</a>
			<button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-bar top-bar"></span>
			<span class="navbar-toggler-bar middle-bar"></span>
			<span class="navbar-toggler-bar bottom-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
			<ul class="navbar-nav">
			<?php if($logged_user == null) { ?>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
					<i class="fa fa-sign-in-alt design_app"></i>
					<p>&ensp;LOGIN</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" style="width:250px;" aria-labelledby="navbarDropdownMenuLink1">
					<form action="login" method="POST" class="px-4 py-3">
						<div class="form-group">
							<label for="exampleDropdownFormEmail1">Mail</label>
							<input name="mail" type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
						</div>
						<div class="form-group">
							<label for="exampleDropdownFormPassword1">Contraseña</label>
							<input name="pass" type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">Ingresar</button>
						</div>
						<p class="text-center">¿No tenés cuenta? <a href="register" style="color:orange;">Registrate</a></p>
					</form>
					<hr>
					
					</div>
				</li>
			<?php } else { ?>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink2" data-toggle="dropdown">
					<i class="fas fa-user"></i>&ensp;<?php echo $logged_user->get_mail(); ?>
					<div class="dropdown-menu dropdown-menu-right" style="width:250px;" aria-labelledby="navbarDropdownMenuLink2">
						<?php 
							if($logged_user->get_role()->get_name() == 'Admin')
								echo '<a class="dropdown-item" href="adminPanel"><i class="fas fa-user"></i> Panel de Administración</a>';
						?>
						<a class="dropdown-item" href="tickets"><i class="fas fa-ticket-alt"></i> Mis compras</a>
						<a class="dropdown-item" href="logout"><i class="fas fa-sign-out-alt"></i> Salir</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<?php 
						if($logged_user != null)
						{
							$cant = 0;

							if($gte_cart != null)
								$cant = count($gte_cart->get_purchase_lines());

							echo '<a class="nav-link" href="cart"><span class="badge badge-secondary">'.$cant.'</span>&ensp;<i class="fas fa-shopping-cart"></i></a>';
						}
					?>
				</li>
			<?php } ?>
			</ul>
		</div>
		</div>
	</nav>
	<!-- End Navbar -->

	<!-- Start Wrapper -->
	<div class="wrapper">

		<!-- Start header -->
		<div class="page-header clear-filter" filter-color="orange">
			<div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/header1.jpg');">
			</div>
			<div class="container">
				<div class="content-center brand">
				<img class="n-logo" src="./assets/img/now-logo1.png" alt="">
				<h1 class="h1-seo">Ticket Ecuador</h1>
				<h3>Venta de Tickets para Eventos</h3>
				</div>
				
			</div>
		</div>
		<!-- End header -->

		<!-- Start Main -->
		<div class="main">
			<!-- Start first section -->
			<div class="section section-basic" id="basic-elements">
				<div class="container">

					<?php 
						// para mensajes de error, creo un input hidden
						if(isset($_GET['status']) && $_GET['status'] == 'error') { ?>
						<input type="hidden" id="login_error">
					<?php } ?>

					<br><h2>Eventos Destacados</h2>
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
							<img class="d-block w-100" src="<?php echo $destacados[0]->get_image_link(); ?>" alt="<?php echo $destacados[0]->get_name();?>">
							</div>
							<div class="carousel-item">
							<img class="d-block w-100" src="<?php echo $destacados[1]->get_image_link(); ?>" alt="<?php echo $destacados[1]->get_name();?>">
							</div>
							<div class="carousel-item">
							<img class="d-block w-100" src="<?php echo $destacados[2]->get_image_link(); ?>" alt="<?php echo $destacados[2]->get_name();?>">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<br><br>
					<div class="row">
						<div class="col-3">
							<h3>Todos los Eventos</h3>
						</div>
						<div class="col-9">
							<form action="index" method="POST">
								<div class="row">
									<div class="col-2">
										<h3>Filtrar</h3>
									</div>
									<div class="col-4">
										<select class="form-control" style="background-color:white;" name="genero">
											<option value="genero" selected>Género</option>
											<?php foreach($generosDB as $gen) { ?>
												<option value="<?php echo $gen->get_name(); ?>"><?php echo $gen->get_name(); ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-4">
										<select class="form-control" value="ASDASD" style="background-color:white;" name="categoria">
											<option value="categoria" selected>Tipo de Evento</option>
											<?php foreach($categoriasDB as $cat) { ?>
												<option value="<?php echo $cat->get_name(); ?>"><?php echo $cat->get_name(); ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="col-2">
										<button type="submit" style="margin-top:-3px;" class="btn btn-primary">Buscar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<?php foreach($eventosDB as $evento) { ?>
							<div class="col-sm-4" style="padding-top:20px;">
								<div class="hovereffect" style="width: 22rem; max-height:140px;">
									<img class="img-responsive" src="<?php echo $evento->get_image_link(); ?>" alt="<?php echo $evento->get_name(); ?>">
									<div class="overlay">
										<h2><?php echo $evento->get_name(); ?></h2>
										<a href="event/details/<?php echo $evento->getID(); ?>" class="info">Ver evento</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<!-- End first section -->
		</div>
		<!-- End Main -->

		<!-- Start footer -->
		<footer class="footer" data-background-color="black">
			<div class="container">
				<nav>
				<ul>
				<li>
					<a href="https://www.github.com/dunkansdk" target="_blank">
						<i class="fab fa-github"></i> Derechos reservados Grupo 2
					</a>
					</li>
				</ul>
				</nav>
				<div class="copyright" id="copyright">
				&copy;
				<script>
					document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
				</script>
				</div>
			</div>
		</footer>
		<!-- End footer -->
	</div>
	<!-- End Wrapper -->

	<!--   Core JS Files   -->
	<script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
	<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
	<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
	<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
	<script src="./assets/js/plugins/bootstrap-switch.js"></script>
	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
	<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
	<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="./assets/js/plugins/bootstrap-notify.min.js" type="text/javascript"></script>
	<script src="./assets/js/plugins/fblogin.js" type="text/javascript"></script>
	<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
	<script src="./assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
	
	<script>
		$(document).ready(function() {
		// the body of this function is in assets/js/now-ui-kit.js
			
			if($('#login_error').length)
			{
				$.notify ({
                message: 'Usuario o contraseña inválidos' 
                }, {
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "center"
                    }
                });
			}

		});

		function scrollToDownload() {

		if ($('.section-download').length != 0) {
			$("html, body").animate({
			scrollTop: $('.section-download').offset().top
			}, 1000);
		}
		}
	</script>

</body>

</html>