<?php

$response=array();
require_once("includes/connection.php");
require_once("includes/Database.php");
if(isset($_GET['email'])&&isset($_GET['password'])){
	
	$_email=$_GET['email'];
	$_pass=$_GET['password'];
	//$inserted=Database::excute_query("INSERT INTO customer_gcm(gcm_regid,name,email,created_at ,pass)
	//									VALUES ('$_gcm_id','$_name','$_email','$_time','$_pass'); ") or die mysql_error();
	
		$selected=Database::excute_select("SELECT email FROM customer_gcm WHERE pass = '$_pass' and email='$_email'");
							
	if($selected){
		$response["LogedIn"]=1;
		$response["Message"]="You are Loged In!";
		echo json_encode($response);

	}else{
		$response["LogedIn"]=2;
		$response["Message"]="You are not Loged In!";
		echo json_encode($response);
	}


}
else{
	$response["LogedIn"]=3;
	$response["Message"]="Fields is missing!";
		echo json_encode($response);
}
?>
