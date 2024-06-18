<section class="lista">
  <?php
  $sql = "SELECT * FROM games WHERE qtd_disponivel > 0";
  $resposta = $conn->query($sql);

  $qtd = $resposta->num_rows;

  if ($qtd > 0) {
    while ($linha = $resposta->fetch_object()) {
      echo "<div>";
      echo <<<HTML
            <div class='card' style='--clr:#ff0;'> 
              <img width="240px" src='$linha->imagem' alt="imagem game" />
              <h3>$linha->nome</h3>
              <p>Gênero: $linha->genero</p>
              <p>Plataforma: $linha->plataforma</p>
              <p>Preco: $linha->preco</p>
              <p>Qtd. Disponível: $linha->qtd_disponivel</p>
            </div>
            HTML;
      echo "<button class='botaoalugar' onclick=\"location.href='?page=games-action&acao=alugar&id=" . $linha->id . "'\"><strong>ALUGAR</strong></button>";
      echo "</div>";
    }
  } else {
    echo "<p>Nenhum dado encontrado!</p>";
  }
  ?>
</section>