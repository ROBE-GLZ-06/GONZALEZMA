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
           $vNOMBRE   = $_POST['NOMBRE'];
           $vAPODO    = $_POST['APODO'];
           $vNUMERO    = $_POST['NUMERO'];


$hostname = 'localhost';
$database = 'futbol';
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
    $consulta="SELECT NUMERO, NOMBRE, APELLIDOP, APELLIDOM, EDAD, ESTATURA, PAIS, APODO FROM jugador
    	       where  NOMBRE = '".$vNOMBRE."' and APODO = '".$vAPODO."' and NUMERO = '".$vNUMERO."'";

    $result = $link->query($consulta);

    if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();
            $NUMERO = $registro['NUMERO'];
            $NOMBRE = $registro['NOMBRE'];
            $APELLIDOP = $registro['APELLIDOP'];
            $APELLIDOM = $registro['APELLIDOM'];
            $EDAD = $registro['EDAD'];
            $ESTATURA = $registro['ESTATURA'];
            $PAIS = $registro['PAIS'];
            $APODO = $registro['APODO'];
            ECHO"EL JUGADOR A ELIMIAR ES  <BR>NOMBRE : $NOMBRE<BR>";
            ECHO"<BR>APELLIDO PATERNO : $APELLIDOP<BR>";
            ECHO"<BR>APELLIDO MATERNO : $APELLIDOM<BR>";
            ECHO"<BR>NUMERO DE PLAYERA : $NUMERO<BR>";
            ECHO"<BR>EDAD : $EDAD AÑOS<BR>";
            ECHO"<BR>ESTATURA : $ESTATURA CM<BR>";
            ECHO"<BR>PAIS : $PAIS<BR>";
            ECHO"<BR>APODO : $APODO<BR>";
            $consulta2="DELETE FROM jugador
    	       where  NOMBRE = '".$vNOMBRE."' and APODO = '".$vAPODO."' and NUMERO = '".$vNUMERO."'";
               $result2 = $link->query($consulta2);
               if ($result->num_rows > 0){
                $registro = $result->fetch_assoc();
                   
            ECHO"<BR>SE HA ELIMINADO CON EXITO!!!!<BR>";

               }else{
                ECHO"EL JUGADOR A ELIMINAR NO EXISTE";

               }

    } else  {
      ECHO"EL JUGADOR A ELIMINAR NO EXISTE";
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