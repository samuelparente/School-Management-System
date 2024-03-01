<?php
$uploadDir = 'img/pics/func/';
$originFile = $_FILES['userfile']['name'];
$tempFile = $_FILES['userfile']['tmp_name'];
$uploadFile = basename($_FILES['userfile']['name']);
$uploadFileDir = $uploadDir.$uploadFile; 
$fileSize = $_FILES['userfile']['size'];
$validTypeFile = ['jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG','bmp','BMP'];
$pathinfo = pathinfo($uploadFile);
$fileExtension = ($pathinfo['extension']);
const fileSizeLimit = 2000000;
/*
echo "diretorio servidor: ".$uploadDir;
echo "<br>";
echo "ficheiro original: ".$originFile;
echo "<br>";
echo "ficheiro temporario: ".$tempFile;
echo "<br>";
echo "nome ficheiro original: ".$uploadFile;
echo "<br>";
echo "caminho completo ficheiro no servidor: ".$uploadFileDir;
echo "<br>";
echo "tamanho em bytes: ".$fileSize;
echo "<br>";
echo fileSizeLimit;
echo "<br>";
*/

function avatar(){
if(in_array($fileExtension, $validTypeFile)){
	
	if($fileSize<=fileSizeLimit){
		
		if(move_uploaded_file($tempFile, $uploadFileDir)){
			
		}else{
			$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i>Ocorreu um erro a carregar a fotografia.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
		}
		
	}else{
		$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i>O tamanho máximo da fotografia é 2Mb.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
	}
	
}else{
	$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i>Apenas ficheiros jpg,png,bmp ou gif.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
}

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
</body>
</html>