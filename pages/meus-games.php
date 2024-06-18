<section class="lista">
  <?php
  $sql = "SELECT g.id, g.nome, g.preco, g.genero, g.plataforma, g.imagem FROM games as g JOIN aluguel_game as ag ON g.id = ag.game_id WHERE ag.usuario_id = {$_SESSION["id_usuario"]}";
  $resposta = $conn->query($sql);

  $qtd = $resposta->num_rows;

  if ($qtd > 0) {
    while ($linha = $resposta->fetch_object()) {
      echo "<div>";
      echo <<<HTML
            <div class='card' style='--clr:#0fff;'> 
              <img width="240px" src='$linha->imagem' alt="imagem game">
              <h3>$linha->nome</h3>
              <p>Gênero: $linha->genero</p>
              <p>Plataforma: $linha->plataforma</p>
              <p>Preco: $linha->preco</p>
            </div>
            HTML;
      echo "<button onclick=\"location.href='?page=games-action&acao=devolver&id=" . $linha->id . "'\">Devolver</button>";
      echo "</div>";
    }
  } else {
    echo "<p>Nenhum dado encontrado!</p>";
  }
  ?>
</section>