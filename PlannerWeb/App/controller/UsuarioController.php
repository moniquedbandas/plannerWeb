<?php

class UsuarioController
{
    public static function cadastrarUsuario($nomeUsuario, $senha)
    {
        include_once '../model/Usuario.php';
        $usuario = new Usuario(null, $nomeUsuario, $senha);
        $usuario->cadastrarUsuario($usuario);
    }

    public static function autenticarUsuario($nomeUsuario, $senha)
    {
        include_once '../model/Usuario.php';
        include_once '../DAO/UsuarioDAO.php';
        $dao = new UsuarioDAO();
        $resultado = $dao->autenticarUsuario($nomeUsuario, $senha);
        return $resultado;
    }
}
