<?php
 
 		$host = "localhost";
 		$user = "id6871932_cafebarsite";
 		$pw = "VidalCafeBar";
 		$db = "id6871932_cafedata";

		$con = new mysqli($host, $user, $pw, $db) or die ("No se pudo conectar con la base de datos");
		
		$json = array();



if(isset($_GET["No_Mesa"]) && isset($_GET["No_Cuenta"]) && isset($_GET["ID"]) && isset($_GET["Comida"]) && isset($_GET["Cantidad"])){

$noMesa = $_GET["No_Mesa"];
$noCuenta = $_GET["No_Cuenta"];
$id = $_GET["ID"];
$comida = $_GET["Comida"];
$cantidad = $_GET["Cantidad"];
	
	if(isset($_GET["Extras"])){
		$extras = $_GET["Extras"];
	}else{
		$extras = "sin extras";
	}

$fileName = $noMesa . ".json";

$arr_noCuenta = array();
$arr_id = array();
$arr_comida = array();
$arr_cantidad = array();




if(file_exists($fileName)){
	echo "existe <br>";
$data_actual = file_get_contents($fileName);


 $json_actual = json_decode($data_actual, true);

	// if($json_actual){
	// 	echo $json_actual;

	// foreach ($json_actual as $actual) {

	// 	$arr_noCuenta
	// 	print_r($actual);
	// }
	// }
$data = [];

//foreach($json_actual as $fileline){

	$data[] = json_decode($data_actual, true);

//}
echo "-------Bloque json_actual, data, data[0], json_actual[1]-------------<br>";

print_r($json_actual);
echo "<br>";
print_r($data);
echo "<br>";
print_r($data[0]);
echo "<br>";
print_r($json_actual[1]);
echo "<br>";

echo "-------------Fin de bloque---------<br>";
$prod_prev;
foreach ($json_actual as $json_prod) {
	# code...

#$arr_json_prod = $json_actual[1];

// echo "------arr_json_prod-------<br>";
// print_r($arr_json_prod);
// echo "<br>--------------------------<br>";
	echo "<br>";
	print_r($json_prod);
	echo "<br>";

	$arr_prod = array('Comida'=>$json_prod["Comida"],'Cantidad'=>$json_prod["Cantidad"]);

	$prod_prev["No_Cuenta"][] = $arr_prod;
	

	// foreach ($json_prod as $actuale) {
	// 	# code...
	// 	echo $actuale."<br>";
	// 	$prod_prev[]=$actuale;
	// 	print_r($prod_prev);
	// 	echo "<br>";

	// }
	}

$arr_detalle_prod = array('No_Cuenta' => $noCuenta, 'Comida' => $comida, 'Cantidad'=>$cantidad);
echo "--------Array detalle prod actual------<br>";
print_r($arr_detalle_prod);
$arr_final = array_merge($prod_prev,$arr_detalle_prod);
echo "<br>----Array Final-------<br>";
print_r($arr_final);
echo"<br>--------------------<br>";

$json[$noMesa] = $arr_final;
$jsonFile = json_encode($json);
file_put_contents($fileName, $jsonFile);
}else{
	echo "no existe <br>";
	$arr_detalle_prod = array('No_Cuenta' => $noCuenta, 'Comida' => $comida, 'Cantidad'=>$cantidad);
echo "--------Array detalle prod actual------<br>";
print_r($arr_detalle_prod);

$json[$noMesa] = $arr_detalle_prod;
$jsonFile = json_encode($json);
file_put_contents($fileName, $jsonFile);
}
}else{
	echo "faltan datos";
}

	

?>