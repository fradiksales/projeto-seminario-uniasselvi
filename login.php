<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Acesso</title>
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
        </nav>
    </header>

    <main>
        <div class="itens">
            <div class="container">
                <form action="./php/actions/login-action.php" method="POST" id="formCadastro">
                    <label for="nome">Usuário:</label>
                    <input type="email" name="email" />

                    <label for="nome">Senha:</label>
                    <input type="password" name="senha" />

                    <button>Entrar</button>
                </form>
            </div>
        </div>
        </div>
    </main>
</body>

</html>