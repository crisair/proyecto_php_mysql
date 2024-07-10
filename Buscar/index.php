<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>index</title>
</head>
 <title> MENU BUSQUEDA</title>
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
</head>

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

<body bgcolor="#F9EBEA ">

<center>
<h1>MENU DE BUSQUEDA </h1>


<table border="0.2">
	 <tr>
	 	<td><a href="mostrarTodos.php">mostrar todos</td>
	 </tr>
	 <tr>
	 	<td><a href="buscarRegion.php">buscar por region</td>
	 </tr>
	 <tr>
	 	<td><a href="buscarRegistro.php">buscar por rut</td>
	 </tr>
     <tr>
	 	<td><a href="buscarFecha.php">buscar por fecha</td>
	 </tr>
	 <tr>
	 	<td><a href="buscarNombre.php">buscar por nombre</td>
	 </tr>
	 <tr>
	 	<td><a href="buscarSexo.php">buscar por sexo</td>
	 </tr>
	 <tr>
	 	<td><a href="buscarApellido.php">buscar por apellido</td>
	 </tr>


</table>

	 
	 <h3><a href="../index.php">volver al menu principal</h3>




</center>



</body>
</html>