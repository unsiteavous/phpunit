<?php

namespace Repositories;

use Models\User;
use Services\Database;

class UserRepository
{
  private $db;
  public function __construct()
  {
    $database = new Database();
    $this->db = $database->connect();
  }

  public function getAll(): array
  {
    $sql = 'SELECT * FROM users';
    $statement = $this->db->query($sql);
    $statement->setFetchMode(\PDO::FETCH_CLASS, User::class);
    $users = $statement->fetchAll();
    return $users;
  }

  public function getById($id): User|false
  {
    $sql = 'SELECT * FROM users WHERE id = :id';
    $statement = $this->db->prepare($sql);
    $statement->execute(['id' => $id]);
    $statement->setFetchMode(\PDO::FETCH_CLASS, User::class);
    $user = $statement->fetch();
    return $user;
  }

  public function getByEmail($email): User|false
  {
    $sql = 'SELECT * FROM users WHERE email = :email';
    $statement = $this->db->prepare($sql);
    $statement->execute(['email' => $email]);
    $statement->setFetchMode(\PDO::FETCH_CLASS, User::class);
    $user = $statement->fetch();
    return $user;
  }

  public function create($data): bool
  {
    try {
      $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
      $statement = $this->db->prepare($sql);
      $statement->execute($data);
      return true;
    } catch (\PDOException $e) {
      return false;
    }
  }

  public function update(User $user): bool
  {
    try {
      $sql = 'UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id';
      $statement = $this->db->prepare($sql);
      $statement->execute([
        'id' => $user->getId(),
        'name' => $user->getName(),
        'email' => $user->getEmail(),
        'password' => $user->getPassword()
      ]);
      return true;
    } catch (\PDOException $e) {
      return false;
    }
  }

  public function delete($id): bool
  {
    try {
      $sql = 'DELETE FROM users WHERE id = :id';
      $statement = $this->db->prepare($sql);
      $statement->execute(['id' => $id]);
      return true;
    } catch (\PDOException $e) {
      return false;
    }
  }
}
