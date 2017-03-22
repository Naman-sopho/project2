

<?php
$allowedExts = array(
	"jpeg",
	"jpg",
	"png"
);
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$extension = end($temp);

if ((($_FILES["fileToUpload"]["type"] == "image/gif") || ($_FILES["fileToUpload"]["type"] == "image/jpeg") || ($_FILES["fileToUpload"]["type"] == "image/jpg") || ($_FILES["fileToUpload"]["type"] == "image/pjpeg") || ($_FILES["fileToUpload"]["type"] == "image/x-png") || ($_FILES["fileToUpload"]["type"] == "image/png")) && ($_FILES["fileToUpload"]["size"] < 1000000) && in_array($extension, $allowedExts))
{
	if ($_FILES["fileToUpload"]["error"] > 0)
	{
		apologize("Return Code: " . $_FILES["fileToUpload"]["error"] . "<br />");
	}
	else
	{
		$fileName = $temp[0] . "." . $temp[1];
		//Set to random number
		$temp[0] = rand(0, 3000); 
		$fileName;
		if (file_exists("img/uploads/" . $_FILES["fileToUpload"]["name"]))
		{
			apologize($_FILES["fileToUpload"]["name"] . " already exists. ");
		}
		else
		{
			// give a random name to the file before saving
			$temp = explode(".", $_FILES["fileToUpload"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "img/uploads/" . $newfilename);
		}
	}
}
else
{
	apologize("Please upload a file of size less than 1MB and in one of the formats \".jpg\", \".jpeg\" or \".png\"");
}

?>


