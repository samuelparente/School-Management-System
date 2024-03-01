<?php 
session_start();
	require_once("con_db.php");
$id="";
$nome="";
$apelido="";
$contacto1="";
$cargo="";
$nivelAcesso="";
$notas="";
$feedback="";
$queryDbRow="";
$cx="";


	//recebe dados
		$dadosDb = "SELECT * FROM testefuncionarios";
		mysqli_query($ligacao,"SET NAMES 'utf8'"); 
		$queryDb=mysqli_query($ligacao,$dadosDb);
		$queryDbRow=mysqli_num_rows($queryDb);
		
		if(isset($_SESSION["feedback"])){
			$feedback=$_SESSION["feedback"];
		}
		else{
			
			
		}
?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistema de Gestão Escolar</title>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">	
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="click_events.js"></script>
		
		<link href="plataform.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
		
	</head>

	<body>
		<div class="container-fluid">
			<?php include("platform_header.php");?>
			<div class="row mt-2">	
				<div class="col-md-12" id="titulo">
					<p>Gestão de funcionários</p>
				</div>
			</div>
			<div class="row row mb-3 justify-content-md-center align-items-center">
				<div class="col-md-5 text-center">
					<?php echo $feedback; unset($_SESSION["feedback"]);?>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-12 align-items-center bg-light" id="navtext">
					<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
					  <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="platform_main.php" id="bread">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Gestão de funcionários</li>
					  </ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" id="titulo">
					<a class="btn btn-primary btn-sm" type="button" id="novoRegisto" href="inserir_func.php">Criar novo registo</a>
					<button class="btn btn-primary btn-sm" type="button" id="imprimirRegistos">Imprimir lista</button>
				</div>
			</div>
				<div class="col-md-12" id="corpo">	
					<div class="row">
						<div id="tituloTabela"><p><strong>Lista de funcionários registados</strong></p></div>
					</div>
					
					<div class="row">
						<table class="table small align-middle">
						  
							<thead>
								<tr>
								  <th scope="col">ID</th>
								  <th scope="col"></th>
								  <th scope="col">Nome</th>
								  <th scope="col">Apelido</th>
								  <th scope="col">Contacto 1</th>
								  <th scope="col">Cargo</th>
								  <th scope="col">Nível de Acesso</th>
								  <th scope="col">Notas</th>
								  <th scope="col"></th>
								  <th scope="col"></th>
								</tr>
						  </thead>
							
						  <tbody>
								<?php 
								//percorre os registos 
								while($aux = mysqli_fetch_assoc($queryDb)) {?>
								
									<tr>
										<th scope="row"><?php echo $aux["id"];?></th>
										<td scope="row">
											<div class="picture-containerMini">
        										<div class="pictureMini">
           										 <img src="img/pics/func/<?php echo $aux["foto"];?>" class="picture-src" id="" title="">
												</div>
											</div>
										</td>
										<td scope="row"><?php echo $aux["nome"];?></td>
										<td scope="row"><?php echo $aux["apelido"];?></td>
										<td scope="row"><?php echo $aux["telefone1"];?></td>
										<td scope="row"><?php echo $aux["cargo"];?></td>
										<td scope="row"><?php echo $aux["nivelacesso"];?></td>
										<td scope="row"><?php echo $aux["notas"];?></td>
										<td><button type="button" class="btn btn-sm btn-primary">
											<i class="bi bi-pencil-fill icon-blue"></i>
											</button></td> 
										<td><button onclick="reply_click(this.id)" id="<?php echo $aux["id"];?>" type="button" class="btn btn-sm btn-danger icon-red"><i class="bi bi-trash3 icon-red"></i></button></td> 
									<tr>	
								
								<?php }	?>
									
						  </tbody>
						</table>	
					</div>
				</div>
		
    <!-- Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">SGE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Deseja eliminar o registo?</p>
		  <input type="hidden" id="hiddenId">
      </div>
      <div class="modal-footer align-items-center">
		
		  <button onclick="submitDel()" class="btn btn-sm btn-light" type="button" id="delReg"><i class="bi bi-check-lg"></i></button>
      
        <button type="button" data-bs-dismiss="modal" class="btn btn-light btn-sm"><i class="bi bi-x-lg"></i></button>
      </div>
    </div>
  </div>
</div>

			<?php include("platform_foot.php");?>
		</div><!--container-->
		
	<!--body-->
	</body>
</html>