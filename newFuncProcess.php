<?php

require_once("con_db.php");
const fileSizeLimit = 2000000;
$foto="";
$nome="";
$apelido="";
$dataNasc="";
$cargo="";
$morada="";
$cp="";
$cidade="";
$pais="";
$contacto1="";
$contacto2="";
$email="";
$utilizador="";
$password="";
$nivelAcesso="";
$notas="";
$feedback="";
$queryDbRow="";

		

if($_SERVER["REQUEST_METHOD"] == "POST"){

	$utilizador = trim($_POST['username']);
	$password = trim($_POST['password']);
	$nome = trim($_POST['nome']);
	$apelido = trim($_POST['apelido']);
	$dataNasc = trim($_POST['dataNasc']);
	$cargo = trim($_POST['cargo']);
	$morada = trim($_POST['morada']);
	$cp = trim($_POST['cp']);
	$cidade = trim($_POST['cidade']);
	$pais = trim($_POST['pais']);
	$contacto1 = trim($_POST['contacto1']);
	$contacto2 = trim($_POST['contacto2']);
	$email = trim($_POST['email']);
	$nivelAcesso = trim($_POST['nivelAcesso']);
	$notas = trim($_POST['notas']);
	
	
	//verificar se existe foto carregada ou não.
	if($_FILES['userfile']['name']!=""){
		$uploadDir = 'img/pics/func/';
		$originFile = $_FILES['userfile']['name'];
		$tempFile = $_FILES['userfile']['tmp_name'];
		$uploadFile = basename($_FILES['userfile']['name']);
		$uploadFileDir = $uploadDir.$uploadFile; 
		$fileSize = $_FILES['userfile']['size'];
		$validTypeFile = ['jpg','JPG','jpeg','JPEG','gif','GIF','png','PNG','bmp','BMP'];
		$pathinfo = pathinfo($uploadFile);
		$fileExtension = ($pathinfo['extension']);
		$fileSize = $_FILES['userfile']['size'];
	
			if(in_array($fileExtension, $validTypeFile)){

				if($fileSize<=fileSizeLimit){

					//extensao ok tamanho ok
					if(move_uploaded_file($tempFile, $uploadFileDir)){
						
						//inserir dados na bd e foto
						//verifica campos vazios
						if(($utilizador=="") or ($password=="")or ($nome=="") or ($apelido=="") or ($cargo=="") or ($morada=="") or ($cp=="") or ($cidade=="") or ($pais=="") or ($contacto1=="") or ($nivelAcesso=="")){
							$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i> Tem de preencher todos os campos assinalados.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
						}
						//dados ok-verificar se utilizador já existe
						else{

							$dadosDb = "SELECT utilizador FROM testefuncionarios WHERE utilizador='$utilizador'";
							$queryDb=mysqli_query($ligacao,$dadosDb);
							$queryDbRow=mysqli_num_rows($queryDb);

							//utilizador já existente
							if($queryDbRow!=0){
								$feedback="<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i> Nome de utilizador já existe.<button type=\"button\" class=\"btn-close\"data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";	
							}
							//utilizador não registado
							else{
								$foto=$uploadFile;
								$hashPassword=password_hash($password,PASSWORD_DEFAULT);
								$dadosDb = "INSERT INTO testefuncionarios (foto,nome,apelido,datanascimento,cargo,morada,codigopostal,cidade,pais,telefone1,telefone2,email,nivelacesso,notas,utilizador,password) VALUES ('$foto','$nome','$apelido','$dataNasc','$cargo','$morada','$cp','$cidade','$pais','$contacto1','$contacto2','$email','$nivelAcesso','$notas','$utilizador','$hashPassword')";

								$queryDb=mysqli_query($ligacao,$dadosDb);

								if (!$queryDb) {
									$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"> Não foi possível inserir novo funcionário. Contacte o administrador.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
								}
								else{
									$feedback="<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-check-circle-fill\"></i> Funcionário registado com sucesso!<button type=\"button\"class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
									</div>";	
								}		

							}//utilizador nao registado.criar novo
						}//verifica utilizador existe ou nao

								
					}else{//outro erro nao definido
						
						$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i> Ocorreu um erro a carregar a fotografia.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
					}
				//tamanho foto nok
				}else{
					
					$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i> O tamanho máximo da fotografia é 2Mb.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
				}

			//tipo ficheiro nok
			}else{
				
				$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i> Apenas ficheiros jpg,png,bmp ou gif.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
			}

	}//foto ok
	else{
	
		//verifica campos vazios
		if(($utilizador=="") or ($password=="")or ($nome=="") or ($apelido=="") or ($cargo=="") or ($morada=="") or ($cp=="") or ($cidade=="") or ($pais=="") or ($contacto1=="") or ($nivelAcesso=="")){
			$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i> Tem de preencher todos os campos assinalados.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
		}
		//dados ok-verificar se utilizador já existe
		else{

			$dadosDb = "SELECT utilizador FROM testefuncionarios WHERE utilizador='$utilizador'";
			$queryDb=mysqli_query($ligacao,$dadosDb);
			$queryDbRow=mysqli_num_rows($queryDb);

			//utilizador já existente
			if($queryDbRow!=0){
				$feedback="<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-exclamation-triangle\"></i> Nome de utilizador já existe.<button type=\"button\" class=\"btn-close\"data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";	
			}
			//utilizador não registado
			else{
				$foto="default.jpg";
				$hashPassword=password_hash($password,PASSWORD_DEFAULT);
				$dadosDb = "INSERT INTO testefuncionarios (foto,nome,apelido,datanascimento,cargo,morada,codigopostal,cidade,pais,telefone1,telefone2,email,nivelacesso,notas,utilizador,password) VALUES ('$foto','$nome','$apelido','$dataNasc','$cargo','$morada','$cp','$cidade','$pais','$contacto1','$contacto2','$email','$nivelAcesso','$notas','$utilizador','$hashPassword')";

				$queryDb=mysqli_query($ligacao,$dadosDb);

				if (!$queryDb) {
					$feedback="<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\"> Não foi possível inserir novo funcionário. Contacte o administrador.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
				}
				else{
					$feedback="<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><i class=\"bi bi-check-circle-fill\"></i> Funcionário registado com sucesso!<button type=\"button\"class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
					</div>";	
				}		

			}//utilizador nao registado.criar novo
		}//verifica utilizador existe ou nao
	}//sem foto
} //post request	

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
</body>
</html>