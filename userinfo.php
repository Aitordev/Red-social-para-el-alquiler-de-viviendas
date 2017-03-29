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
	<link href="css/cards.css" rel="stylesheet">
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
	          <div class="col-md-9 col-md-offset-1 centered">
							<div id ="headerUser" class="col-md-3">
								<img class="circle-img" src="img/placeholder.png" draggable="false"/>
								<h3 id ="nameUser"><?php echo $line->name ?></h3>
								<div class = "subtittle">
									<?php if (isset($_SESSION[ 'username' ]) && ($_SESSION["username"] != "") && ($line->rooms != "")){?>
									<i class="likes"></i><i class="likes"></i><i class="likes"></i><i class="likes"></i><i class="likes"></i>
									<?php } ?>
								</div>
							</div>
							<div class="col-md-9">
								<?php if(isset($_SESSION[ 'username' ]) && ($_SESSION["username"] != "")){?>
								<hr />
								<div id="owner"  class="row">
									<div class="col-md-3">
										<h4>Nombre</h4>
										<h4>Apellidos</h4>
										<h4>Telefono</h4>
										<h4>E-mail</h4>
										<h4>Provincia</h4>
										<h4>Edad</h4>
										<h4>Sexo</h4>
									</div>
									<div class="col-md-8 text-left">
										<h4><?php echo $line->owner ?></h4>
										<h4><?php echo $line->owner ?></h4>
										<h4><?php echo $line->owner ?></h4>
										<h4><?php echo $line->owner ?></h4>
										<h4><?php echo $line->owner ?></h4>
										<h4><?php echo $line->owner ?></h4>
										<h4><?php echo $line->owner ?></h4>
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
								<h4>Viviendas</h4>
								<div id = "userHouses">
									<img id ="loadingHouses" src="img/load.gif" class="img-fluid nodisplay">
								</div>
								<?php } else{?>
								<div class="alert alert-warning margin-top-left" role="alert">
									<h4>Inicia sesion para ver la información de este usuario</h4>
								</div>
								<?php } ?>
							</div><!--/col-md-9-->
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
			<?php if(isset($_SESSION[ 'username' ]) && ($_SESSION["username"] !== "")){?>
			<script type="text/javascript">
		    $(function() {
			    var parametros = {
			      "username" : "<?php echo $_SESSION["username"] ?>"
			    };
			    $.ajax({
			      data:  parametros,
			      url:   'userHouses.php',
			      type:  'post',
			      beforeSend: function () {
			        $("#loadingHouses").removeClass("nodisplay");
			      },
			      success:  function (response) {
			        $("#loadingHouses").addClass("nodisplay");
			        $("#userHouses").html(paintCardHouses(response));
			      },
			      error: function (jqXHR, exception) {
			        $("#loadingHouses").addClass("nodisplay");
			        alert('Error.\n' + jqXHR.responseText);
			      },
			    });
				});
		</script>
		<?php } ?>
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
