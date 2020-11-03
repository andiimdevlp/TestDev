<?php

include('conexao.php');

$id			= $_POST['id'];
$nome			= $_POST["nome"]; 
$email		= $_POST["email"];
$cpf			= $_POST["cpf"]; 
$telefone		= $_POST["telefone"];  


/*break;
$procura = mysqli_query($conn,$query);
if(mysqli_num_rows($procura)==1){
	echo '<script> alert("CPF ja cadastrado!");history.go(-1); </script>';
	mysqli_close($conn);
	exit;
}
*/



$sql = "INSERT INTO PESSOAS ( ID_PESSOAS
                              ,NOME_PESSOAS
                              ,EMAIL_PESSOAS
                              ,CPF_PESSOAS
                              ,TEL_PESSOAS) 
                              ,INSERIDO)
                  VALUES (    
                              null
                              ,'$nome'
                              ,'$email'
                              ,'$cpf'
                              ,'$telefone'
                              ,now()
                              )";

//echo $sql;

mysqli_query($conn,$sql);

mysqli_close($conn);
?>

<?php 
echo '<script>  alert("Cadastro atualizado com sucesso!");</script>';
header("Location: index.php");
?> 

