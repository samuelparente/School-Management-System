<?php
session_start(); // put this on the top of each page you want to use
header('location: funcionarios.php');

require_once("con_db.php");



	
$parsedData=$_GET["id"];


		$dadosDb = "DELETE FROM testefuncionarios WHERE id=".$parsedData;
		$queryDb=mysqli_query($ligacao,$dadosDb);
		$feedback="<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">	
							<i class=\"bi bi-check-circle-fill\"></i>
						  Registo eliminado
						  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
						</div>";
		$_SESSION["feedback"] =$feedback;

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