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
	<script>
	function is_cpf (c) {

  if((c = c.replace(/[^\d]/g,"")).length != 11)
    return false

  if (c == "00000000000")
    return false;

  var r;
  var s = 0;

  for (i=1; i<=9; i++)
    s = s + parseInt(c[i-1]) * (11 - i);

  r = (s * 10) % 11;

  if ((r == 10) || (r == 11))
    r = 0;

  if (r != parseInt(c[9]))
    return false;

  s = 0;

  for (i = 1; i <= 10; i++)
    s = s + parseInt(c[i-1]) * (12 - i);

  r = (s * 10) % 11;

  if ((r == 10) || (r == 11))
    r = 0;

  if (r != parseInt(c[10]))
    return false;

  return true;
}


function fMasc(objeto,mascara) {
obj=objeto
masc=mascara
setTimeout("fMascEx()",1)
}

  function fMascEx() {
obj.value=masc(obj.value)
}

function mCPF(cpf){
cpf=cpf.replace(/\D/g,"")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
return cpf
}

cpfCheck = function (el) {
    document.getElementById('cpfResponse').innerHTML = is_cpf(el.value)? '<span style="color:green">válido</span>' : '<span style="color:red">inválido</span>';
	
    

    if(el.value=='') document.getElementById('cpfResponse').innerHTML = '';
}
	</script>
    <body >
		 <?php 
		 
		/*	Condicional para apresentação da tela de alteração quando o cliente
			já apresentar ID no banco de dados
		 */
		 
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
				
					<!--       Card com campos de cadastro      -->

			<div class="card">
				<div class="card-body">
					<form method="POST" action="salvar.php" class="form-horizontal form-material">
						<div class="form-row">
							<div class="form-group col-md-6">
							<label class="col-md-12">Nome:</label>
								<div class="col-md-12">
									<input type="text" required="required" placeholder="Digite o nome"maxlength="30" name="nome"/>
								</div>
							</div>
							
							<div class="form-group col-md-6">
							<label class="col-md-12">E-mail:</label>
								<div class="col-md-12">
									<input type="email" name="email" placeholder="name@email.com" required />
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-md-12">CPF:</label>
								<div class="col-md-12">
									<input type="text" name="cpf" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})"  placeholder="Ex.: 000.000.000-00" onkeyup="cpfCheck(this)" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );">
								</div>
						</div>

						<div class="form-group col-md-6">
							<label class="col-md-12">Telefone:</label>
							<div class="col-md-12">
								<input type="text" name="telefone" pattern="(^\((?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579])\) (?:[2-8]|9[1-9])[0-9]{3}\-[0-9]{4}$)"  placeholder="Ex.: (62) 98239-1269" maxlength="11"">
							</div>
						</div>
						<div class="input-group mb-3">
							<div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
								<input type="submit" class="btn btn-primary" value="Salvar">
							</div>
							
						</div>
					</form>
				</div>
			</div> 
		 </div>
        <?php
		}
		
		else{

			/* realizando a busca do cliente selecionado para ser editado  */

			include('conexao.php');
	 
			$sqlUsuario = "SELECT * FROM PESSOAS where ID_PESSOAS = '$id'";
			//echo $sqlClientes;
			$rsUsuario= mysqli_query($conn,$sqlUsuario);
			$sqlCadUsuario = mysqli_fetch_array($rsUsuario, MYSQLI_ASSOC);
		?>

					<!--          Card com campos de cadastro preenchidos automanticamente
							  para alteração de dados de pessoas já cadastradas no banco 
							  de dados
																		----->

		<div class="container pt-3 align-center" >
		<h1 class="title"> Cadastro Basico </h1>
			<div class="card">
				<div class="card-body">
					<form method="POST" action="atualizar.php" class="form-horizontal form-material">
						<input hidden type="text" name="id" value="<?php echo $id;?>" />
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-md-12">Nome:</label>
								<div class="col-md-12">
								<input type="text" value="<?php echo $sqlCadUsuario['NOME_PESSOAS'];?>" required="required" placeholder="Digite o nome"maxlength="30" name="nome"/>
								</div>
							</div>

							<div class="form-group col-md-6">
								<label class="col-md-12">E-mail:</label>
								<div class="col-md-12">
								<input type="email" value="<?php echo $sqlCadUsuario['EMAIL_PESSOAS'];?>" name="email" placeholder="name@email.com" required />
								</div>
							</div>

							<div class="form-group col-md-6">
								<label class="col-md-12">CPF:</label>
								<div class="col-md-12">
								<input type="text" value="<?php echo $sqlCadUsuario['CPF_PESSOAS'];?>" name="cpf" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})"  placeholder="Ex.: 000.000.000-00" onkeyup="cpfCheck(this)" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );">
							</div>
						</div>

						<div class="form-group col-md-6">
							<label class="col-md-12">Telefone:</label>
							<div class="col-md-12">
								<input type="text" value="<?php echo $sqlCadUsuario['TEL_PESSOAS'];?>" name="telefone" pattern="(^\((?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579])\) (?:[2-8]|9[1-9])[0-9]{3}\-[0-9]{4}$)"  placeholder="Ex.: (62) 98239-1269" maxlength="11"">
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
								<input type="submit" class="btn btn-primary" value="Atualizar">
								<a href="index.php" type="submit" class="btn btn-primary" >Cancelar</a>
							</div>
						</div>
					</form>
				</div>
			</div> 
		 </div>
		<?php
		}
		?>
		<BR>
		
					<!--   Tabela com scroll de pessoas devidadmente cadastradas no banco de dados  -->
			
			<table class="table table-striped header-fixed">
					<thead >
						<tr >
							<th scope="col" class="col-5">Nome</th>
							<th scope="col" class="col-5">Email</th>
							<th scope="col" class="col-5">CPF</th>
							<th scope="col" class="col-5">Telefone</th>
							<th scope="col" class="col-5 text-center">EDITAR/EXCLUIR</th>
						</tr>
					</thead>
	</div>
	
					<tbody>
						<?php
						include('conexao.php');
			
						$sqlClientes = 'SELECT * FROM PESSOAS';
						
						$rs=mysqli_query($conn,$sqlClientes);
						//var_dump($rs);
						while ($dados=mysqli_fetch_array($rs, MYSQLI_ASSOC)){
							$id = $dados['ID_PESSOAS'];
							
							echo "<tr>";
							echo "<td class='col-3'>".$dados['NOME_PESSOAS']."</td>";
							echo "<td class='col-3'>".$dados['EMAIL_PESSOAS']."</td>";
							echo "<td class='col-3'>".$dados['CPF_PESSOAS']."</td>";
							echo "<td class='col-3'>".$dados['TEL_PESSOAS']."</td>";
							echo "<td class='col-3 text-center'><a href='index.php?id=$id'><i class='fa fa-edit'>Editar</i></a> | "; ?><a href='#' onclick="javascript: if (confirm('Você realmente deseja excluir esta mensagem?'))location.href='excluir.php?id=<?php echo "$id";?>'"><i class='fa fa-times'>Excluir</i></a></td>
								</tr>
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
