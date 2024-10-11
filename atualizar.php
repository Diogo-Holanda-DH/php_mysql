<?php
include "conexao.php";
$codigo = $_POST['codigo'];
$desc = $_POST['descricao_digitada'];
$setor = $_POST['setor_escolhido'];
$cat = $_POST['categoria_digitada'];

//1º Passo - Preparar a conexão
$sql = "UPDATE tb_inventarios SET
        descricao='$desc' , setor='$setor' ,
        categoria='$cat' WHERE codigo='$codigo'";

//2º Passo - 
$atualizar = $pdo->prepare($sql);

//3º Passo - Preparar a conexão
try{
    $atualizar->execute();
    echo "Atualizado com sucesso!";
    echo "<br> <a href='pagina_gerenciar.php'> Voltar</a>";

}catch(PDOException $erro){
    echo "Falha ao atualizar: ".$erro->getMessage();
}


?>