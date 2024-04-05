<?php

namespace Core;

use PDO;

class Database
{
  public $conn;
  public $statement;

  public function __construct($config)
  {
    $dsn = 'mysql:' . http_build_query($config, '', ';');

    $this->conn = new PDO($dsn, $config['username'], $config['password'], [
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


  public function find()
  {
    $result = $this->statement->fetch();

    return $result;
  }

  public function findAll()
  {
    $result = $this->statement->fetchAll();

    return $result;
  }

  public function findOrFail()
  {
    $result = $this->statement->fetch();

    if (!$result) Response::notFound();

    return $result;
  }

  public function findAllOrFail()
  {
    $result = $this->statement->fetchAll();

    if (!$result) Response::notFound();

    return $result;
  }
}
