<?php
namespace Services;

class Database {
  public static function connect() {
    return new \PDO('sqlite:'.__DIR__.'/../../db.sqlite');
  }
}