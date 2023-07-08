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
    <div id="corpoForm-cad">
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confsenha" placeholder="ConfirmarSenha" maxlength="15">
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
<?php
// verificar se clicou no botão
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confsenha']);

    //verificar se está preenchido
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) 
    && !empty($confirmarSenha))
    {
        $u->conectar("projeto_login", "localhost", "root", "");
        if($u->msgErro ==""){ // se esta tudo ok
            if($senha == $confirmarSenha){
                if($u->cadastrar($nome, $telefone, $email, $senha)){
                    ?>
                    <div id="msg-sucesso">
                        <a href="index.php">Cadastrado com Sucesso! <strong>acesse para entrar!</strong> </a> 
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        Email já cadastrado!
                    </div>

                    <?php
                }
            }
            else{
                ?>
                    <div class="msg-erro">
                        AS senhas não correspodnem!
                    </div>
                    <?php
            }
            
        }
        else{
            ?>
                    <div class="msg-erro">
                        <?php echo "Erro: ".$u->msgErro; ?>
                    </div>
                    <?php            
        }
    }
    else{

        ?>
                    <div class="msg-erro">
                        Preencha todos os campos!!
                    </div>
                    <?php
    }
}

?>
</body>
</html>