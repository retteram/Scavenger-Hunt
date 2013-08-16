<?php
//This function separates the extension from the rest of the file name and returns it 
 function findexts ($filename) 
 { 
 $filename = strtolower($filename) ; 
 $exts = split("[/\\.]", $filename) ; 
 $n = count($exts)-1; 
 $exts = $exts[$n]; 
 return $exts; 
 } 
 
 //This applies the function to our file  
 $ext = findexts ($_FILES['photo']['tmp_name']) ;
 $ext = "jpg"; 

//This line assigns a random number to a variable. You could also use a timestamp here if you prefer. 
 $ran = rand () ;

 //This takes the random number (or timestamp) you generated and adds a . on the end, so it is ready of the file extension to be appended.
 $ran2 = $ran.".";

 //This assigns the subdirectory you want to save into... make sure it exists!
 $target = "img/";
 //This combines the directory, the random file name, and the extension
 $target = $target . $ran2.$ext; 
 $nameSub = $ran2.$ext;

	if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){
		mysql_connect('localhost', 'esignby9_admin', 'MUohio1809!');
		$query = "INSERT INTO `esignby9_stuntHunt`.`stuntPhotos`(
		`key` ,
		`date` ,
		`user` ,
		`photo` ,
		`lat` ,
		`long` 
		)
		VALUES (
		NULL , NOW( ) , '".addslashes($_POST['user'])."', '$nameSub', '".addslashes($_POST['lat'])."', '".addslashes($_POST['long'])."'
		);";
	
	mysql_query($query);
	//echo $query;
	//echo "<br />";
	//echo $target;
	echo "<div id=\"topBar\"/><a href=\"map.php\"><img id=\"backB\" src=\"img/back.png\"/></a><span class=\"listNumb\"><h3 id=\"huntTitle\">Scavenger Stunt Hunt</h3></h3></div>";
	echo '<hr>';
	echo "Your Photo Is Being Uploaded, Please Go Back."
	
	}
	else{
		echo "error";	
	}
	;
	echo basename($_FILES['photo']['tmp_name'])
	;
	
?>

