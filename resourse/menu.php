<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<!--[if lt IE 7]>
            <p class="chromefjgcmghrame">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="../../css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="../../css/main.css">



        <?php   require("../../controlador/session/sesion.php");?>
<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../../vista/sistema/inicio.php"><i>SICRE</i></a>
  </div>

  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">

      <!-- ////////////Usuario///////////// -->

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Usuario <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
      <?php if ($_SESSION['per_cod']==1): ?>
          <li><a href="../usuario/registrar_usuario.php">Registrar Usuario</a></li>
          <?php endif ?>
          <li><a href="../usuario/consultar_usuario.php">Consultar Usuarios</a></li>
          <?php if ($_SESSION['per_cod']==1): ?>
          <li><a href="../usuario/buscar_usuario.php">Buscar Usuario</a></li>
      <?php endif ?>
        </ul>

        <!-- ////////////Inventario///////////// -->

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Inventario <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">

          <li><a href="../inventario/registrar_equipo.php">Registrar Equipos</a></li>
          <li><a href="../inventario/consultar_equipo.php">Consultar Inventario</a></li>
          <?php if ($_SESSION['per_cod']==1): ?>
          <li class="divider"></li>
          <li><a href="../inventario/asignar_equipo.php">Asignar Equipos</a></li>
          <li><a href="../inventario/retorno_equipo.php">Retorno de Equipos</a></li>
          <li class="divider"></li>
          <li><a href="../inventario/graficos_estatus.php">Graficos de Estatus</a></li>
          <li class="divider"></li>
          <ul>Agregar</ul>
          <li><a href="../inventario/nuevo_equipo.php">Equipos</a></li>
          <li><a href="../inventario/nuevo_tipo_equipo.php">Tipo de Equipos</a></li>
          <li><a href="../inventario/nueva_marca.php">Marca</a></li>
          <li><a href="../inventario/nuevo_modelo.php">Modelo</a></li>
          <?php endif ?>
        </ul>
      </li>

      <!-- ////////////Inventario Telefónico///////////// -->

      <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Inventario Telefónico <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="../inventario_telefonico/registrar_numero_celular.php">Registrar Número Celular </a></li>
          <li><a href="../inventario_telefonico/registrar_numero_cantv.php">Registrar Número Cantv</a></li>
          <li class="divider"></li>
          <li><a href="../inventario_telefonico/consultar_inv_celular.php">Listado de Celulares</a></li>
          <li><a href="../inventario_telefonico/consultar_inv_cantv.php">Listado Cantv</a></li>
        </ul>
      </li>

      <!-- //////////// Solicitud de Equipos ///////////// -->

      <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Solicitud de Equipos<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="../solicitud_equipo/solicitar_equipo.php">Solicitar Equipos</a></li>
          <li><a href="../solicitud_equipo/consultar_solicitud.php">Consultar Solicitud</a></li>
          <li class="divider"></li>
          <li><a href="../solicitud_equipo/lista_solicitud.php">Listado de Solicitudes</a></li>

        </ul>
      </li>

     <!-- //////////// Fallas ///////////// -->

    <!-- <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Fallas <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Reportar Falla</a></li>
          <li><a href="#">Consultar Caso</a></li>

        </ul>
      </li>-->

       <!-- //////////// Asignación de Tareas ///////////// -->

       <!--<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Asignacion de Tareas <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Nueva Tarea</a></li>
          <li><a href="#">Consultar Tarea</a></li>
          <li><a href="#">Eliminar Tarea</a></li>
        </ul>
      </li>-->

     <!-- <li class="dropdown">
        <?php if ($_SESSION['per_cod']==1): ?>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Añadir al Inventario<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="../inventario/nuevo_equipo.php">Nuevo equipo</a></li>
          <li><a href="../inventario/nuevo_tipo_equipo.php">Nuevo tipo de equipo</a></li>
          <li><a href="../inventario/nueva_marca.php">Nueva marca</a></li>
          <li><a href="../inventario/nuevo_modelo.php">Nuevo modelo</a></li>

        </ul>
      </li>
        <?php endif ?>-->

        <!-- //////////// Farmacias ///////////// -->

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Farmacia <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
      <?php if ($_SESSION['per_cod']==1): ?>
          <li><a href="../farmacia/agregar_farmacia.php">Registrar Farmacia</a></li>
          <?php endif ?>
          <li><a href="#">Consultar Farmacia</a></li>
          <?php if ($_SESSION['per_cod']==1): ?>
          <li><a href="#">Buscar Farmacia</a></li>
      <?php endif ?>
        </ul>
              </li>
    </ul>

    <!--<form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">Enviar</button>
    </form>-->

    <ul class="nav navbar-nav navbar-right">
    <li><a href="../sistema/contacto.php">Contacto</a></li>
 <li class="dropdown">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Login<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
               <li><a href="../contrasenas/restablecer.php">Cambiar Contraseña</a></li>
               <li><a href="../sistema/salir.php">Salir</a></li>

        </ul>
      </li>


    </ul>
  </div>
</nav>





