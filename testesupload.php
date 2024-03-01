
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




if(in_array($fileExtension, $validTypeFile)){
	
	echo "extensao correcta<br>";
	
	if($fileSize<=fileSizeLimit){
		
		echo "tamanho correcto<br>";
		
		if(move_uploaded_file($tempFile, $uploadFileDir)){
			
			echo "ficheiro enviado com sucesso.<br>";
			
		}else{
			echo "erro<br>";
		}
		
	}else{
		echo "Limite de tamanho máximo de 2Mb<br>";
	}
	
}else{
	echo "Apenas ficheiros jpg,png,bmp,gif.<br>";
}



/*
echo '<pre>';
if (move_uploaded_file($tempFile, $uploadFileDir)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}

echo 'Aqui está mais informações de debug:';
print_r($_FILES);

print "</pre>";*/

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