
<html>
<head>
	    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css" rel="stylesheet">
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="CSS/estilo-pesquisa.css">
</head>
<body>


<?php require_once 'process.php'  ?>
<?php require_once 'crud.php'  ?>
<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "bd_loja";
    //Criar a conexao
 $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);  
    $pesquisar = $_POST['pesquisar'];
    $result_pesquisar = "SELECT * FROM produtos WHERE nome LIKE '%$pesquisar%' LIMIT 5";
    $resultado_pesquisar = mysqli_query($conn, $result_pesquisar);
    
    while($rows_pesquisar = mysqli_fetch_array($resultado_pesquisar)){
    	?>
      <div id="msg">
       <?php echo "Nome do produto: ".$rows_pesquisar['nome']."<br>";?>
       <?php echo "Valor do produto: ".$rows_pesquisar['preco']."<br>";?>
       <?php echo "Fabricação do produto: ".$rows_pesquisar['fabricacao']."<br>";?>
       <?php echo "Validade do produto: ".$rows_pesquisar['validade']."<br>";?>
      

     
      </div>
       <?php
    }
?>
</body>
</html>
