<?php
    include("includes/layout.php");
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -8%; color: white;">Novo Usuário</h1>
    <hr style="width: 80%;">
    <h2>Novo Usuário</h2>
    
    <?php
        if(isset($_SESSION['msgUsuario'])): 
    ?>
        <div class="alert alert-info" role="alert" style="width: 50%;">
            <?php echo $_SESSION['msgUsuario']; ?>
        </div> 
    <?php 
            unset($_SESSION['msgUsuario']);
        else: endif
    ?>
    
    <form action="php/cadastrarUsuarios.php" method="POST">
        <div style="margin-top: 4%;">
        <hr style="width: 80%;">
            <div class="row g-3" style="margin: 0;">
                <div class="col-md-4">
                    <label class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label">CPF:</label>
                    <input type="text" class="form-control" name="cpf"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Data de Nascimento:</label>
                    <input type="date" class="form-control" name="dataNascimento"/>
                </div>
            </div>

            <div class="row g-3" style="margin: 0;">
                <div class="col-md-3">
                    <label class="form-label">Telefone:</label>
                    <input type="text" class="form-control" name="telefone"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email"/>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Endereço:</label>
                    <input type="text" class="form-control" name="endereco"/>
                </div>
            </div>

            <div class="row g-3" style="margin: 0; margin-top: 2%;">
                <div class="col-md-4">
                    <label class="form-label">Senha:</label>
                    <input type="password" class="form-control" name="senha"/>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Confirmar Senha:</label>
                    <input type="password" class="form-control" name="confirmarSenha"/>
                </div>
            </div>

            <div class="col-md-4" style="margin-top: 2%; margin-left: 1%;">
                <button type="submit" name="btnCadastrarUser" class="btn btn-primary" value="cadastrar">
                    <i class="fas fa-save"></i>
                    Cadastrar</button>
            </div>
        </div>
    </form>
    <hr style="width: 80%;">
</main>