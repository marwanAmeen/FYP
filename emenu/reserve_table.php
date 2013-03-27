<?php

$response=array();
require_once("includes/connection.php");
require_once("includes/Database.php");
$date=$_GET['date'];
$time=$_GET['time'];
$space="  ";
$DateTime=$date . $space . $time;
//$date = new DateTime($current_date_time);
// this add 10 minutes to the user resevation time,it gives the user chance to for 10 minutes to confirm thier reservation 
//$date->modify('+10 minute');
//$date1=$date->format('Y-m-d  h:i:s a');
//$formated_date_time = date('Y-m-d  h:i:s a', );
echo formated_date_time ; 
// validate the posted data.
if(isset($_GET['customer_name'])&& isset($_GET['customer_phone'])&&isset($_GET['table_name']) )
{

	$post_customer_name =$_GET['customer_name'];
	$post_customer_phone =$_GET['customer_phone'];
	$post_reservation_time =$_GET['reservation_date'];
	$post_table_name= $_GET['table_name'];
	$status=Database::excute_select("SELECT status FROM emn_table WHERE status = 'Free' and table_name='$post_table_name'");

	if ($status[0]->status=="Free") 
	{

		# code...
		$inserted=Database::excute_query("INSERT INTO emn_reservation ( table_name, res_time, cust_name, cust_phone)
								VALUES ('$post_table_name','$post_reservation_time','$post_customer_name', '$post_customer_phone'); ");
				// this statement will update the  table to reserved
		if($inserted){

			$updated=Database::excute_query("UPDATE emn_table SET status='Reserved' WHERE table_name='$post_table_name' ");
			if($updated)
			{
				$response["Reserved"]=1;
				$response["Message"]="Your Table is  Reserved, Thank you";
				echo json_encode($response);
			}
	}
	else{
		$response["Reserved"]=0;
		$response["Message"]="Your Table is not Reserved, Please Try again";
		echo json_encode($response);
	}

	}
	
}
else {
	$response["Reserved"]=3;
	 $response["Message"]="Field  Please Try again";
		echo json_encode($response);
		

}
	
?>
