<?php

include "conexion.php";

try {
    $consultaSql = "select nombre,ncontrol,carrera,contraseña from usuario";
    $consulta = $con -> prepare($consultaSql);
    $consulta -> execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    //Siguiente registro como array asaociativo
    //--------------------------------------------------------------------
    print"<h2><pre>PDO::FETCH_ASOC</pre></h2>";
    print "<br>";
    var_dump($resultado);
    print "<br>";
    printf("<b>nombre    = </b> %s <br>",$resultado['nombre']);
    printf("<b>ncontrol = </b> %s <br>",$resultado['ncontrol']);
    printf("<b>carrera = </b> %s <br>",$resultado['carrera']);
    printf("<b>contraseña     = </b> %s <br>",$resultado['contraseña']);
    print "<br><br><br>";

    $consulta->closeCursor();

} catch(PDOException $e) {
    echo "Error de consulta a la base de datos";
    echo $e->getMessage();
}
?>