<?php

class Usuario{

    public function login($email, $senha){
        global $conexao;

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $conexao->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dados = $sql->fetch();

           $_SESSION['idUser'] = $dados['id'];

           return true;
        }else{
            return false;
        }
    }

    public function logged($id){
        global $conexao;

        $array = array();

        $sql = "SELECT nome FROM usuarios WHERE id = :id";
        $sql = $conexao->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;

    }
}

?>