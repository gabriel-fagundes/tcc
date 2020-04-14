<?php
  require('../../conexao.php');

  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	  header('Location: entrar.php');
	  
  }

   
          

  if($errMsg == '') {
    try {
      $query = $connect->prepare('SELECT id, usuario, senha  FROM usuarios WHERE usuario = :usuario');
      $query->execute(array(
        ':usuario' => $usuario
      ));
      $data = $query->fetch(PDO::FETCH_ASSOC);
      if($data == false) {

        $errMsg = "Usuario invalido ";

    echo  "<script>alert('$errMsg');</script>";
      
        

      }
      else {
        if($senha == $data['senha']) {
          $_SESSION['usuario'] = $data['usuario'];
          $_SESSION['senha'] = $data['senha'];
          header('Location: ../../logado.html');
          exit;
        }else

          $errMsg = 'Senha invalida';
        echo  "<script>alert('$errMsg');</script>";

      }

    }

    catch(PDOException $e) {
      $errMsg = $e->getMessage();

    }
  }
   


 
echo'</div>';


?>
        

<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title></title>
</head>
<body>
<?php
    session_start();
    require("entrar.php")
?>
</body>
</html>

  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


