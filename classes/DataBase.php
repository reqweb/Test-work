<?php

class DataBase{
    
    const DB_PATH = "../db/db.sqlite3";
    
    public function SelectAll($table_name){
        $file_sqlt = new PDO('sqlite:'.self::DB_PATH.'');
        $items = $file_sqlt->query('SELECT * FROM '.$table_name.' ORDER BY id DESC');
        return $items;
    }
    
}
