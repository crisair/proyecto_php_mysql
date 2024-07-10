<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MENU PRINCIPAL</title>
    <style>
        body {
            background: url(fondo.jpg) center fixed no-repeat;
        }
    </style>
    <script language="javascript">
        var RelojID24 = null;
        var RelojEjecutandose24 = false;

        function DetenerReloj24() {
            if (RelojEjecutandose24)
                clearTimeout(RelojID24);
            RelojEjecutandose24 = false;
        }

        function MostrarHora24() {
            var ahora = new Date();
            var horas = ahora.getHours();
            var minutos = ahora.getMinutes();
            var segundos = ahora.getSeconds();
            var ValorHora;
            //establece las horas
            if (horas < 10)
                ValorHora = "0" + horas;
            else
                ValorHora = "" + horas;
            //establece los minutos
            if (minutos < 10)
                ValorHora += ":0" + minutos;
            else
                ValorHora += ":" + minutos;
            //establece los segundos
            if (segundos < 10)
                ValorHora += ":0" + segundos;
            else
                ValorHora += ":" + segundos;
            document.reloj24.textDigitos.value = ValorHora;
            //si se desea tener el reloj en la barra de estado, reemplazar la anterior por esta
            //window.status = ValorHora
            RelojID24 = setTimeout("MostrarHora24()", 1000);
            RelojEjecutandose24 = true;
        }

        function IniciarReloj24() {
            DetenerReloj24();
            MostrarHora24();
        }
    </script>

</head >

<body onload="IniciarReloj24()" >
    <form name="reloj24" >
        <input type="text" size="8" name="textDigitos" value="" style="background-color:#1B4F72 ; color: white;" readonly>
    

    <tr>
        <?php
        date_default_timezone_set('America/Santiago');
        $vaFecha=date('d-m-Y');
         ?>
         <td> <input type="text" name="Caja_fecha" value="<?php echo $vaFecha;?>" disabled ="disabled" size ="8" style="background-color:#1B4F72 ; color: white;" readonly></td>
    </tr>

</form>
    <center>
        <br><br><br><br>
        <h1>MENU PRINCIPAL</h1>

        <table border="0">
            <tr>
                <td><a href="Formulario2.php">Registrar</a></td>
            </tr>
            <tr>
                <td><a href="eliminarclientes .php">Eliminar usuario</a></td>
            </tr>
            <tr>
                <td><a href="editarClientes.php">Editar</a></td>
            </tr>
            <tr>
                <td><a href="Buscar">Buscar</td>
            </tr>
        </table>
    </center>

    <br><br><br><br><br><br>

    <div align="center">
        <font color="B8433B">
            Docente: Claudio Duque<br>
            Alumno: Isabel Renteria <br>
            Modulo: Pro202<br>
            2023
        </font>
    </div>

</body>

</html>
