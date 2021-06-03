<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
    </head>
<body>
    <div class="contaniner.all">
        <div class="ctn-form">
            <h1 class="title">
                INICIAR SESION
            </h1>
            <FORM action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label for="">USUARIO</label>
            <input type="text" name = "usuario">
            <span class="msg-error"><?php echo $usuario_error ?>
            </span>
            <label for="">CONTRASEÑA</label>
            <input type="text" name = "contraseña">
            <span class="msg-error"><?php echo $contraseña_error ?>
            </span>
            <input type="submit" value="INICIAR SESION">

            <SPAN class = "text-footer"> NO TIENES CUENTA?
                <A href="register.phps">REGISTRATE</A>
            </SPAN>

            </FORM>

        </div>
    </div>
    </body>
</html>