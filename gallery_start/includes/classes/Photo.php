<?php

class Photo extends DBRecord
{
  protected static $dbTable = "photos";
  protected static $dbFields = array('title', 'description', 'filename', 'type', 'size');
  protected $id;
  protected $title;
  protected $description;
  protected $filename;
  protected $type;
  protected $size;
}

?>
