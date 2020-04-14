<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Celke - Formulário</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Inspeção</h1>
			</div>
			
			<form  method="POST" action="cadastrar.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Situação da casa</label>
					<label class="radio-inline"> 
						<input type="radio" name="situacao" value="bom"><span class="label label-success">Bom</span> 
					</label> 
						
					<label class="radio-inline"> 
						<input type="radio" name="situacao" value="regular"><span class="label label-warning">Regular</span> 
					</label> 
					
					<label class="radio-inline"> 
						<input type="radio" name="situacao" value="irregular"><span class="label label-danger">Irregular</span> 
					</label> 
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-danger">Cadastrar</button>
					</div>
				</div>
			</form>
		</div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>