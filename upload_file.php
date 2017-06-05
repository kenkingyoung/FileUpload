<?php
header("Content-type: text/html; charset=utf-8");

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 60000)){	
	if($_FILES["file"]["error"]>0){		
		echo "Error: ".$_FILES["file"]["error"]."<br />";		
	}	
	else{		
		echo "Upload: ".$_FILES["file"]["name"]."<br />";		
		echo "Type: ".$_FILES["file"]["type"]."<br />";		
		echo "Size: ".($_FILES["file"]["size"]/1024)."kb <br/>";		
		echo "Temp file: ".$_FILES["file"]["tmp_name"]."<br />";	

        if(file_exists(dirname(__FILE__)."\upload\\".$_FILES["file"]["name"])){
            echo dirname(__FILE__)."\upload\\".$_FILES["file"]["name"]." 文件已存在";
        }
        else{
            move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__FILE__)."\upload\\".$_FILES["file"]["name"]);
            echo "Stored in: ".dirname(__FILE__)."\upload\\".$_FILES["file"]["name"];	 
        }
	}	
}
else{
    echo "文件不符合要求";
}

?>