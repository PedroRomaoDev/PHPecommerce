<?php
//!!!CLASS USUARIO!!!//
class UsuarioDTO
{
    private $idUsuario;
    private $nome;
    private $email;
    private $cidade;
    private $telefone;
    private $estado;
    private $senha;
    private $situacao;
    private $perfil;
    private $isAdmin;


    //inicio funtion get//

    public function getidUsuario()
    {
        return $this->idUsuario;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    //final functon get//
    //inicio function set //

    //
    public function setidUsuario($idUsuario)
    {
        if (is_numeric($idUsuario)) {
            $this->idUsuario = $idUsuario;
        }
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    public function getUsuario()
    {
        return array(
            'idUsuario' => $this->idUsuario,
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'telefone' => $this->telefone,
            'estado' => $this->estado,
            'cidade' => $this->cidade,
            'perfil' => $this->perfil,
            'isAdmin' => $this->isAdmin
        );
    }

    //final function set//
}
