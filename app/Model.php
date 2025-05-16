<?php

declare(strict_types=1);

namespace App;

use PDO;

/**
 * @mixin PDO
 */

abstract class Model
{

  protected DB $db;

  public function __construct()
  {
    $this->db = App::db();
  }

  public function findAll(string $table, ?string $orderBy = null, int $limit = 0, int $offset = 0)
  {
    $query = 'SELECT * FROM ' . $table;

    if ($orderBy != null) {
      $query .= ' ORDER BY ' . $orderBy;
    }

    if ($limit > 0) {
      $query .= ' LIMIT ' . $limit;
    }

    if ($offset > 0) {
      $query .= ' OFFSET ' . $offset;
    }


    $stmt = $this->db->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
  }

  public function findMany(string $table, string $column = 'id', $value, ?string $orderBy = null, int $limit = 0): array
  {
    $query = 'SELECT * FROM `' . $table . '` WHERE `' . $column . '` = :value';
    $values = [
      'value' => $value
    ];

    if ($orderBy != null) {
      $query .= ' ORDER BY ' . $orderBy;
    }

    if ($limit > 0) {
      $query .= ' LIMIT ' . $limit;
    }

    $stmt = $this->db->prepare($query);
    $stmt->execute($values);

    return $stmt->fetchAll();
  }

  public function findOne(string $table, string $column = 'id', string $value, ?string $orderBy = null, int $limit = 0): array
  {
    $query = 'SELECT * FROM `' . $table . '` WHERE `' . $column . '` = :value';
    $values = [
      'value' => $value
    ];

    if ($orderBy != null) {
      $query .= ' ORDER BY ' . $orderBy;
    }

    if ($limit > 0) {
      $query .= ' LIMIT ' . $limit;
    }

    $stmt = $this->db->prepare($query);
    $stmt->execute($values);
    $row = $stmt->fetchAll();
    return $row[0];
  }

  public function total(string $table)
  {
    $stmt = $this->db->prepare('SELECT COUNT(*) FROM `' . $table . '`');
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[0];
  }

  private function insert($table, $values)
  {
    $query = 'INSERT INTO `' . $table . '` (';

    foreach ($values as $key => $value) {
      $query .= '`' . $key . '`,';
    }

    $query = rtrim($query, ',');

    $query .= ') VALUES (';

    foreach ($values as $key => $value) {
      $query .= ':' . $key . ',';
    }

    $query = rtrim($query, ',');

    $query .= ')';

    $values = $this->processDates($values);

    $stmt = $this->db->prepare($query);
    $stmt->execute($values);

    return $this->db->lastInsertId();
  }

  public function save($table, $record, $primaryKey = 'id')
  {
    $entity = new $this;

    try {
      if (empty($record[$primaryKey])) {
        unset($record[$primaryKey]);
      }
      $insertId = $this->insert($table, $record);

      $entity->{$primaryKey} = $insertId;
    } catch (\PDOException $e) {
      $this->update($table, $record);
    }

    /* foreach ($record as $key => $value) {
      if (!empty($value)) {
        if ($value instanceof \DateTime) {
          $value = $value->format('Y-m-d H:i:s');
        }
        $entity->$key = $value;
      }
    } */
    return $entity;
  }

  private function update($table, $values)
  {
    $query = ' UPDATE `' . $table . '` SET ';

    foreach ($values as $key => $value) {
      $query .= '`' . $key . '` = :' . $key . ',';
    }

    $query = rtrim($query, ',');

    $query .= ' WHERE id = :primaryKey';

    // Set the :primaryKey variable
    $values['primaryKey'] = $values['id'];

    $values = $this->processDates($values);

    $stmt = $this->db->prepare($query);
    $stmt->execute($values);
  }

  public function delete($table, $field, $value)
  {
    $values = [':value' => $value];

    $stmt = $this->db->prepare('DELETE FROM `' . $table . '` WHERE `' . $field . '` = :value');

    $stmt->execute($values);
  }

  private function processDates($values)
  {
    foreach ($values as $key => $value) {
      if ($value instanceof \DateTime) {
        $values[$key] = $value->format('d-m-Y');
      }
    }

    return $values;
  }
}