<?php
  include('conexao.php')
?>

<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Abrindo portas</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--   css do site -->

<link rel="stylesheet" type="text/css" href="tcc.css">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/one-page-wonder.min.css" rel="stylesheet">

  <style rel="stylesheet">/>
  body { background-image: url("/images/logo-css3.png"); }
</style>

<style rel="stylesheet">

body {  background-color:#f2f5f8
; 

  } 

 </style>

</head>

<body>
    



  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Abrindo portas</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="logado.html">Revisar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="informacao.html">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro/perfil.php">Perfil</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="sobre.html">Sobre</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="index.php"><font color="red"> Sair</font></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<br><br><br><br>



<center><h2> <font color="black"> Informática </h2></center></font>


<br><br><br>

  <div class="row">
  <div class="col-2">
  <div class="list-group" id="list-tab" role="tablist" style="margin-left: 5%">


<?php


 $query = $connect-> prepare ('SELECT id_grupo_info, descricao_grupo_info FROM grupo_info');
 $query->execute();
 $grupos = $query->fetchAll();
 foreach ($grupos as $grupo) {
    
    echo  '<a class="list-group-item list-group-item-action "
    id="list-home-list" data-toggle="list" href="?id_grupo_info='.$grupo['id_grupo_info'].'">'.$grupo['descricao_grupo_info'].'</a>';

 }
    ?>

    </div>

  </div>

  <div class="col-6">
    <div class="tab-content" id="nav-tabContent" style="margin-left: 5%">

    
    <?php
  if ( isset($_GET['id_grupo_info']) ){
    $id = $_GET['id_grupo_info'];    
  } else {
    $id = 1;
  }
  $query = $connect->prepare ('SELECT descricao_grupo_info FROM grupo_info WHERE id_grupo_info='.$id);
  $query->execute();
  $grupo = $query->fetch();

  $descricao_grupo = $grupo['descricao_grupo_info'];
  echo'
  <footer class="py- bg-info">
  <div class="container">
<nav class="">
<div class="container">
  <br>';
  echo '<h4><font color="white"> Resultados</font></h4>';
  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);

  if (isset($_POST['enviar'])) {
    echo '<br>';
    $c = 1;
    foreach($_POST as $key => $item) {
      if (substr( $key, 0, 2 ) === "id") {
        $correta = $item;
      }
      else if ($key  != "enviar") {
        list($texto, $valor) = explode('|', $item);

        if ($valor == '1') {


          echo '<font size="4"> Questão  ' .$c. ' - Resposta </font>' .$texto. ' <font color="gren">  - CORRETA </font>'; 
        } else {
          echo '<font size="4"> Questão  '  .$c.  ' - Resposta </font>'.$texto.'<font color="#660000"> - ERRADA</font>';
        }
        $c++;
        echo "<br>";
      }
    }    
  }
echo'</div> </nav></div><br></footer> ';
echo '<br><br>';

  echo '<h4 id="">'.$descricao_grupo.'</h4>';
  try {
    $query2 = $connect->prepare ('SELECT texto_info, id_questao_info, texto_adicional_info, resp_1, resp_2, resp_3,resp_4, resp_5 FROM questao_info WHERE id_grupo_info='.$id);
    $query2->execute();
    $data = $query2->fetchAll();

    echo "<br><br>";

    // print_r($data);  

    $cont = 1;

    
  echo ' <div class="container" style="margin-left:; ">';

  
  echo '<form action="" method="POST">';
  
    foreach ($data as $value) {
      echo "<INPUT TYPE='hidden' NAME='id_info".$value['id_questao_info']."' VALUE='".$value['id_questao_info']."' <br><br>'";
      echo $cont++ .' - '. $value ['texto_info']. '<br><br> ';
      echo $value ['texto_adicional_info']. '<br><br>';

      $resps = [ 
          [$value['resp_1'], 1],
          [$value['resp_2'], 0],
          [$value['resp_3'], 0],
          [$value['resp_4'], 0],
          [$value['resp_5'], 0]
      ];
      $i = 1;
      $item = 'a';
      shuffle($resps);
      foreach ($resps as $resp) {
        echo $item.") <INPUT TYPE='radio' NAME='".$value['id_questao_info']."' VALUE='".$resp[0]."|".$resp[1]."'> ".$resp[0]."<br>"; 
        $i++;
        $item++;        
      }
    }  
      echo'<button type="submit" name ="enviar" class="btn btn-success mt-4">Enviar</button>';
 echo'<button type="clear" class="btn btn-danger mt-4 ml-4">Limpar</button>';
 
  echo '</form><footer>';



echo '<br>';
    

}catch(PDOException $e) {
  $errMsg = $e->getMessage();
}

?>
</div>



      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
    </div>
  </div>
</div>
<br><br><br><br>

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Abrindo portas &copy; Criado em 2019</p>
    </div>
    
    <!-- /.container -->
  </footer>