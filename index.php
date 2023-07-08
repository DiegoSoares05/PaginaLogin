<?php
    require_once 'Classes/usuario.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Projeto Login</title>
   
</head>
<body>
    <div id="corpoForm">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastro.php">Ainda não é inscrito? <strong>Inscreva-se</strong></a>
        </form>

    </div>
<?php

if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(!empty($email) && !empty($senha)){
        $u ->conectar("projeto_login", "localhost", "root", "");
        if($u -> msgErro =="")
        {
           if($u -> logar($email, $senha))
           {
               header("location: areaPrivada.php");
            }
            }else
            {
                ?>
                <div class="msg-erro">
                    Email e/ou senha incorretos"
                </div>

                <?php
            }
        }
        else{
            ?>
                <div class="msg-erro">
                    <?php echo "Erro: " .$u->msgErro; ?>
                </div>

                <?php
            
    }
    }else
    {
        ?>
                <div class="msg-erro">
                    Preencha todos os campos!
                </div>
                <?php
}
?>
</body>
</html>