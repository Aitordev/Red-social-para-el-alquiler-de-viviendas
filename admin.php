<?php
session_start();
if (!isset($_SESSION[ 'username' ]) || $_SESSION[ 'username' ] === null  || $_SESSION[ 'username' ] === ""){
	header("Location: index.php");
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
									<a id="home" href="index.php">Red Social Viviendas</a>
							</li>
							<li>
									<a id="housesB" href="#">Mis viviendas</a>
							</li>
							<li>
									<a id="newB" href="#">Dar de Alta</a>
							</li>
							<li>
									<a id="solB" href="#">Solicitudes</a>
							</li>
							<li>
									<a id="ajustesB" href="#">Ajustes</a>
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
											<div id = "userHouses">
												<img id ="loadingHouses" src="img/load.gif" class="img-fluid nodisplay">
											</div>
									</div>
									<div id = "new" class="col-lg-12 paddingtop15 nodisplay">
											<h1 id="nuevacasa">Nueva Casa</h1>
											<form method="post" action="addHouse.php" class="admin" enctype="multipart/form-data">
												<input name="name" type="text" maxlength="25" placeholder="Nombre de la casa" required autofocus>
												<input name="rooms" type="number" maxlength="2" placeholder="Numero de habitaciones (opcional)" autofocus>
												<input name="bathrooms" type="number" maxlength="2" placeholder="Numero de baños (opcional)" autofocus>
												<input name="squaremeters" type="number" maxlength="3" placeholder="Metros cuadrados (opcional)" autofocus>
												<input name="floor" type="number" maxlength="2" placeholder="Numero de planta (opcional)" autofocus>
												<select name="orientation" autofocus>
													<option value="" selected="selected">Selecciona orientacion (opcional)</option>
											    <option value="Norte">Norte</option>
											    <option value="Sur">Sur</option>
											    <option value="Este">Este</option>
											    <option value="Oeste">Oeste</option>
											  </select>
												<select name="type" autofocus>
													<option value="" selected="selected">Selecciona tipo de vivienda (opcional)</option>
											    <option value="Piso">Piso</option>
											    <option value="Chalet">Chalet</option>
											    <option value="Duplex">Duplex</option>
													<option value="Atico">Atico</option>
													<option value="Estudio">Estudio</option>
											  </select>
												<input name="description" type="text" maxlength="100" placeholder="Descripcion (opcional)" autofocus>
												<input name="place" type="text" placeholder="Lugar" maxlength="100"required autofocus>
												<input name="street" type="text" placeholder="Calle (opcional)"  maxlength="100" autofocus>
												<input name="number" type="text" placeholder="Numero (opcional)" maxlength="100" autofocus>
												<input name="extras" type="text" placeholder="Extras, separados por ; (opcional)" maxlength="200" autofocus>
												<legend>¿Quien eres?</legend>
											  <label class="radio-inline"><input type="radio" name="user" value="0"/>Dueño</label>
											  <label class="radio-inline"><input type="radio" name="user" value="1"/>Inquilino</label>
												<label class="radio-inline"><input type="checkbox" name="rented" value="rented" />Esta alquilada?</label>
												<label id="userlist" class="radio-inline nodisplay"><input type="checkbox" name="list" value="list" />guay</label>
												<legend>Añade imagenes: (puedes seleccionar varias)</legend>
												<input type="file" name="files[]" accept="image/*" id="fileinput" multiple="multiple" required autofocus>
												<div id="gallery"></div>
												<input class='btn btn-conf btn-green pull-right' type="submit" name="submit" value="Aceptar">
											</form>
									</div>
									<div id = "sol" class="col-lg-12 paddingtop15 nodisplay">
											<h1>Solicitudes</h1>
									</div>
									<div id = "ajustes" class="col-lg-12 paddingtop15 nodisplay">
											<h1>Ajustes de Usuario</h1>
											<form method="post" action="addHouse.php" class="admin" enctype="multipart/form-data">
												<input name="name" type="text" maxlength="25" placeholder="Nombre" required autofocus>
												<input name="surname" type="text" maxlength="25" placeholder="Apellidos" required autofocus>
												<input name="provincia" type="text" maxlength="2" placeholder="Provincia" autofocus>
												<input name="old" type="number" maxlength="2" placeholder="Edad" autofocus>
												<select name="orientation" autofocus>
													<option value="" selected="selected">Selecciona sexo</option>
											    <option value="Norte">Masculino</option>
											    <option value="Sur">Femenino</option>
											    <option value="Este">Otro</option>
											  </select>

												<input class='btn btn-conf btn-green pull-right' type="submit" name="submit" value="Aceptar">
											</form>
											<h2>Eliminar Usuario</h2>
											<button id="removeUser" class='btn btn-conf btn-green'>Eliminar</button>
									</div>
							</div>
					</div>
			</div>
			<!-- /#page-content-wrapper -->
	</div>
	<!-- /#wrapper -->
	<!-- confim Modals-->
	<div id="modal-background"></div>

	<div id="confirmremove" class ="modal-content">
			<h3>Estas seguro de Eliminar?</h3>
			<button class='btn btn-conf btn-green' style="float: right;">Aceptar</button>
	</div>
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
