<?php
class Database
{
 	public static function excute_select($query)
 	{
 		$query_results=array();
    		if($result=mysql_query($query))
    		{
       		  while($row=mysql_fetch_object($result))
 	   		array_push($query_results,$row);
    		}
    		return $query_results;
 	}
 	public static function excute_query($query)
	{
		$res=mysql_query($query);
		return $res;
 	}
}
?>