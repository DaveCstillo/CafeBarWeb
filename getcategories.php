<?php
 
 		$host = "localhost";
 		$user = "id6871932_cafebarsite";
 		$pw = "VidalCafeBar";
 		$db = "id6871932_cafedata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
		$json = array();
//!empty($_GET["nota"]) && is_array($_GET["nota"])
		

			$query = "SELECT * FROM `Categorias`";
			$res = $con->query($query);
			if($res){
 				while($fila = mysqli_fetch_array($res)){
 					$cat["ID"]=$fila["ID"];
 					$cat["Nombre"]=$fila["Nombre"];
 		
 					
 					$json["Categorias"][]=$cat;

 				}
 			}
 			
 			else{
					$cat["Result"]=["No Encontrado"];
 					$json["Error"][]=$cat;
 					//echo json_encode($json);
				}
 			
 			mysqli_close($con);
 			echo json_encode($json);
	

?>