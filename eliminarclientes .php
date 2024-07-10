<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eliminar clientes</title>
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
<body bgcolor="#EAF2F8">
<form method="post">	
	<center>
	<h1>Eliminar Clientes</h1>
    <?php error_reporting (0) ?> 
<?php

if($_POST['btnVer']=="Buscar"){
    include("funciones.php");
    $cnn = Conectar();
    $Rut = $_POST['txtRut'];
    $rs = mysqli_query($cnn, "select * from clientes where rut='$Rut'");
    if($row = mysqli_fetch_array($rs)){
        $nom = $row[1];
        $ape = $row[2];
    }else{
        echo "<script>alert('no hay datos con ese rut')</script>";
    }
}
?>
	<table>
		<tr>
            <td> Rut :</td>
            <td><input type="text" name="txtRut" value="<?php echo "$Rut" ?>" size="25" maxlength="30"></td>
            <td><input type="submit" name="btnVer" value="Buscar" size="25" maxlength="30"></td>
        </tr>
        <tr>
        
            <td>Nombre :</td>
            <td><input type="text" name="txtNom" value="<?php echo "$nom" ?>" size="25" maxlength="30"></td>
        
            <td>Apellido :</td>
            <td><input type="text" name="txtApe" value="<?php echo "$ape"?>" size="25" maxlength="30"></td>
        </tr>
       
	</center>
        
     </table> 
     <br><br>  	
        	
        	<center><input type="submit" name="btnEliminar" value="Eliminar" size="25" maxlength="30"></center>

            
     <h3><a href="index.php">volver</h3>
  	

 <?php 
 

if ($_POST['btnEliminar']=="Eliminar"){

	include("funciones.php");
	$cnn = Conectar();
	 $Rut = $_POST['txtRut'];
	 $nom = $_POST['txtNom'];
	 $ape = $_POST['txtApe'];

	 $sql="delete from clientes where(Rut = '$Rut')";
	


mysqli_query($cnn,$sql);

echo "<script>alert('Eliminamos el registro')</script>";

}

  ?>  
	
		
	
</form>

</body>
</html>