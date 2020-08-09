<?php require_once 'usuarios.php';
      $u = new Usuario;    

?>

   <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" rel="stylesheet">
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="CSS/estilologin.css">
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
       
    </head>
    <body style="background-color: #D8D8D8;
			background-repeat: no-repeat;
			background-position: 310px 40px;
			background-size: 140px 50px;">	
			<div class="container" style="background-color:">
  
	<nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark">
    <img src="public/img/LPP.png" class="img-fluid" class="navbar-brand" width=200px>	
    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- links -->
		<center>
			
		<div id="menu" class="collapse navbar-collapse">
			<ul class="navbar-nav ml-md-auto"> 
				

				<li class="nav-item active">
				<a class="nav-link" href="index.php">Bem vindo</a>
				</svg>
				</li>
		</ul>
	</div>
</center>
</nav>

	  <br/></br><br/></br>
	


<div class="wrapper fadeInDown">
  <div id="formContent">


<br><br><br><br>
    <form method="POST" action="">
      <input type="text"  class="fadeIn first" name="nome" placeholder="Nome">
      <input type="text"  class="fadeIn second" name="cpf" placeholder="CPF" >
      <input type="email"  class="fadeIn third" name="email" placeholder="E-mail"> 
      <input type="password" class="fadeIn fourth" name="senha" placeholder="Senha" >
      <input type="password" class="fadeIn 	fifth" name="confSenha" placeholder="Confirmar Senha" >
      <input type="submit" class="fadeIn sixth" value="Cadastrar">
    </form>

  
    
  </div>
</div>
	
	<?php 

if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$cpf =  addslashes($_POST['cpf']);
	$email =  addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha =  addslashes($_POST['confSenha']);

	if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($senha) && !empty($confirmarSenha) )
	{
		$u->conectar("bd_loja","localhost","root","");
		if($u->msgErro == "")
		{
			if ($senha == $confirmarSenha)
			 {
				 if($u->cadastrar($nome,$cpf,$email,$senha))
				 {
				 	?>
				 	<div id="msg-sucesso">
                    Cadastrado com sucesso!
                    </div>
                    <?php
				 }
				  else
				 {
				 	?>
                    <div class="msg-erro">
                Email ja cadastrado!
                    </div>
                   <?php
                 }
			}
			else
            {
            		?>
                    <div class="msg-erro">
                As senhas não correspondem!
                    </div>
                   <?php               
           }
          
		}else
		{
           ?>
           <div class="msg-erro">
		    <?php echo "Erro:".$u->msgErro; ?>
           </div>
		   <?php
		}

	}else
	{
		?>
                    <div class="msg-erro">
               Preencha todos os campos!
                    </div>
                   <?php 
		
	}
}


?>
    </body>
	</html>