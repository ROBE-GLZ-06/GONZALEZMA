<?php
include "CONEXION.PHP";

try {
    $consultarsql = "select NOMBRE, NCONTROL, CARRERA, CONTRASEÑA from usuario";
    $consulta = $con -> prepare($consultarsql);
    $consulta -> execute();
    $resultado = $consulta->fetchALL(PDO::FETCH_ASSOC);

    print "<h2><bre>fetchALL()</pre></h2>";
    print "<br>";
    var_dump($resultado);
    print "<br>";
    printf("<b>nombre   = </b> %s <br>",$resultado['nombre']);
    printf("<b>ncontrol   = </b> %s <br>",$resultado['ncontrol']);
    printf("<b>carrera  = </b> %s <br>",$resultado['carrera']);
    printf("<b>contraseña   = </b> %s <br>",$resultado['contraseña']);
    print "<br><br><br>"

    $consulta->closeCursor();

}catch(PDOEXCEPTION $E){
    echo "ERROR DE CONSULTA A LA BASE DE DATOS";
    echo $E->getMessage();
}
?>
