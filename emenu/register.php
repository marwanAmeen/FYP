<?php
$response=array();
$response_json=array();
require_once("includes/connection.php");
require_once("includes/Database.php");
require_once("notify.php");
if(isset($_GET['name'])&& isset($_GET['email'])&&isset($_GET['password'])&&isset($_GET['gcm_regid'])){
	$_gcm_id=$_GET['gcm_regid'];
	$_name=$_GET['name'];
	$_email=$_GET['email'];
	$_pass=$_GET['password'];
	$_time =date('Y-m-d H:i:s');
	$_gcm_object=new notify();
	$inserted=Database::excute_query("INSERT INTO customer_gcm ( gcm_regid, name, email, created_at,pass)
								VALUES ('$_gcm_id','$_name','$_email', '$_time',$_pass); ");
	if($inserted){
		$response["Registered"]=1;
		$response["Message"]="You are registered!";
		echo json_encode($response);
		$_gcm_object=new notify();
    	$regist_ids = array($_gcm_id);
    	$message = array("Resevation" => "Your Resevation is cancelled");
    	$result = $_gcm_object->notify_user($regist_ids, $message);
    	//echo $result;
		
	}else{
		$response["Registered"]=2;
		$response["Message"]="You are not registered!";
		echo json_encode($response);
	}
}
else{
	$response["Registered"]=3;
	$response["Message"]="Fields is missing!";
		echo json_encode($response);
}
?>
