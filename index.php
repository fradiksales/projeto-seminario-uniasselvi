<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Forja do dragão</title>
</head>

<body>
    <?php
    /** Arquivo de configuração do banco de dados */
    session_start();
    /** Arquivo de configuração do banco de dados */
    include("./php/config.php");

    if (empty($_SESSION)) {
        header("Location: login.php");
    }
    ?>
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
                <?php if ($_SESSION["tipo_usuario"] == 'ADMIN') : ?>
                    <li>
                        <a class="botao-menu" href="?page=novo">Cadastro Game</a>
                    </li>
                    <li>
                        <a class="botao-menu" href="?page=novo-usuario">Novo Cliente</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a class="botao-menu" href="?page=meus-games">Minhas compras</a>
                    </li>
                <?php endif; ?>
                <li>
                    <a class="botao-menu" href="./logout.php">Sair</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="itens">
            <div class="container">
                <?php
                switch (@$_REQUEST["page"]) {
                        /**
                     * Todas as páginas devem ser criadas dentro da pasta pages
                     * e deve ser feito o include aqui criando um novo case
                     */
                    case "novo":
                        include("./pages/cadastro.php");
                        break;
                    case "novo-usuario":
                        include("./pages/cadastro-usuario.php");
                        break;
                    case "meus-games":
                        include("./pages/meus-games.php");
                        break;
                    case "games-action":
                        include("./php/actions/games-action.php");
                        break;
                    case "usuario-action":
                        include("./php/actions/usuario-action.php");
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
            card.onmousemove = function(e) {
                let x = e.pageX - card.offsetLeft;
                let y = e.pageY - card.offsetTop;

                card.style.setProperty('--x', x + 'px');
                card.style.setProperty('--y', y + 'px');
            }
        })
    </script>
</body>

</html>