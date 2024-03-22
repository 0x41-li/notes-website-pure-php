<?php

class Database
{
  public $conn;
  public $statement;

  public function __construct($config, $username = 'root', $password = '')
  {
    $dsn = 'mysql:' . http_build_query($config, '', ';');

    $this->conn = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $this;
  }

  public function query(string $query, array $params = [])
  {
    $this->statement = $this->conn->prepare($query);

    $this->statement->execute($params);

    return $this;
  }

  public function fetch()
  {
    return $this->statement->fetch();
  }
}
