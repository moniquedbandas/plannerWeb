<?php

include_once 'Conexao.php';

class CompromissoDAO
{

    public function cadastrarCompromisso(Compromisso $compromisso)
    {
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "INSERT INTO compromisso (dataComp, hora, descricao, idUsuario) VALUES (:dataComp, :hora, :descricao, :idUsuario)";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':dataComp', $compromisso->getDataComp());
        $stmt->bindValue(':hora', $compromisso->getHora());
        $stmt->bindValue(':descricao', $compromisso->getDescricao());
        $stmt->bindValue(':idUsuario', $compromisso->getIdUsuario());
        $res = $stmt->execute();
        if ($res) {
            echo "<script>alert('Cadastro feito com sucesso');</script>";
        } else {
            echo "<script>alert('Erro: Sem sucesso ao cadastrar');</script>";
        }
    }

    public function listarCompromisso()
    {
        $conex = new Conexao();
        $conex->fazConexao();
        if (isset($_SESSION['usuario_id'])) {
            $sql = "SELECT * FROM compromisso WHERE idUsuario= :idUsuario ORDER BY idCompromisso";
            $query = $conex->conn->prepare($sql);
            $query->bindParam("idUsuario", $_SESSION['usuario_id']);
            $query->execute();
            return $query;
        } else {
            return true;
        }
    }
    public function resgataPorID($idCompromisso)
    {
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "SELECT * FROM compromisso WHERE idCompromisso = :idCompromisso";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':idCompromisso', $idCompromisso);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function alterarCompromisso(Compromisso $compromisso)
    {
        try {
            $conex = new Conexao();
            $conex->fazConexao();

            $conex->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE compromisso SET dataComp = :dataComp, hora = :hora, descricao = :descricao WHERE idCompromisso = :idCompromisso";
            $stmt = $conex->conn->prepare($sql);

            if (!$stmt) {
                throw new Exception("Erro na preparação da consulta.");
            }

            $stmt->bindValue(':idCompromisso', $compromisso->getIdCompromisso());
            $stmt->bindValue(':dataComp', $compromisso->getDataComp());
            $stmt->bindValue(':hora', $compromisso->getHora());
            $stmt->bindValue(':descricao', $compromisso->getDescricao());

            $res = $stmt->execute();
            if ($res === false) {
                throw new Exception("Erro ao executar a consulta.");
            }
            echo "<script>location.href='../controller/ProcessarCompromisso.php?oc=listarTela';</script>";
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function excluirCompromisso($idCompromisso)
    {
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "DELETE FROM compromisso WHERE idCompromisso = :idCompromisso";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindParam(':idCompromisso', $idCompromisso, PDO::PARAM_INT);
        $res = $stmt->execute();

        return $res;
    }
}
