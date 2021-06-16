<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--referencias para los estilos de bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--REFERENCIA A ARCHIVO PROPIO PARA MODIFICAR ESTILOS-->
   
    
    <title>LOGEADO</title>
</head>
<body>
    <div class="container">
        <!--PARA EL TITULO DEL RECUADRO DEL LOGIN -->
        <div class="row text-center login-page">
	   <div class="col-md-12 login-form">
	      <form action="LOGIN.HTML" method="post"> 			
	         <div class="row">
		    <div class="col-md-12 login-form-header">
		       <p class="login-form-font-header"><span></span><p>
             <?php
          // $vLogin   = $_POST['Usuario'];
           //$vPassword= $_POST['Contraseña'];

           session_start();

if(isset($_POST['Usuario']))
{
  $user = $_POST['Usuario'];
}else
{
  $user = $_SESSION['usuario'];
}

if(isset($_SESSION['usuario'])){
		 printf("REANUDANDO SESION <br>");
         //printf("BIENVENIDO DE NUEVO".$_SESSION['usuario']);
         
         
         $hostname = 'localhost';
         $database = 'gonzalezma';
         $username = 'root';
         $password = '';



$link = new mysqli($hostname, $username, $password, $database);

if ($link->connect_error) {
        $row['resultado']  = '1';
        $row['informacion']= 'Error DB';
		$row['mensaje']    = 'Error conexion';
		$row['detalle']    = 'No hay conexion a la base de datos';
    } else {

   // $vPasswordMd5=md5($vPassword);
    $consulta="select NOMBRE,NCONTROL,CARRERA from USUARIO
    	       where  USUARIO = '".$_SESSION['usuario']."'";

    $result = $link->query($consulta);

    if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();
            $NOMBRE = $registro['NOMBRE'];
            //$_SESSION['nombre']=$NOMBRE;
            ECHO"BIENVENIDO DE NUEVO <BR>$NOMBRE";
            ECHO"<BR>QUE DESEA REALIZAR? <BR>";
            ECHO"<a href='ALTA.HTML'>ALTA</a> <BR><a href='CONSULTA.HTML'>CONSULTA</a><BR><a href='BAJA.HTML'>BAJA</a>";
    } else  {
      ECHO"ERROR EN EL USUARIO Y/O CONTRASEÑA";
    }

    $link->close();
}
} else {
         $_SESSION['usuario'] = $user;
       	 printf("NUEVA SESION <br>");
       	 //printf("Bienvenido %s",$user);
          $hostname = 'localhost';
$database = 'gonzalezma';
$username = 'root';
$password = '';



$link = new mysqli($hostname, $username, $password, $database);

if ($link->connect_error) {
        $row['resultado']  = '1';
        $row['informacion']= 'Error DB';
		$row['mensaje']    = 'Error conexion';
		$row['detalle']    = 'No hay conexion a la base de datos';
    } else {

   // $vPasswordMd5=md5($vPassword);
    $consulta="select NOMBRE,NCONTROL,CARRERA from USUARIO
    	       where  USUARIO = '".$_SESSION['usuario']."'";

    $result = $link->query($consulta);

    if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();
            $NOMBRE = $registro['NOMBRE'];
            //$_SESSION['nombre']=$NOMBRE;
            ECHO"BIENVENIDO <BR>$NOMBRE";
            ECHO"<BR>QUE DESEA REALIZAR? <BR>";
            ECHO"<a href='ALTA.HTML'>ALTA</a> <BR><a href='CONSULTA.HTML'>CONSULTA</a><BR><a href='BAJA.HTML'>BAJA</a>";
    } else  {
      ECHO"ERROR EN EL USUARIO Y/O CONTRASEÑA";
    }

    $link->close();
}
}





?>
		    </div>
        </div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <button class="btn btn-success">SALIR</button>
		   </div>
		</div>
	    </form>
	</div>
     </div>
  </div>
</body>
</html>