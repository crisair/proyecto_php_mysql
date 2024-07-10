<?php 

	function Conectar(){
 if (! ($cnn = mysqli_connect("","id21213191_isa","Yeni123+"))) {


 	exit();
 	
 }if (! mysqli_select_db($cnn,"id21213191_empresa")) {

 	exit();
 }

 return $cnn;

}

 ?>