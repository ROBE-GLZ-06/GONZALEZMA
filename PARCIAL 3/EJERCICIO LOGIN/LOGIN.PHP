<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
    
    <title>LOGEADO</title>
</head>
<body>
    <div class="container">
        <div class="row text-center login-page">
	   <div class="col-md-12 login-form">
	      <form action="LOGIN.HTML" method="post"> 			
	         <div class="row">
		    <div class="col-md-12 login-form-header">
		       <p class="login-form-font-header"><span></span><p>
             <?php
           $vLogin   = $_POST['Usuario'];
$vPassword= $_POST['Contraseña'];


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

    $consulta="select NOMBRE,NCONTROL,CARRERA from USUARIO
    	       where  USUARIO = '".$vLogin."' and CONTRASEÑA = '".$vPassword."'";

    $result = $link->query($consulta);

    if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();
            $NOMBRE = $registro['NOMBRE'];
            $NCONTROL=$registro['NCONTROL'];
            $CARRERA=$registro['CARRERA'];
            ECHO"BIENVENIDO <BR>$NOMBRE";
            ECHO"<BR>CON EL NUMERO DE CONTROL : <BR>$NCONTROL";
            ECHO"<BR>EN LA ESPECIALIDAD DE : <BR>$CARRERA";
    } else  {
      ECHO"ERROR EN EL USUARIO Y/O CONTRASEÑA";
    }

    $link->close();
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