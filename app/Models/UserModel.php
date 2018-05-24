<?php
namespace App\Models;

use App\Core\Model;

class UserModel extends Model
{

    protected $table = "users";

    public function findByEmail($email)
    {
        $sql    = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
        $query  = $this->db->prepare($sql);
        $params = [':email' => $email];

        $query->execute($params);

        return ($query->rowCount() ? $query->fetch() : false);
    }

    public function create($data)
    {
        $sql   = "INSERT INTO {$this->table} (nome, email, senha, data_nascimento) VALUES (:nome, :email, :senha, :data_nascimento)";
        $query = $this->db->prepare($sql);
        // hashing the password
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

        $params = [':nome' => $data['nome'], ':email' => $data['email'], ':senha' => $data['senha'], ':data_nascimento' => $data['data_nascimento']];

        return $query->execute($params);
    }

    public function delete($id)
    {
        $sql    = "DELETE FROM {$this->table} WHERE id = :id";
        $query  = $this->db->prepare($sql);
        $params = [':id' => $id];

        return $query->execute($params);
    }

    public function update($id, $data)
    {
        $sql   = "UPDATE {$this->table} SET nome = :nome, email = :email, senha = :senha, data_nascimento = :data_nascimento, emissao = :emissao, data_emissao = :data_emissao WHERE id = :id";
        $query = $this->db->prepare($sql);
        // hashing the password
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

        $params = [
            ':id'              => $id,
            ':nome'            => $data['nome'],
            ':email'           => $data['email'],
            ':senha'           => $data['senha'],
            ':data_nascimento' => $data['data_nascimento'],
            ':emissao'         => $data['emissao'],
            ':data_emissao'    => $data['data_emissao'],
        ];

        return $query->execute($params);
    }
}
