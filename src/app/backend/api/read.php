<?php

  require "database.php";

  $games = [];
  $sql = "SELECT id, nome, descricao, preco, categoria_id, plataforma_id FROM games";

  if($result = mysqli_query($con, $sql)){
    $i = 0;
    while($row = mysqli_fetch_assoc($result)){
      $games[$i]["id"] = $row["id"];
      $games[$i]["nome"] = $row["nome"];
      $games[$i]["preco"] = $row["descricao"];
      $games[$i]["categoria_id"] = $row["categoria_id"];
      $games[$i]["plataforma_id"] = $row["plataforma_id"];
    }
    echo json_encode($games);
  }else{
    http_response_code(404);
  }

?>
