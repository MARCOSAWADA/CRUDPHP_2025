<?php

require './Entity/Cliente.php';

$id_recebido = $_GET['id_cliente'];

// echo "ID RECEBIDO: ".$id_recebido;

if(!isset($id_recebido) or !is_numeric($id_recebido)){
    header('location: index.php');
    exit;
}

// $cliente = new Cliente('','','');
$cliente = Cliente::buscar_by_id($id_recebido);
// print_r($cliente);

$nome = $cliente->nome;
$cpf = $cliente->cpf;
$email = $cliente->email;
// print_r($nome);
// print_r($cpf);
// print_r($email);

// _____________________________________________________

if(isset($_POST['editar'])){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    // echo 'NOVO NOME' . $nome;
    // echo 'NOVO NOME' . $email;

    $cli_editado = new Cliente();
    $cli_editado->id = $id_recebido;
    $cli_editado->nome = $nome;
    $cli_editado->cpf = $cpf;
    $cli_editado->email = $email;

    // print_r($cli_editado);

    $result = $cli_editado->atualizar();
    if($result){
        echo '<script> alert("Cliente editado com sucesso!!") </script>';
    }else{
        echo 'Error';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>EDITAR</h1>

    <form method="POST">
        <input name="nome" id="nome" type="text" value="<?php echo $nome;?>">
        <input name="cpf" id="cpf" type="text" value="<?php echo $cpf;?>">
        <input name="email" id="email" type="email" value="<?php echo $email;?>">
        <input name="editar" type="Submit" value="Editar">
    </form>

    <form method="POST">
        <input name="nome" id="nome" type="text" value="<?= $nome;?>">
        <input name="cpf" id="cpf" type="text" value="<?= $cpf;?>">
        <input name="email" id="email" type="email" value="<?= $email;?>">
        <input name="editar" type="Submit" value="Editar">
    </form>

</body>
</html>