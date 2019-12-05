<?php

    require "database.php";

    //Get the posted data
    $postdata = file_get_contents("php://input");

    if(isset($postdata) && !empty($postdata)){
      //Extract the data
      $request = json_decode($postdata);

      //Sanitize
      $id = mysqli_real_escape_string($con, (int)$request->id);
      $nome = mysqli_real_escape_string($con, $request->nome);
      $descricao = mysqli_real_escape_string($con, $request->descricao);
      $preco = mysqli_real_escape_string($con, (float)$request->preco);
      $categoria_id = mysqli_real_escape_string($con, (int)$request->categoria_id);
      $plataforma_id = mysqli_real_escape_string($con, (int)$request->plataforma_id);

      //Update
      $sql = "UPDATE games SET nome = '$nome', descricao = '$descricao', preco = '$preco', categoria_id = '$categoria_id', plataforma_id = '$plataforma_id' WHERE id = '{$id}'";

      if(mysqli_query($con, $sql)){
        http_response_code(204);
      }else{
        return http_response_code(422);
      }

?>
