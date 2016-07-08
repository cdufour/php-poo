<?php

abstract class DBRecord
{
  function __construct($record)
  {
    $this->hydrate($record);
  }

  protected function hasAttribute($attr)
  {
    $classProps = get_object_vars($this);
    return array_key_exists($attr, $classProps);
  }

  protected function hydrate($record)
  {
    foreach($record as $key => $value) {
      if ($this->hasAttribute($key)) {
        $this->$key = $value;
      }
    }
  }

  protected function properties()
  {
    global $database;
    $properties = array();
    foreach (static::$dbFields as $field) {
      if (property_exists($this, $field)) {
        $field = $database->escapeString($field);
        $properties[$field] = $this->$field;
      }
    }
    return $properties;
  }

  public static function findAll()
  {
    global $database;

    $q = $database->query("SELECT * FROM ". static::$dbTable);
    $q->execute();
    $results = $q->fetchAll(PDO::FETCH_OBJ);

    $founds = [];
    foreach ($results as $result) {
      $founds[] = new static($result); // late static binding
    }
    return $founds;
  }

  public static function findById($id)
  {

  }

  // accesseur / mutateur universel
  public function attr($attrName = '', $attrValue = '')
  {
    $num_args = func_num_args();
    if ($this->hasAttribute($attrName)) {
      if ($num_args == 1) { // getter case
        return $this->$attrName;
      } elseif ($num_args == 2) { // setter case
        $this->$attrName = $attrValue;
        return true;
      }
    } else {
      return false;
    }
  }

  public function save()
  {
    return isset($this->id) ? $this->update() : $this->create();
  }

  public function create()
  {

  }

  public function update()
  {

  }

  public function delete()
  {

  }

}


?>
