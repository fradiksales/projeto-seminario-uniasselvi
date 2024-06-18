<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Forja do dragão</title>
</head>

<body>

    <header>
        <nav>
            <div class="logo">
                <img src="./assets/logodragao.png">
            </div>

            <div class="nomesite">
                <h3>Forja do Dragão Locadora de Games</h3>
            </div>

            <ul class="main-menu">
                <li>
                    <a class="botao-menu" href="?">Home</a>
                </li>

                <li>
                    <a class="botao-menu" href="?page=novo">Cadastro</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="itens">
            <div class="container">
                    <?php
                    /** Arquivo de configuração do banco de dados */
                    include("./php/config.php");
                    switch (@$_REQUEST["page"]) {
                    /**
                     * Todas as páginas devem ser criadas dentro da pasta pages
                     * e deve ser feito o include aqui criando um novo case
                     */
                    case "novo":
                        include("./pages/cadastro.php");
                        break;
                    case "games-action":
                        include("./php/actions/games-action.php");
                        break;
                    default:
                        include("./pages/listar.php");
                        break;
                        }
                        ?>
            </div>
        </div>
    </main>

    <footer>

    </footer>
    <script>
        let cards = document.querySelectorAll('.card');
        cards.forEach(card => {
        card.onmousemove = function(e){
        let x = e.pageX - card.offsetLeft;
        let y = e.pageY - card.offsetTop;

        card.style.setProperty('--x', x +'px');
        card.style.setProperty('--y', y +'px');
        }})
    </script>
</body>

</html>