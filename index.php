<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistema de Gestão Escolar</title>
		
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">	
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
		<link href="sge.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		
		<div class="container-fluid">
			<!--linha do cabeçalho-->
			<div class="row align-items-center">
			</div>
			<!--linha imagem infantil-->
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<img src="img/kids.png" class="img-fluid" style="width:450px"/>
				</div>
			</div>
			<!--linha nome plataforma-->
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<h3>Sistema de Gestão Escolar</h3>
				</div>
			</div>	
			<!--linha do corpo-->
			<div class="row d-flex justify-content-center align-items-center gap-2">
				
				<!--formulario login-->
				<div class="col-md-12" style="width: 30rem">
					<div class="card  bg-light" >
					<div class="card-body">
						<h5 class="card-title"><b>Login</b></h5>
						<form id="loginForm">
							<div class="mb-3" align="left">
								<label for="entradaUtilizador" class="form-label">Utilizador</label>
								<input type="text" class="form-control" id="entradaUtilizador" aria-describedby="utilizadorHelp">
								<div id="utilizadorHelp" class="form-text"></div>
							</div>
							<div class="mb-3" align="left">
								<label for="entradaPassword" class="form-label">Password</label>
								<input type="password" class="form-control" id="entradaPassword">
							</div>
							<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary">Entrar</button>
							</div>
							<div id="registerText">
							  <p>Novo utilizador? Registe-se <a href="register.php">aqui.</a></p>
                            </div>
							
							<p></p>
						</form>
					</div>
					</div>
				</div>
				
			<!--linha do rodapé-->	
			
			<div id="rodape" class="row align-items-center text-center bg-light">
				<div class="col-md-12">
					<p>Criado por Samuel Parente @2022</p>
				</div>
			</div>
		<!--container-->
		</div>
	<!--body-->
	</body>
</html>