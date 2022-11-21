<?php
    include("includes/layout.php");
?>

<main style="margin-top: 10%; margin-left: 20%;">
    <h1 style="margin-top: -8%; color: white;">Perfil do Usuário</h1>
    <hr style="width: 80%;">
    <h2>Perfil do Usuário</h2><br>
    <hr style="width: 80%; margin-top: -2%;">
    <?php
        $sql = "SELECT * FROM usuarios WHERE nome = :nome";
        $query = $conexao->prepare($sql);
        $query->bindParam(':nome', $nomeUser);
        $query->execute();
        $rowPerfil = $query->fetch(PDO::FETCH_ASSOC);
        $dataNascimento = date('d/m/Y', strtotime($rowPerfil['dataNascimento']));
    ?>
    <div style="font-size: 20px;">
        <a>Nome: <?php echo $rowPerfil['nome'];?></a><br>
        <hr style="width: 50%;">
        <a>CPF: <?php echo $rowPerfil['cpf'];?></a><br>
        <hr style="width: 50%;">
        <a>Data de Nascimento: <?php echo $dataNascimento;?></a><br>
        <hr style="width: 50%;">
        <a>Telefone: <?php echo $rowPerfil['telefone'];?></a><br>
        <hr style="width: 50%;">
        <a>Email: <?php echo $rowPerfil['email'];?></a><br>
        <hr style="width: 50%;">
        <a>Endereço: <?php echo $rowPerfil['endereco'];?></a><br>
        <hr style="width: 50%;">
    </div>
    <a type="submit" class="btn btn-primary" href="atualizarPerfil.php?id=<?php echo $rowPerfil['id'];?>">
        Atualizar</a>
    
    <hr style="width: 80%;">
</main>