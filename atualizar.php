<?php

include('conexao.php');

$id			= $_POST['id'];
$nome			= $_POST["nome"]; 
$email		= $_POST["email"];
$cpf			= $_POST["cpf"]; 
$telefone		= $_POST["telefone"]; 

$sql= "UPDATE PESSOAS set 
NOME_PESSOAS	= '$nome'
,EMAIL_PESSOAS	= '$email'
,CPF_PESSOAS	= '$cpf'
,TEL_PESSOAS	= '$telefone'
where 
ID_PESSOAS 		= '$id' ";

mysqli_query($conn,$sql);

/*
// INICIA O LOG---------------------------------------
$op		= "Atualizou o usuário: $nomeAntigo para $nome";
$menu	= "Usuarios";
$sqlLog 	= mysqli_query($conn,"INSERT INTO log (id, login, nome, data_hora, descricao, ip, menu) VALUES (null, '".$_SESSION['usuario']."', '".$_SESSION['nome']."', now(), '$op', '$_SERVER[REMOTE_ADDR]', '$menu')");
// FIM DO LOG-----------------------------------------
*/
mysqli_close($conn);

?>

<?php 
echo '<script>  alert("Cadastro atualizado com sucesso!");</script>';
header("Location: index.php");
?>