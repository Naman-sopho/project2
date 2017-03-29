<?php
require("../includes/helpers.php");


//connect to the database
$conn = database_connect();
$categories=["ALL","Books","Clothing","Electronics","Furniture","Sports","Vehicles","others"];
if (($_GET["category"]== 0) && ($_GET["college"]==0))
{
		$data=[];
		header("Content-type: application/json") ;
		print(json_encode($data,JSON_PRETTY_PRINT)) ;
}


elseif($_GET["college"]==0)
{
		$query = "SELECT * FROM items WHERE category='".$_GET["category"]."'";
		$result = query($conn, $query);
		
		
		$data=[];
		if (mysqli_num_rows($result) > 0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) {
				$data[]=[
					"name" => $row["name"],
					"image" => $row["image"],
					"price" => $row["price"],
					"college" => $row["college"],
					"category" => $categories[$row["category"]],
					"ad_id" => $row["ad_id"],
					"date" => $row["date"]
				];
				
			}
				
		}	
		header("Content-type: application/json") ;
		print(json_encode($data,JSON_PRETTY_PRINT)) ;
			
}

	
elseif (($_GET["category"]==0))
	{
		$query = "SELECT * FROM items WHERE college='".$_GET["college"]."'";
		$result = query($conn, $query);
		
		// render filtered results
		$data=[];
		if (mysqli_num_rows($result) > 0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) {
				$data[]=[
					"name" => $row["name"],
					"image" => $row["image"],
					"price" => $row["price"],
					"college" => $row["college"],
					"category" => $categories[$row["category"]],
					"ad_id" => $row["ad_id"],
					"date" => $row["date"]
				];
				
			}
				
		}	
		header("Content-type: application/json") ;
		print(json_encode($data,JSON_PRETTY_PRINT)) ;
	}
	
	
else
	{
		$query = "SELECT * FROM items WHERE category='".$_GET["category"]."' AND college='".$_GET["college"]."'";
		$result = query($conn, $query);
		
		// render filtered results
		$data=[];
		if (mysqli_num_rows($result) > 0)
		{
			
			while ($row = mysqli_fetch_assoc($result)) {
				$data[]=[
					"name" => $row["name"],
					"image" => $row["image"],
					"price" => $row["price"],
					"college" => $row["college"],
					"category" => $categories[$row["category"]],
					"ad_id" => $row["ad_id"],
					"date" => $row["date"]
				];
				
			}
				
		}	
		header("Content-type: application/json") ;
		print(json_encode($data,JSON_PRETTY_PRINT)) ;
	}
	
?>
