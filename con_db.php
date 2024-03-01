
<?php
$servidorDb="pdb55.awardspace.net";
$utilizadorDb="3842794_sge";
$passwordDb="sarasamuel1";
$db="3842794_sge";

//cria ligação a db
$ligacao=mysqli_connect($servidorDb,$utilizadorDb,$passwordDb,$db);

	if (!$ligacao) {
	  //echo("Não foi possível conectar com o servidor");
	}
	else{
		//echo ("Conexão com servidor bem sucedida");	
	}
?>
