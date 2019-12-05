<?php

  require "database.php";

  //Get the posted data
  $postdata = file_get_contents("php://input");

  if(isset($postdata) && !empty($postdata)){
    //Extract data
    $request = json_decode($postdata);

    //validate
    if(trim($request->preco) === "" || (float)$request->amount < 0){
      return http_response_code(400);
    }

    $nome = mysqli_real_escape_string($con, $request->nome);
    $descricao = mysqli_real_escape_string($con, $request->descricao);
    $preco = mysqli_real_escape_string($con, (float)$request->preco);
    $categoria_id = mysqli_real_escape_string($con, (int)$request->categoria_id);
    $plataforma_id = mysqli_real_escape_string($con, (int)$request->plataforma_id);

    //create
    $sql = "INSERT INTO games (nome, descricao, preco, categoria_id, plataforma_id) VALUES ('{$nome}','{$descricao}', '{$preco}','{$categoria_id}', '{$plataforma_id}')";

    if(mysqli_query($con, $sql)){
      http_response_code(201);
      $games = [
        'nome' => $nome;
        'descricao' => $descricao;
        'preco' => $preco;
        'categoria_id' = $categoria_id;
        'plataforma_id' = $plataforma_id;
      ];
      echo json_encode($games);
    }
    else{
      http_response_code(422);
    }
  }

?>
