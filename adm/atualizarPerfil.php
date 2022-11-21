<?php
    include("includes/layout.php");
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -8%; color: white;">Atualizar Usuário</h1>
    <hr style="width: 80%;">
    <h2>Atualizar Usuário</h2>
    
    <?php
        if(isset($_SESSION['msgPerfil'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgPerfil']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgPerfil']);
        else: endif
    ?>

    <?php
        $dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);

        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $query = $conexao->prepare($sql);
        $query->bindParam(':id', $dados['id']);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
    ?> 
    
    <form action="php/atualizarPerfil.php" method="GET">
        <div style="margin-top: 4%;">
        <hr style="width: 80%; margin-top: -2%;">
            <div class="row g-3" style="margin: 0;">
                <div class="col-md-4">
                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome"
                    value="<?php echo $row['nome'];?>"/>
                    <input type="hidden" name="id"
                    value="<?php echo $row['id'];?>"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label">CPF:</label>
                    <input type="text" class="form-control" name="cpf"
                    value="<?php echo $row['cpf'];?>"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="dataNascimento"
                    value="<?php echo $row['dataNascimento'];?>"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Telefone:</label>
                    <input type="text" class="form-control" name="telefone"
                    value="<?php echo $row['telefone'];?>"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email"
                    value="<?php echo $row['email'];?>"/>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Endereço:</label>
                    <input type="text" class="form-control" name="endereco"
                    value="<?php echo $row['endereco'];?>"/>
                </div>
            </div>

            <div class="row g-3" style="margin: 0; margin-top: 2%;">
                <div class="col-md-4">
                    <label class="form-label">Nova Senha:</label>
                    <input type="password" class="form-control" name="senha"/>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Confirmar Senha:</label>
                    <input type="password" class="form-control" name="confirmarSenha"/>
                </div>
            </div>

            <div class="col-md-4" style="margin-top: 2%; margin-left: 1%;">
                <button type="submit" name="btnCadastrarUser" class="btn btn-primary" value="cadastrar">
                    <i class="fas fa-edit"></i>
                     Atualizar</button>
            </div>
        </div>
    </form>
    <hr style="width: 80%;">
</main>