<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--referencias para los estilos de bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--REFERENCIA A ARCHIVO PROPIO PARA MODIFICAR ESTILOS-->
   
    
    <title>REGISTRADO</title>
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
           $vUSUARIO   = $_POST['USUARIO'];
           $vNOMBRE   = $_POST['NOMBRE'];
           $vNCONTROL   = $_POST['NCONTROL'];
           $vCARRERA   = $_POST['CARRERA'];
           $vCONTRASEÑA   = $_POST['CONTRASEÑA'];


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
    $consulta="INSERT INTO USUARIO (USUARIO, NOMBRE, NCONTROL, CARRERA, CONTRASEÑA)
               VALUES ('$vUSUARIO', '$vNOMBRE', '$vNCONTROL', '$vCARRERA', '$vCONTRASEÑA')";
    	       /*where NOT EXISTS (SELECT * FROM usuario WHERE (USUARIO = '".$vUSUARIO."' and NCONTROL = '".$vNCONTROL."'))";*/

    $result = $link->query($consulta);

    $consulta2="SELECT USUARIO, NOMBRE, NCONTROL, CARRERA, CONTRASEÑA FROM USUARIO
    where NCONTROL = '".$vNCONTROL."' and USUARIO = '".$vUSUARIO."'";

$result2 = $link->query($consulta2);

    if ($result2->num_rows > 0) {
            $registro = $result2->fetch_assoc();
            $USUARIO = $registro['USUARIO'];
            $NOMBRE = $registro['NOMBRE'];
            $NCONTROL = $registro['NCONTROL'];
            $CARRERA = $registro['CARRERA'];
            $CONTRASEÑA = $registro['CONTRASEÑA'];
            ECHO"SE REGISTRO <BR>NOMBRE : $NOMBRE<BR>";
            ECHO"<BR>USUARIO : $USUARIO<BR>";
            ECHO"<BR>CONTRASEÑA : $CONTRASEÑA<BR>";
            ECHO"<BR>NCONTROL : $NCONTROL<BR>";
            ECHO"<BR>CARRERA : $CARRERA<BR>";
            ECHO"
            <form action='LOGIN.HTML' method='post'><div class='row'>
		   <div class='col-md-12 login-from-row'>
		      <button class='btn btn-success'>SALIR</button>
		   </div>
		</div>";

    } else  {
      ECHO"EL USUARIO QUE QUIERE AGREGAR YA EXISTE!!!";
    }

    $link->close();
}


?>
		    </div>
        </div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <button class="btn btn-success">REGISTRO</button>
		   </div>
		</div>
	    </form>
	</div>
     </div>
  </div>
</body>
</html>