<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
    include "conexao.php";
    // 1º Passo Comando SQL
    $sql = "SELECT * FROM tb_inventarios";
    // 2º Passo Preparar aconexão
    $consultar = $pdo->prepare($sql);
    // 3º Passo Tentar executar e mostrar na página
    try{
        $consultar->execute();
        $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultados as $item){
            $codigo = $item['codigo'];
            $descricao = $item['descricao'];
            $setor = $item['setor'];
            $categoria = $item['categoria'];
            echo "
                <div class='cartoes'>
                    <h1> Nº $codigo </h1> <br>
                    <p>$descricao</p>;
                    <p>$setor</p>;
                    <p>$categoria</p>
                <a href='pagina_editar.php?cod=$codigo'>
                    <button>📝Editar</button> 
                </a>

                <a href='confirmar_deletar.php?cod=$codigo'>
                    <button>🗑️Deletar</button>
                </a>
                </div>";
        }

    }catch(PDOException $erro){
        echo "Falha ao consutar!".$erro->getMessage();
    }





    ?>
</body>
</html>