<?php

require("conexao.php");

$id = $_REQUEST["id"];

$sqlExcluir = "delete from PESSOAS where ID_PESSOAS = $id";


mysqli_query($conn, $sqlExcluir);
mysqli_close($conn);

echo '<script language="javascript" type="text/javascript">alert("Usuário excluido com sucesso!");</script>';

header("Location: index.php");
 ?>

