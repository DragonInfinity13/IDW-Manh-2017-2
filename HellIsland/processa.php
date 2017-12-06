<?php

$nome = $_POST['Nome'];
$idade = $_REQUEST['Idade'];
$email = $_REQUEST['Email'];
$tel = $_REQUEST['Telefone'];
$cmd = $_POST['cmd'];

$urlConnexao = 'mysql:host=localhost;dbname=id3900063_phpsite;charset=utf8';
$usuario = 'id3900063_dragon';
$senha = 'Dragon123';
try{
    $db = new PDO( $urlConnexao, $usuario, $senha );
} catch (PDOException $e){
    echo $e -> getMessage();
}


if ($cmd == 'Enviar') {
    $sql = "INSERT INTO contatos (nome, idade, email, telefone) VALUES (:nome, :idade, :email, :tel)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindValue(':idade', $idade, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->rowCount();
    
    print "Registro Inserido <BR/>";
    print "Por Favor retorne a pagina anterior !! <BR/>";
}
?>