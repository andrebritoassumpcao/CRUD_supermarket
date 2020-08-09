<?php



$mysqli = new mysqli('localhost','root','','bd_loja') or die(mysqli_error($mysqli));

$id =0;
$update = false;
$nome = '';
$quantidade = '';
$preco = '';
$fabricacao = '';
$validade = '';


if (isset($_POST['save'])) {
	$nome = $_POST['nome'];
	$quantidade = $_POST['quantidade'];
	$preco = $_POST['preco'];
	$fabricacao = $_POST['fabricacao'];
	$validade = $_POST['validade'];

	$mysqli->query("INSERT INTO produtos(nome,quantidade,preco,fabricacao,validade) VALUES('$nome','$quantidade','$preco','$fabricacao','validade')")or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: crud.php");															
}
 
 if (isset($_GET['delete'])) {
 	$id = $_GET['delete'];

 	$mysqli->query("DELETE FROM produtos WHERE id=$id") or die($mysqli->error());	
 	
    $_SESSION['message'] = "Record has been delete!";
	$_SESSION['msg_type'] = "danger";

	header("location: crud.php");

 }

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM produtos WHERE id=$id") or die($mysqli->error());
    if($result->num_rows){
       $row = $result->fetch_array();
        $nome = $row['nome'];
	    $quantidade = $row['quantidade'];
		$preco = $row['preco'];
		$fabricacao = $row['fabricacao'];
		$validade = $_POST['validade'];
    }
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$quantidade = $_POST['quantidade'];
	$preco = $_POST['preco'];
	$fabricacao = $_POST['fabricacao'];
	$validade = $_POST['validade'];

 $mysqli->query("UPDATE produtos SET nome='$nome',quantidade='$quantidade',preco='$preco',fabricacao='$fabricacao',validade='$validade' WHERE id=$id") or die($mysqli->error());

 $_SESSION['message'] ="Record has been updated!";
 $_SESSION['msg_type'] = "warning";

  header('location: crud.php');
} 
	



 ?>