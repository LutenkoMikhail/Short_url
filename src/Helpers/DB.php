<?php

namespace src\Helpers;


use PDO;

/**
 * Class for working with a database via PDO
 */

class DB
{
    protected $db = null;
    protected $tableName = '';
    protected $lastInsertId;
    protected $stmt;
    protected $dbHost;
    protected $dbName;
    protected $dbUser;
    protected $dbPassword;

    /**
     * class constructor
     * @param null $db
     */
    public function __construct(string $tableName, string $dbHost, string $dbName, string $dbUser, string $dbPassword)
    {
        $this->tableName = $tableName;
        $this->dbHost = $dbHost;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
        $this->getDB();
    }

    /**
     * Get a Site by id
     * @param int $id
     * @return bool
     */
    public function getRecordById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id ={$id}";
        $this->sql($sql);
        $record = $this->stmt->fetch(PDO::FETCH_ASSOC);

        return !empty($record) ? $record : false;
    }

    /**
     * Insert New Site
     * @param array $postData
     */
    public function insert(array $postData)
    {

        $sql = "SELECT * FROM {$this->tableName} WHERE url =" . "'" . "{$postData['url']}" . "'";
        $this->sql($sql);
        $record = $this->stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($record)) {
            return false;
        }

        $sql = "INSERT INTO {$this->tableName} (url) 
                VALUES (:url)";
        $this->sql($sql, $postData);
        $this->lastInsertId = $this->db->lastInsertId();

        return true;
    }

    /**
     * Get last record id
     * @return mixed
     */
    public function getLastInsertId(): int
    {
        return $this->lastInsertId;
    }

    /**
     * Connect DataBase
     * @return PDO|null
     */
    protected function getDB()
    {
        if ($this->db === null) {
            try {
                $this->db = new PDO(
                    "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName,
                    $this->dbUser,
                    $this->dbPassword,
                    $options = [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . CHARSET
                    ]
                );
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }

        return $this->db;
    }

    /**
     * Query sql execution
     * @param string $sql
     * @param array $postData
     */
    protected function sql(string $sql, array $postData = [])
    {
        try {
            $this->stmt = $this->db->prepare($sql);
            if ($this->stmt !== false) {
                $this->stmt->execute($postData);
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}