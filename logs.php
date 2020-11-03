<?php
include('conexao.php');

$id	= $_REQUEST["id"]; 

?>
<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>  TestDev </title>
        <link rel="stylesheet" href="styles.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
	<body >
   	    <?php 
		if($id == ""){
			?>
		<div class="container pt-3 align-center " >
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="index.php">Cadastro Basico</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
					<li class="nav-item active">
					<a class="nav-item nav-link" href="logs.php">Logs</a>
					</li>
				</ul>
				</div>
				</nav>
        <?php
		}else{
			//echo "id: ".$id;
			
			include('conexao.php');
	 
			$sqlUsuario = "SELECT * FROM PESSOAS where ID_PESSOAS = '$id'";
			//echo $sqlClientes;
			$rsUsuario= mysqli_query($conn,$sqlUsuario);
			$sqlCadUsuario = mysqli_fetch_array($rsUsuario, MYSQLI_ASSOC);
		?>
		<?php
		}
		?>
		<BR>
		
			
			<table class="table table-striped header-fixed">
					<thead >
						<tr >
							<th scope="col" class="col-2">Nome</th>
							<th scope="col" class="col-2">Email</th>
							<th scope="col" class="col-2">CPF</th>
							<th scope="col" class="col-2">Telefone</th>
                                          <th scope="col" class="col-2">ALTERADO</th>
							<th scope="col" class="col-2">EXCLUIDO</th>
						</tr>
					</thead>
	            </div>
	
					<tbody>
						<?php
						include('conexao.php');
			
						$sqlClientes = 'SELECT * FROM log';
						
						$rs=mysqli_query($conn,$sqlClientes);
						//var_dump($rs);
						while ($dados=mysqli_fetch_array($rs, MYSQLI_ASSOC)){
							$id = $dados['log_id'];
							
							echo "<td class='col-2'>".$dados['NOME_LOG']."</td>";
							echo "<td class='col-2'>".$dados['EMAIL_LOG']."</td>";
							echo "<td class='col-2'>".$dados['CPF_LOG']."</td>";
                                          echo "<td class='col-2'>".$dados['TEL_LOG']."</td>";
							echo "<td class='col-2'>".$dados['ALTERADO']."</td>";
							echo "<td class='col-2'>".$dados['DELETADO']."</td>";
							?>
							
							<?php
							}
							?>
						</tbody>
					</table>
					</div>
 	 

	  <script>
	function funcao1()
	{
	var x;
	var r=confirm("Escolha um valor!");
	if (r==true)
	  {
	  x="você pressionou OK!";
	  location.href="excluir.php?<?php echo 'id='.$id; ?>";
	  }
	else
	  {
	  x="Você pressionou Cancelar!";
	  }
	}
	</script>
        
        
    </body>
</html>
