<?php
session_start();
if (!isset($_SESSION[ 'username' ]) || $_SESSION[ 'username' ] === null  || $_SESSION[ 'username' ] === ""){
	header("Location: index.php");
}
else{
	require_once("config.php");
  require_once("sosialClass.php");
  $user = $_SESSION[ 'username' ];
	$data = sosialClass::getUserSearch($user);
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Red social Viviendas</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<div id="wrapper">
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
					<ul class="sidebar-nav">
							<li class="sidebar-brand">
									<a href="index.php">Red Social Viviendas</a>
							</li>
							<li>
									<a href="#">Mis viviendas</a>
							</li>
							<li>
									<a href="#">Dar de Alta</a>
							</li>
							<li>
									<a href="#">Solicitudes</a>
							</li>
					</ul>
			</div>
			<!-- /#sidebar-wrapper -->
			<!-- Page Content -->
			<div id="page-content-wrapper">
					<div class="container-fluid">
							<div class="row">
								<div id = "menu" class="menu adminmenu dropdown">
									<a id="userB" class="dropdown-toggle" data-toggle="dropdown">
										<div class="userItem">
											<img class="circle-button" src="img/placeholder.png" draggable="false"/>
											<div class = "username"><?php echo $_SESSION[ 'username' ]; ?></div>
										</div>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a id="search" href="#"><i class="glyphicon glyphicon-search"></i>Buscar</a></li>
										<li><a id="settings" href="#"><i class="glyphicon glyphicon-cog"></i>Configuracion</a></li>
										<li class="divider"></li>
										<li><a id="logout" href="#"><i class="glyphicon glyphicon-log-out"></i>Cerrar Sesion</a></li>
									</ul>
								</div>
									<div id = "houses" class="col-lg-12 paddingtop15">
											<h1>Mis Viviendas</h1>

									</div>
							</div>
					</div>
			</div>
			<!-- /#page-content-wrapper -->
	</div>
	<!-- /#wrapper -->
</body>
</html>
<!--
REQUISITOS
2. Alta y baja de viviendas, los usuarios podrán dar de alta viviendas y asociarse a ellas o
bien como dueños o bien como inquilinos.
A estas viviendas se les asignará datos que las definan y se incluirá al menos una imagen,
la de perfil, pudiéndose añadir más si se desea.

La baja de la vivienda implica eliminarla de la lista de viviendas disponibles en la
red social. En caso de que la vivienda ya estuviese dada de alta en el sistema,
si el usuario está actuando a modo de inquilino podrá añadirla como tal a su perfil.
Además, solo el inquilino podrá hacer una solicitud de cambios en la descripción al dueño.

En el caso de que sea el inquilino quien haya dado de alta la vivienda y no haya asignado
dueño a la misma, cuando se dé de alta el dueño de la vivienda, éste podrá añadirla
a su perfil como de su propiedad. Además, este último, el dueño, es el único
autorizado para realizar o aceptar, mediante solicitudes de inquilinos, cambios en el perfil
de la vivienda.

4. Actualización de las condiciones de las viviendas, los usuarios que tengan el papel de
dueño de la vivienda en ese momento podrán modificar las condiciones a las viviendas,
tales como estado de la misma, los electrodomésticos y mobiliario disponible, etc.

5. Solicitudes  de  cambios  en  las  viviendas, los  dueños  pueden  recibir  solicitudes  de
cambios en sus viviendas por parte de los inquilinos, que deberán rechazar o aceptar,
en cuyo caso se actualizarán los campos modificados en la solicitud.

6. Puntuación de viviendas, de inquilinos y de arrendatarios, tras finalizar un periodo de
alquiler los involucrados tendrán que evaluar la transacción. Por el lado del inquilino,
éste votará al arrendatario y a la vivienda; por el lado del arrendatario, se votará
al inquilino.  Estas  votaciones  deben  quedar  reflejadas  en  cada  uno  de  los  perfiles,
haciendo media con las puntuaciones anteriores, si es que las hubiese.

7. Comenzar transacción, cuando comience un periodo de alquiler en la realidad tanto el
usuario que actúa como arrendatario como el que lo hace como inquilino pueden dar
de alta esta nueva transacción, lo que consistirá en la vinculación de los roles
de cada uno de los usuarios a la vivienda.
-->
