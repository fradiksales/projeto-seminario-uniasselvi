<section class="lista">
  <?php
    $sql = "SELECT * FROM games";
    $resposta = $conn->query($sql);

    $qtd = $resposta->num_rows;

    if($qtd > 0){
      while($linha = $resposta->fetch_object()){
        echo <<<HTML
          <div class="card" style="--clr:#ff0;"> 
            <img width="240px" src='$linha->imagem' alt="imagem game">
            <h3>$linha->nome</h3>
            <p>Gênero: $linha->genero</p>
            <p>Plataforma: $linha->plataforma</p>
            <p>Preco: $linha->preco</p>
            <button class="botaoalugar"><strong>ALUGAR</strong></button>
          </div>
          HTML;
      }
    } else {
      echo "<p>Nenhum dado encontrado!</p>";
    }
  ?>
</section>