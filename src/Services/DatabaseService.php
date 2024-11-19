<?php

class DatabaseService
{
    public static function connect(): PDO
    {
        $db = new PDO('mysql:host=db; dbname=project-management', 'root', 'password');
        $db->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    }
}