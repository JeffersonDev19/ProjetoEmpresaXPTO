<?php
    $obj_mysqli = new mysqli("127.0.0.1", "user", "user", "dinamicatreinamentos");
 
    if ($obj_mysqli->connect_errno)
    {
        echo "Ocorreu um erro na conexão com o banco de dados.";
        exit;
    }
     
    mysqli_set_charset($obj_mysqli, 'utf8');
    
    $id = $_POST["id"];
    $valor = $_POST["valor"];
    $tipo = $_POST["tipo"];

    $stmt = $obj_mysqli->prepare("INSERT INTO compra (idProduto,valor,tipo) VALUES (?,?,?)");
		$stmt->bind_param('sss', $id, $valor, $tipo);
		
		if(!$stmt->execute())
		{
			$erro = $stmt->error;
		}
		else
		{
			$sucesso = "Dados cadastrados com sucesso!";
        }
        
    if(isset($erro))
        echo '<div style="color:#F00">'.$erro.'</div><br/><br/>';
    else if(isset($sucesso))
        echo '<div style="color:#00f">'.$sucesso.'</div><br/><br/>';
?>