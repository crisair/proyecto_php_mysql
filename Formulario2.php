<!DOCTYPE html>
<html>
<head>
    <?php  

    include("funciones.php");
    $cnn = Conectar();
     
    ?>
<?php error_reporting (0) ?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario #2</title>
	 <style>


        body {
            background: url(fondo.jpg) center fixed no-repeat;
        }
    </style>
    <script type="text/javascript">
     function ValidaSoloNumeros(){
        if((event.keyCode < 48)|| (event.keyCode > 57 ))
            event.returnValue = false;
     }   
     function ValidaSoloLetras(){
        if((event.keyCode !=32 ) && (event.keyCode < 65) ||
            (event.keyCode > 90 ) && (event.keyCode < 97) 
            ||(event.keyCode > 122 ))
            event.returnValue = false;
     }   

    </script>

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


</form>
<body bgcolor="#EAF2F8">
<form method="post">	
	<center>
	<h1>FORMULARIO</h1>

	<table>
		<tr>
            <td> Rut :</td>
            <td><input type="text" name="txtRut" value="" size="25" maxlength="30">-</td>
            <td>-<input type="text" name="txtVerificador" value="" size="1" maxlength="30" ></td>
        </tr>
        <tr>
            <td>Nombre :</td>
            <td><input type="text" name="txtNom" value="" size="25" maxlength="30" onkeypress="ValidaSoloLetras()"></td>
        </tr>
            <td>Apellido :</td>
            <td><input type="text" name="txtApe" value="" size="25" maxlength="30" onkeypress="ValidaSoloLetras()" ></td>
        </tr>
        </tr>
            <td>Fecha de Nacimiento :</td>
            <td><input type="date" name="dtFnc" value="" size="25" maxlength="30"></td>
        </tr>
        <tr>	
        	<td>Sexo:</td>
        	 <td>
        		<select name="selSex">
        			<option value="F">Femenino</option>
        			<option value="M">Masculino</option>	
        		</select>
        	</td>
        </tr>
        <tr>	
        	<td>Region</td>
        	 <td>
        		<?php 

                $sql ="select nombreRegion from regiones";
                $result = mysqli_query ($cnn,$sql);

                 ?>
                   <select name='selReg'>
                    <?php while ($row=mysqli_fetch_array($result)){
                        echo '<option>'.$row["nombreRegion"]; }

                    ?>
                       
                   </select>
        	</td>
        </tr>

    	</tr>
            <td>Fono :</td>
            <td><input type="text" name="txtFone" value="" size="25" maxlength="30" onkeypress="ValidaSoloNumeros()"></td>
        </tr>
	</center>
        
     </table> 
     <br><br>  	
        	
        	<center><input type="submit" name="btnRegis" value="REGISTRAR" size="25" maxlength="30"></center>


 <?php 

if ($_POST['btnRegis']=='REGISTRAR'){
	 $Rut = $_POST['txtRut'];
     $verificador = Verifica($Rut);
     $rutUsuario = $Rut."-".$_POST['txtVerificador'];
     $rutVerificador = $Rut."-".$verificador;
    // echo "$rutVerificador , $rutUsuario";
     if($rutUsuario != $rutVerificador){
        echo "<script>alert('Rut incorrecto el dijito correcto seria $rutVerificador')</script>";
     }else{
     $nom = $_POST['txtNom'];
     $ape = $_POST['txtApe'];
     $Fna = $_POST['dtFnc'];
     $Sex = $_POST['selSex'];
     $reg = $_POST['selReg'];
     $fon = $_POST['txtFone'];
     $rs = mysqli_query($cnn, "select * from clientes where rut='$rutVerificador'");
  
     $sql=" INSERT INTO clientes (rut, nombre,apellido, Fnac, sexo, region, fono) 
        VALUES ('$rutVerificador', '$nom', '$ape', '$Fna', '$Sex', '$reg', '$fon')";

     mysqli_query($cnn,$sql);


     echo "<script>alert('ha sido ingresado correctamente ')</script>";



 }
}

  ?>  

<h3><a href="index.php">volver</h3>  
	
		
	
</form>

</body>
</html>