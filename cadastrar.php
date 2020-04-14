<?php
	$situacao = $_POST['situacao'];
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "funildevendas";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	$result_imoveis = "INSERT INTO imoveis (situacao) VALUES ('$situacao')";
	$resultado_imoveis = mysqli_query($conn, $result_imoveis);
?>