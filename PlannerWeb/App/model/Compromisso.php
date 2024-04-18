<?php

class Compromisso
{

    protected $descricao;
    protected $dataComp;
    protected $hora;
    protected $idCompromisso;
    protected $idUsuario;

    public function __construct($idCompromisso, $dataComp, $hora, $descricao, $idUsuario)
    {
        $this->idCompromisso = $idCompromisso;
        $this->dataComp = $dataComp;
        $this->hora = $hora;
        $this->descricao = $descricao;
        $this->idUsuario = $idUsuario;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($value)
    {
        $this->descricao = $value;
    }

    public function getDataComp()
    {
        return $this->dataComp;
    }

    public function setDataComp($value)
    {
        $this->dataComp = $value;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($value)
    {
        $this->hora = $value;
    }

    public function getIdCompromisso()
    {
        return $this->idCompromisso;
    }

    public function setIdCompromisso($value)
    {
        $this->idCompromisso = $value;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($value)
    {
        $this->idUsuario = $value;
    }

    public function cadastrarCompromisso(Compromisso $compromisso)
    {
        include_once "../DAO/CompromissoDAO.php";
        $compromissoDAO = new CompromissoDAO();
        $compromissoDAO->cadastrarCompromisso($this);
    }
    public function listarCompromisso()
    {
        include_once "../DAO/CompromissoDAO.php";
        $dao = new CompromissoDAO();
        return $dao->listarCompromisso();
    }
    public function resgataPorID($idCompromisso)
    {
        include '../DAO/CompromissoDAO.php';
        $model = new CompromissoDAO(null);
        return $model->resgataPorID($idCompromisso);
    }
    public function alterarCompromisso(Compromisso $compromisso)
    {
        include_once "../DAO/CompromissoDAO.php";
        $compromissoDAO = new CompromissoDAO();
        $compromissoDAO->alterarCompromisso($compromisso);
    }
    public function excluirCompromisso($idCompromisso)
    {
        include_once "../DAO/CompromissoDAO.php";
        $compromisso = new CompromissoDAO();
        $compromisso->excluirCompromisso($idCompromisso);
    }
}
