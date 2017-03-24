<?php
session_start();
require_once("config.php");
require_once("sosialClass.php");
if (!isset($_GET["id"]) ||$_GET["id"] === null  || $_GET["id"] === ""){
	header("Location: index.php");
}
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$line = sosialClass::getSearchId($id);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Red social Viviendas</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/jquery.slides.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<div id="houseDiv">
	      <div class="container-fluid">
	        <div class="row">
						<?php if(!isset($_SESSION[ 'username' ]) || ($_SESSION["username"] == "")){?>
							<div id ="menu" class="menu dropdown">
								<a id="tittle" href="index.php"><h1>Red Social Viviendas</h1></a>
								<a id="userB" class="dropdown-toggle" data-toggle="dropdown">
									<div class="userItem">
										<img class="circle-button" src="img/placeholder.png" draggable="false"/>
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a id="loginL" href="#"><i class="glyphicon glyphicon-log-in"></i>Login</a></li>
									<li><a id="registerL" href="#"><i class="glyphicon glyphicon-piggy-bank"></i>Registra</a></li>
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
							<div id ="headerHouse">
								<h1>Casa bonita</h1>
								<div class = "subtittle">
									<h4><i class="fa fa-bed" aria-hidden="true"></i> 2 habitaciones</h4>
									<h4><i class="fa fa-bath" aria-hidden="true"></i> 2 baños</h4>
									<h4><i class="fa fa-map-o" aria-hidden="true"></i> 60 m²</h4>
									<h4><i class="fa fa-building" aria-hidden="true"></i> 1ª planta</h4>
								</div>
							</div>
							<div id="slides">
								<img class="wide" src="img1.jpg">
								<img class="wide" src="img2.jpg">
								<img class="wide" src="img3.jpg">
							</div>
							<?php if(isset($_SESSION[ 'username' ]) && ($_SESSION["username"] != "")){?>
							<hr />
							<div id="owner"  class="row">
								<div class="col-md-3">
									<h4>Dueño</h4>
								</div>
								<div class="col-md-8 text-left">
									<p>Rafa Supremoel</p>
								</div>
							</div>
							<hr />
							<div id="valoracion"  class="row">
								<div class="col-md-3">
									<h4>Valoración</h4>
								</div>
								<div class="col-md-8 text-left">
									<i class="likes"></i><i class="likes"></i><i class="likes"></i><i class="likes"></i><i class="likes"></i>
								</div>
							</div>
							<hr />
							<div id="estado"  class="row">
								<div class="col-md-3">
									<h4>Estado</h4>
								</div>
								<div class="col-md-8 text-left">
									<p>Alquilado</p>
								</div>
							</div>
							<?php } ?>
							<hr />
							<div id="caracteristicas"  class="row">
								<div class="col-md-3">
									<h4>Características</h4>
								</div>
								<div class="col-md-8 text-left">
									<p>Tipo de inmueble : Piso</p>
									<p>Planta : 1ª planta</p>
									<p>Orientación : Orientación Sur</p>
								</div>
							</div>
							<hr />
							<div id="extras"  class="row">
								<div class="col-md-3">
									<h4>Extras</h4>
								</div>
								<div class="col-md-8 text-left">
									<ul class="detail-extras">
										<li>Armarios</li>
										<li>Ascensor</li>
										<li>Calefacción</li>
										<li>Cocina Equipada</li>
										<li>Electrodomésticos</li>
										<li>Gres Cerámica</li>
										<li>Horno</li>
										<li>Lavadora</li>
										<li>Microondas</li>
										<li>Nevera</li>
										<li>Parquet</li>
										<li>Puerta Blindada</li>
										<li>Terraza</li>
										<li>Trastero</li>
										<li>Videoportero</li>
									</ul>
								</div>
							</div>
							<hr />
							<div id="descripcion"  class="row">
								<div class="col-md-3">
									<h4>Descripción</h4>
								</div>
								<div class="col-md-8 text-left">
									<p>La promoción cuenta con fantásticas vistas a Jaizkibel, Irún y la bahía de Txingudi. Es una zona estratégica con rápida conexión con la AP-8 y muy próximo al centro del municipio. Oinaurre cuenta con todos los servicios a un paso: Los edificios se caracterizan por un diseño actual donde se combina la cerámica en tono blanco y gris con el efecto cálido de la madera. Damos prioridad a la Orientación, Todas las viviendas cuentan con terrazas al Sur de diferentes superficies. Viviendas totalmente equipadas con cocina y armarios a medida. TODO INCLUIDO (vivienda, trastero, cocina, armarios y personalización)</p>
								</div>
							</div>
							<hr />
							<div id="adic"  class="row">
								<div class="col-md-3">
									<h4>Servicios Adicionales</h4>
								</div>
								<div class="col-md-8 text-left">
									<p></p>
								</div>
							</div>
							<hr />
							<div id="ubicacion"  class="row">
								<div class="col-md-3">
									<h4>Ubicación del Inmueble</h4>
								</div>
								<div class="col-md-8 text-left">
									<p id="address">Olaberria, Irun</p>
								</div>
								<div id="map"></div>
							</div>
							<?php if(isset($_SESSION[ 'username' ]) && ($_SESSION["username"] != "")){?>
							<hr />
							<div id="history"  class="row">
								<div class="col-md-3">
									<h4>Historial de inquilinos</h4>
								</div>
								<div class="col-md-8 text-left">
									<div class="table-responsive">
										<table class="table table-hover">
										  <thead>
										    <tr>
										     	<th>Usuario</th>
							            <th>Fecha de entrada</th>
							            <th>Fecha de salida</th>
							            <th>Valoración</th>
							        	</tr>
										  </thead>
								    	<tbody>
												<tr>
							            <td>Rocky</td>
							            <td>15-07-2015</td>
							            <td>05-02-2017</td>
							            <td><i class="likes"></i><i class="likes"></i><i class="likes"></i><i class="likes"></i></td>
							        	</tr>
								        <tr>
							            <td>Rocky Jr</td>
							            <td>11-02-2017</td>
							            <td>29-05-2019</td>
							            <td><i class="likes"></i><i class="likes"></i><i class="likes"></i><i class="likes"></i><i class="likes"></i></td>
							        	</tr>
									    </tbody>
										</table>
									</div>
								</div>
							</div>
							<?php } ?>
	          </div><!--/col-md-8 col-md-offset-2 centered-->
	        </div><!--/row-->
					<div id="mainHouses"></div> <!-- Cards houses div-->
	      </div><!--/container-->
	    </div><!-- /houseDiv -->

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
			<script type="text/javascript">
		    $(function() {
					<?php if(null != $line){?>
						fillInfo(<?php echo "'".$line->id."','".$line->name."'" ?>);
					<?php } ?>
					//casainfo
				  function fillInfo(a,b){
						console.log(a);
						console.log(b);
				  }
		      $('#slides').slidesjs({
		        width: 940,
		        height: 328,
		        play: {
		          active: true,
		          auto: true,
		          interval: 4000,
		          swap: true
		        }
		      });
		    });
				function initMap() {
				var geocoder = new google.maps.Geocoder();
				var address = document.getElementById("address").innerHTML;
				geocoder.geocode( { 'address': address}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						init(results[0].geometry.location.lat(),results[0].geometry.location.lng());
					} else {
						console.log('Geocode was not successful for the following reason: ' + status);
						init(40.416775,-3.703790);
 					}
				});
      	}
				function init(latitude,longitude) {
					var loc = new google.maps.LatLng(latitude,longitude);
					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 14,
						center: loc
					});
					var marker = new google.maps.Marker({
						position: loc,
						map: map
					});
				}
		  </script>
			<script async defer
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkEKsDbQ8Myw56o1Pt-UuuhgIew7O2654&callback=initMap">
    </script>
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
