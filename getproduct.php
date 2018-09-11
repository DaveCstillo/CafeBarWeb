<?php
 
 		$host = "localhost";
 		$user = "id6871932_cafebarsite";
 		$pw = "VidalCafeBar";
 		$db = "id6871932_cafedata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
		$json = array();
if(isset($_GET["tabla"])){
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		
		$tabla = $_GET["tabla"];

			$query = "SELECT * FROM `{$tabla}`";
			$res = $con->query($query);
			if($res){
 				while($fila = mysqli_fetch_array($res)){
 					$food["ID"]=$fila["ID"];
 					$food["Nombre"]=$fila["Nombre"];
 					$food["Imagen"]=$fila["Imagen"];
 					$food["Precio"]=$fila["Precio"];
 					
 					$json[$tabla][]=$food;

 				}
 			}
 			
 			else{
					$food["Result"]=["No Encontrado"];
 					$json["Error"][]=$food;
 					//echo json_encode($json);
				}
 			
 			mysqli_close($con);
 			echo json_encode($json);

	}else{
		echo "debe incluir la categoria.";
	}
	

?>