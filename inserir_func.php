<?php 

	require_once("con_db.php");
    require_once("newFuncProcess.php");
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
		<script type="text/javascript" src="imagePreview.js"></script>
		<link href="plataform.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
		
	</head>

	<body>
		<div class="container-fluid">
			<?php include("platform_header.php");?>
			<div class="row mt-2">	
				<div class="col-md-12" id="titulo2">
					<p>Gestão de funcionários</p>
				</div>
			</div>
			<div class="row row mb-3 justify-content-md-center align-items-center">
				<div class="col-md-5 text-center">
					<?php echo($feedback);?>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-12 bg-light" id="navtext2">
					<nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
					  <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="platform_main.php" id="bread">Home</a></li>
						<li class="breadcrumb-item"><a href="funcionarios.php" id="bread">Gestão de funcionários</a></li>
						<li class="breadcrumb-item active" aria-current="page">Registar novo funcionário</li>
					  </ol>
					</nav>
				</div>
			</div>
				<div class="col-md-12" id="corpo">
					
					<div class="row">
						<div id="tituloTabela"><strong>Registar novo funcionário</strong></div>
					</div>
										
					
					
					<!--form-->
					<div class="row mt-2 mb-2 pt-3 bg-light">
						<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="row mb-3 justify-content-start align-items-center">
							<div class="col-md-2">
							     <div class="picture-container">
        							<div class="picture">
           								 <img src="/img/userAdd.png" class="picture-src" id="wizardPicturePreview" title="">
											<!--<input type="hidden" name="MAX_FILE_SIZE" value="30000">-->
          								  <input type="file" name="userfile" id="wizard-picture" class="">
										</div>
										<!-- <p class="">Seleccione uma fotografia de perfil.</p>-->

									</div><!--pic container-->
							</div><!--column-->
						</div>
								
						<div class="row mb-3 justify-content-md-between">
							<div class="col-md-3" >
							  <label for="nome">Nome*</label>
							  
								<input type="text" class="form-control form-control-sm" id="nome" placeholder="Nome" name="nome" maxlength="255" value="<?php echo $nome; ?>">
							  
							</div>
							
							<div class="col-md-3" >
							  <label for="apelido">Apelido*</label>
							  
								<input type="text" class="form-control form-control-sm" id="apelido" placeholder="Apelido" name="apelido" maxlength="255" value="<?php echo $apelido; ?>">
							
							</div>
							
							<div class="col-md-3" >
							  <label for="dataNasc">Data de nascimento</label>
							  
								<input type="date" class="form-control form-control-sm" id="dataNasc" placeholder="Data de Nascimento" name="dataNasc" maxlength="255" value="<?php echo $dataNasc; ?>">
							
							</div>
							
							<div class="col-md-3" >
							  <label for="cargo">Cargo*</label>
							  
								<input type="text" class="form-control form-control-sm" id="cargo" placeholder="Cargo" name="cargo" maxlength="255" value="<?php echo $cargo; ?>">
							
								</div>
							
							</div>
						
							<div class="row mb-3 justify-content-md-between">
								
								<div class="col-md-6" >
									<label for="morada">Morada*</label>
							  
								<input type="text" class="form-control form-control-sm" id="morada" placeholder="Morada" name="morada" maxlength="255" value="<?php echo $morada; ?>">
								</div>
								
								<div class="col-md-2" >
									<label for="cp">Código Postal*</label>
							  
								<input type="text" class="form-control form-control-sm" id="cp" placeholder="Código Postal" name="cp" maxlength="255" value="<?php echo $cp; ?>">
								</div>
								
								<div class="col-md-2" >
									<label for="cp">Cidade*</label>
							  
								<input type="text" class="form-control form-control-sm" id="cidade" placeholder="Cidade" name="cidade" maxlength="255" value="<?php echo $cidade; ?>">
								</div>
								
								<div class="col-md-2" >
									<label for="cp">País*</label>
							  
								<input type="text" class="form-control form-control-sm" id="pais" placeholder="País" name="pais" maxlength="255" value="<?php echo $pais; ?>">
								</div>
								
							</div>
						
							<div class="row mb-3 justify-content-md-between">
								
								<div class="col-md-2" >
									<label for="contacto1">Contacto 1*</label>
							  
								<input type="text" class="form-control form-control-sm" id="contacto1" placeholder="Contacto 1" name="contacto1" maxlength="255" value="<?php echo $contacto1; ?>">
								</div>
								
								<div class="col-md-2" >
									<label for="contacto2">Contacto 2</label>
							  
								<input type="text" class="form-control form-control-sm" id="contacto2" placeholder="Contacto 2" name="contacto2" maxlength="255" value="<?php echo $contacto2; ?>">
								</div>
								
								<div class="col-md-2" >
									<label for="email">Email</label>
							  
								<input type="text" class="form-control form-control-sm" id="email" placeholder="Email" name="email" maxlength="255" value="<?php echo $email; ?>">
								</div>
								
								<div class="col-md-2" >
									<label for="utilizador">Utilizador*</label>
							  
								<input type="text" class="form-control form-control-sm" id="utilizador" placeholder="Nome de utilizador" name="username" maxlength="255" value="<?php echo $utilizador; ?>">
								</div>
								
								<div class="col-md-2" >
									<label for="password">Password*</label>
							  
								<input type="password" class="form-control form-control-sm" id="password" placeholder="Password" name="password" maxlength="255">
								</div>
								
								<div class="col-md-2" >
									<label for="nivelAcesso">Nível de acesso*</label>
							  		<select class="form-control form-control-sm" id="nivelAcesso" name="nivelAcesso" value="<?php echo $nivelAcesso; ?>">
									  <option>1</option>
									  <option>2</option>
									  <option>3</option>
									  <option>4</option>
									  <option>5</option>
									</select>
							
								</div>
			
							</div>
							
							<div class="row mb-3 justify-content-md-between">
								<div class="col-md-5" >
									 <label for="notas">Notas</label>
									  <textarea class="form-control form-control-sm" id="notas" name="notas" maxlength="255" placeholder="Notas importantes" rows="5" value="<?php echo $notas; ?>"></textarea>
									</div>
								</div>
							<div class="row mb-3 mt-5 justify-content-center">
								<div class="col-md-3">
									<button class="btn btn-primary btn-md" type="submit" id="novoRegisto">Inserir registo</button>
								</div>
							</div>
						</form>
					</div><!--end form-->
					
				</div>
			<?php include("platform_foot.php");?>
		</div>
				
		<!--container-->
		<!--</div>-->
	<!--body-->
	</body>
</html>