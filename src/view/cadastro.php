<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

<body>
    <?php include("menu.php") ?>
    <div class="form-group">
        <form method="post" action="../controller/ControllerCadastro.php" id="form" name="form">
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" type="text"     id="nome" name="nome" placeholder="Nome e sobrenome" minlength="6" maxlength="112" required autofocus>
                <label>Email</label>
                <input class="form-control" type="email"    id="email" name="email" placeholder="exemplo@gmail.com"  minlength="6" maxlength="112" required >
                <label>Senha</label>
                <input class="form-control" type="password"     id="senha" name="senha" placeholder="Crie uma senha forte" minlength="6" maxlength="112" required autofocus>
                <label>Endereço Consultório</label>
                <input class="form-control" type="text"     id="endereco_consultorio" name="endereco_consultorio" placeholder="Endereço completo"  minlength="6" maxlength="112" required >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>

    <script language="javascript" type="text/javascript">
        function voltar()
        {
            history.back();
        }

    </script>
</body>

</html>
