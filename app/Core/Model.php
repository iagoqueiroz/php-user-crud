<?php
namespace App\Core;

use PDO;
use PDOException;

class Model
{
    protected $db;

    public function __construct()
    {
        self::setConnection();
    }

    private function setConnection()
    {
        try {

            $options = array(
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT         => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );

            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS, $options);

        } catch (PDOException $e) {
            exit("The application cannot connect to the database");
        }
    }

    public function find($id)
    {
        $sql    = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $query  = $this->db->prepare($sql);
        $params = [':id' => $id];

        $query->execute($params);

        return ($query->rowCount() ? $query->fetch() : false);
    }

    public function findAll()
    {
        $sql   = "SELECT * FROM {$this->table}";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function paginate($offset, $limit, $sort = 'DESC')
    {
        $sql   = "SELECT * FROM {$this->table} ORDER BY id {$sort} LIMIT {$offset},{$limit}";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function countTotal()
    {
        $sql   = "SELECT COUNT(id) as total FROM {$this->table}";
        $query = $this->db->prepare($sql);
        $query->execute();

        return (int) $query->fetch()->total;
    }

    public function create(array $args = [])
    {
        try {

            $this->db->beginTransaction();

            $fields = implode(', ', array_keys($args));
            $binds  = ':' . implode(', :', array_keys($args));

            $sql   = "INSERT INTO {$this->table} ({$fields}) VALUES ({$binds})";
            $query = $this->db->prepare($sql);
            foreach ($args as $column => $value) {
                $query->bindValue(':' . $column, $value);
            }

            return $query->execute();

        } catch (PDOException $e) {
            echo "Sentimos muito, houve um erro na operação com o banco de dados.";
            echo "Erro: " . $e->getMessage();
            die();
        }
    }

    public function update(array $args = [], $id)
    {
        try {

            $fields = [];
            foreach ($args as $column => $value) {
                $fields[] = $column . ' = :' . $column;
            }

            $binds = implode(', ', $fields);

            $sql   = "UPDATE {$this->table} SET {$binds} WHERE id = :id";
            $query = $this->db->prepare($sql);
            foreach ($args as $column => $value) {
                $query->bindValue(':' . $column, $value);
            }
            $query->bindValue(':id', $id);

            return $query->execute();

        } catch (PDOException $e) {
            echo "Sentimos muito, houve um erro na operação com o banco de dados.";
            echo "Erro: " . $e->getMessage();
            die();
        }
    }

    public function delete($id)
    {
        try {

            $sql    = "DELETE FROM {$this->table} WHERE id = :id";
            $query  = $this->db->prepare($sql);
            $params = [':id' => $id];

            return $query->execute($params);

        } catch (PDOException $e) {
            echo "Sentimos muito, houve um erro na operação com o banco de dados.";
            echo "Erro: " . $e->getMessage();
            die();
        }
    }
}
