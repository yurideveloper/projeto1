<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

<body>
    <?php include("menu.php") ?>
    <?php require_once("../controller/ControllerEditar.php");?>
    <div class="form-group">
        <form method="post" action="../controller/ControllerEditar.php">
            <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?php echo $editar->getId(); ?>">
                <label>Nome</label>
                <input class="form-control" type="text"     id="nome" name="nome" value="<?php echo $editar->getNome(); ?>"placeholder="Nome e sobrenome" minlength="6" maxlength="112" required autofocus>
                <label>Senha</label>
                <input class="form-control" type="password"     id="senha" name="senha" value="<?php echo $editar->getSenha(); ?>" placeholder="Crie uma senha forte" minlength="6" maxlength="112" required autofocus>
                <label>Endereço Consultório</label>
                <input class="form-control" type="text"     id="endereco_consultorio" value="<?php echo $editar->getEndereco_consultorio(); ?>" name="endereco_consultorio" placeholder="Endereço completo"  minlength="6" maxlength="112" required >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="submit" name="submit">Alterar</button>
            </div>
        </form>
    </div>
</body>
</html>
