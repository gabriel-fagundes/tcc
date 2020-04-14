<?php
session_start();
include_once("../conexao.php");
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Abrindo portas</title>	
		  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Abrindo portas</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">
  
  <style rel="stylesheet">

body {  background-image: url(wall.png); 

  } 

 </style>
</head>
	<body>
		<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">Abrindo portas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../logado.html">Revisar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../informacao.html">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="perfil.php">Perfil</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="../sobre.html">Sobre</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="../index.php"><font color="red"> Sair</font></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<br><br><br><br><br><br>

		
		
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
    }
    
    $query = $connect->prepare('SELECT id, usuario, senha, nome, email, sobrenome  FROM usuarios WHERE usuario = :usuario');
    $query->execute(array(
      ':usuario' => $_SESSION['usuario']
    ));
    $data = $query->fetch(PDO::FETCH_ASSOC);
    if($data == false) {
      $errMsg = "User $usuario not found.";
    }
    else {
 
		?>
<center> <div class="card" style="width: 18rem;">

  <div class="card-body">
    <h2 class="card-title"><font color="#009999"> Alterar</font></h2>
   
  </div> 
    <form method="POST" action="proc_edit_usuario.php">

    <ul class="list-group list-group-flush">
    
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    <li class="list-group-item"><strong> Nome: </strong> <br>
    <input type="text" name="nome" placeholder="Nome" value="<?php echo $data['nome']; ?>"></li>
   

    <li class="list-group-item"><strong>Sobrenome:</strong> <br>
    <input type="text" name="sobrenome" placeholder="Sobrenome" value="<?php echo $data['sobrenome']; ?>"></li>

    <li class="list-group-item"><strong>Usuário:</strong><br>
    <input type="text" name="usuario" placeholder="Usuario" value="<?php echo $data['usuario']; ?>"></li>

    <li class="list-group-item"><strong>E-mail:</strong><br>
    <input type="email" name="email" placeholder="E-mail" value="<?php echo $data['email']; ?>"></li>
			
    <li class="list-group-item"><strong>Senha:</strong><br>
    <input type="text" name="senha" placeholder="Senha" value="<?php echo $data['senha']; ?>"></li>
      
  </ul>


 <div class="card-body">
 
    <button class="btn btn-info active"  name='alterar' role="button" value="Alterar" aria-pressed="true">Alterar</button>
  </div>
  
</div>

</center>

    <br>
    </div>
<br><br><br>
    <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Abrindo portas &copy; Criado em 2019</p>
    </div>
    

		</form>
    <?php
      }
    ?>
		
	</body>
</html>