<?php

namespace Model;

class Database
{
    private $db;
    private const HOSTNAME = 'localhost';
    private const DBNAME = 'test';
    private const LOGIN = 'root';
    private const PASSWORD = 'Diaz2002@';

    public function __construct()
    {
        $dsn = "mysql:host=" . Database::HOSTNAME . ";dbname=" . Database::DBNAME;
        $this->db = new \PDO($dsn, Database::LOGIN, Database::PASSWORD);
    }
    public function request(string $req, array $data = [])
    {
        $requetePrep = $this->db->prepare($req);
        for ($i = 0; $i < count($data); $i++) {
            $requetePrep->bindValue($i + 1, $data[$i]);
        }
        $requetePrep->execute();
        return $requetePrep->fetchAll(\PDO::FETCH_ASSOC);
    }
}
