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
}
