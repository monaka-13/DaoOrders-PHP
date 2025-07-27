<?php
/*
+--------------+----------------+------------------+
| CustomerCode | CustomerDetail | CustomerDiscount |
+--------------+----------------+------------------+
*/
class CustomerDAO
{

    // Declare Static DB member to store the database
    static private $db;

    //Initialize the CustomerDAO
    static function initialize($className)
    {
        self::$db = new PDOService($className);
    }

    //Get all the Customer record
    static function getCustomer()
    {
        $sql = "SELECT * FROM customer;";
        self::$db->query($sql);
        self::$db->execute();
        return self::$db->resultSet();
    }
}