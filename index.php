<?php
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Red social Viviendas</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<div id="h">
	      <div class="logo">Red social Viviendas</div>
	      <div class="container-fluid">
	        <div class="row">
						<?php if(!isset($_SESSION[ 'username' ]) || ($_SESSION["username"] == "")){?>
							<button id="loginB" class="btn btn-conf-2 btn-green">Login</button>
							<button id="registerB" class="btn btn-conf-2 btn-green">Registro</button>
							<div id ="menu" class="menu dropdown nodisplay">
								<a id="tittle" href="index.php"><h1>Red Social Viviendas</h1></a>
								<a id="userB" class="dropdown-toggle" data-toggle="dropdown">
									<div class="userItem">
										<img class="circle-button" src="img/placeholder.png" draggable="false"/>
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a id="loginL" href="#"><i class="glyphicon glyphicon-log-in"></i>Login</a></li>
									<li><a id="registerL" href="#"><i class="glyphicon glyphicon-piggy-bank"></i>Registro</a></li>
								</ul>
							</div>
						<?php } else {?>
							<div id = "menu" class="menu dropdown">
								<a id="tittle" href="index.php"><h1>Red Social Viviendas</h1></a>
								<a id="userB" class="dropdown-toggle" data-toggle="dropdown">
									<div class="userItem">
										<img class="circle-button" src="img/placeholder.png" draggable="false"/>
										<div class = "username"><?php echo $_SESSION[ 'username' ]; ?></div>
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a id="admin" href="#"><i class="glyphicon glyphicon-map-marker"></i>Administrar Viviendas</a></li>
									<li><a id="settings" href="#"><i class="glyphicon glyphicon-cog"></i>Configuracion</a></li>
									<li class="divider"></li>
									<li><a id="logout" href="#"><i class="glyphicon glyphicon-log-out"></i>Cerrar Sesion</a></li>
								</ul>
							</div>
						<?php } ?>
	          <div class="col-md-8 col-md-offset-2 centered">
	            <h1 id="welcome">Bienvenido a Red social Viviendas.</h1>
	            <div class="mtb">
	              <form role="form" id="search">
									<input type="text" name="place" class="subscribe-input" placeholder="Poblacion" required>
									<input type="text" name="street" class="subscribe-input" placeholder="Calle (opcional)" >
									<input type="text" name="number" class="subscribe-input" placeholder="Numero (opcional)" >
	                <button class='btn btn-conf btn-green' type="submit">Buscar</button>
	              </form>
	            </div><!--/mt-->
	            <h6 id ="free">TOTALMENTE GRATIS.</h6>
	          </div>
	        </div><!--/row-->
					<div id="mainHouses"></div> <!-- Cards houses div-->
	      </div><!--/container-->
	    </div><!-- /H -->

	    <div id="sep">
	      <div class="container">
	        <div class="row centered">
	          <div class="col-md-8 col-md-offset-2">
	            <h1>Unete a la nueva experiencia de socializar la vivienda.</h1>
	            <h4>Gracias a tus votaciones otros usuarios seran capaces de hacer mejor elecciones a la hora de elegir un lugar donde vivir, simplemente sorprendente.</h4>
	            <p><button class="btn btn-conf-2 btn-green">Aprende Mas</button></p>
	          </div><!--/col-md-8-->
	        </div>
	      </div>
	    </div><!--/sep-->

	    <div id="green">
	      <div class="container">
	        <div class="row">
	          <div class="col-md-6 col-md-offset-3 centered">
	            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	              <!-- Wrapper for slides -->
	              <div class="carousel-inner">
	                <div class="item active">
	                  <h3>Me gusta, me gusta es lo mejor, si lo recomiendo, mis dieses para la red sosial.</h3>
	                  <h5><tgr>ALBERTO ANGEL DE LAS TORRES</tgr></h5>
	                </div>
	                <div class="item">
	                  <h3>Mi vida era mustia y descolorida. Pero gracias a esta web mi vida a cambiado, ahora puedo criticar casas, vuelvo a tener la misma ilusion que cuando era pequeño </h3>
	                  <h5><tgr>RAFAEL ARTIÑANO</tgr></h5>
	                </div>
									<div class="item">
	                  <h3>Ayer en un descansito de mi trabajo de física nucelar me puse a ver que había por la web y lo encontré. A pesar de que no me hace mucha falta, y pensé, jajajaj que divertido sería pillar ruka. Que la fisica es muy dura.</h3>
	                  <h5><tgr>SHUR HAND SMITH</tgr></h5>
	                </div>
									<div class="item">
	                  <h3>Llevo viviendo 20 años debajo de un puente, pero gracias al wifi del McDonald's y esta red social puedo imaginarme que vivo en una casa de verdad.</h3>
	                 	<h5><tgr>USNAVY RODRIGUES</tgr></h5>
	                </div>
									<div class="item">
	                  <h3>Llevo viviendo 20 años debajo de un puente, pero gracias al wifi del McDonald's y esta red social puedo imaginarme que vivo en una casa de verdad.</h3>
	                 	<h5><tgr>USNAVY RODRIGUES</tgr></h5>
	                </div>
									<div class="item">
	                  <h3>me ha salvado la vida esa pagina web, estaria en la calle desde que mi madre se fue con su novio por ahi y me dijo que me fuera al hostal de mi abuela, pero es una bruja y no soporto la vida ahi.</h3>
	                 	<h5><tgr>MENDIOLO </tgr></h5>
	                </div>
	              </div>
	            </div><!--/Carousel-->

	          </div>
	        </div><!--/row-->
	      </div><!--/container-->
	    </div><!--/green-->

	    <div id="f">
	      <div class="container">
	        <div class="row centered">
	          <h2>Contactanos</h2>
	          <h5>sosial@redsosial.COM</h5>
	          <h6 class="mt">COPYRIGHT 2017 - Red Sosial Viviendas</h6>
	        </div><!--/row-->
	      </div><!--/container-->
	    </div><!--/F-->

			<!-- Login and Register Modals-->
			<div id="modal-background"></div>

			<div id="login" class ="modal-content">
					<h3>Login</h3>
					<form method="post" action="login.php">
						<input name="email" type="email" placeholder="example1@mail.com" required autofocus>
						<input name="pass" type="password" placeholder="Contraseña" required autofocus>
						<input class='btn btn-conf btn-green' type="submit" value="Aceptar">
					</form>
			</div>

			<div id="register" class ="modal-content">
					<h3>Registro</h3>
					<form method="post" action="register.php">
						<input name="email" type="email" placeholder="example1@mail.com" required autofocus>
						<input name="nick" type="text" placeholder="Nick" required autofocus>
						<input name="name" type="text" placeholder="Nombre y apellidos" required autofocus>
						<input name="pass" type="password" placeholder="Contraseña" id="password" required autofocus>
						<input name="pass2" type="password" placeholder="Repite Contraseña" id="confirm_password" required autofocus>
						<input class='btn btn-conf btn-green' type="submit" value="Aceptar">
					</form>
			</div>
</body>
</html>
<!--
REQUISITOS

1. Alta  y  baja  de usuarios,  en  los  que  se  pidan los  datos  necesarios  con  el  fin
de identificarlos de manera inequívoca, además de una breve descripción sobre ellos.
Con el alta se creará un nuevo usuario con su correspondiente usuario y contraseña.

Los usuarios serán inquilinos o arrendatarios en función de la transacción, por lo que podrán
tanto alquilar a otros usuarios como que otros les alquilen sus viviendas.
La baja del usuario implica ser eliminado de la lista de usuarios disponibles en la red social.
En todo momento los usuarios podrán cambiar los datos de su perfil.

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

3. Búsqueda  de  viviendas,  se  podrán  realizar  búsquedas  de  viviendas  en  el  sistema
seleccionando, en  un  apartado  de búsqueda de viviendas, la  población  en  la  que  se
encuentran las viviendas y, de manera opcional, indicando también la calle y el número.
Existirá un perfil básico de la vivienda que se mostrará a todo el mundo en el que se
incluye  su  imagen  de  perfil  y  la  ubicación.  Para  acceder  a  más  datos,
tales  como  su dueño,  el  historial  de  inquilinos,  su  estado  (alquiladao  libre)
y  su  valoración  será necesario estar registrado y autenticado en el sistema de usuarios.

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
