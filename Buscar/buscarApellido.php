<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>buscar apellido</title>
    
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
</head>
<body onload="IniciarReloj24()" >
<form name="reloj24" >
        <input type="text" size="8" name="textDigitos" value="" style="background-color:#EAF2F8 ; color: black;" readonly>

    <tr>
        <?php
        date_default_timezone_set('America/Santiago');
        $vaFecha=date('d-m-Y');
         ?>
         <td> <input type="text" name="Caja_fecha" value="<?php echo $vaFecha;?>" disabled ="disabled" size ="8" style="background-color:#EAF2F8 ; color: black;" readonly></td>
    </tr>

</form>



<body  bgcolor="#EAF2F8">

<center>

			
	<form method="post">
           
            <h1>BUSCAR POR APELLIDO</h1>
           
            <table>
                <tr>
                    <td>Apellido:</td>
                    <td> <input type = "text" name ="txtape" value = ""></input>
                    <input type="submit" name="btnbuscar" value="buscar"> 
                    </td>
                    
                </tr> 
                
            </table><br> <br> 

  <?php error_reporting (0)  ?>                      

<?php

if($_POST['btnbuscar']=="buscar"){
    include("funciones.php");
    $cnn = Conectar();
    $ape = $_POST['txtape'];
    $rs = mysqli_query($cnn, "select * from clientes where Apellido='$ape'");

     if (mysqli_num_rows($rs) > 0) {
                    echo "<table border='1'>";
                    echo "<tr align='center'>";
                    echo "<td><b>RUT</td>";
                    echo "<td><b>Nombre</td>";
                    echo "<td><b>Apellido</td>";
                    echo "<td><b>Fecha de nacimiento</td>";
                    echo "<td><b>Sexo</td>";
                    echo "<td><b>Region</td>";
                    echo "<td><b>Fono</td>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_array($rs)) {
                        echo "<tr>";
                        echo "<td>" . $row[0] . "</td>";
                        echo "<td>" . $row[1] . "</td>";
                        echo "<td>" . $row[2] . "</td>";
                        echo "<td>" . $row[3] . "</td>";
                        echo "<td>" . $row[4] . "</td>";
                        echo "<td>" . $row[5] . "</td>";
                        echo "<td>" . $row[6] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "<p>No se encontraron registros.</p>";
                }
            }  
?>

 <h3><a href="index.php">volver</h3>
</body>
</html>