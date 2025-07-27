<?php

/*
+--------------+-------------+------+-----+---------+-------+
| Field        | Type        | Null | Key | Default | Extra |
+--------------+-------------+------+-----+---------+-------+
| PurchaseID   | varchar(10) | NO   | PRI | NULL    |       |
| CustomerCode | varchar(2)  | YES  | MUL | NULL    |       |
| Amount       | int(11)     | YES  |     | NULL    |       |
+--------------+-------------+------+-----+---------+-------+
*/

class Purchase
{
    private $PurchaseID;
    private $CustomerCode;
    private $Amount;

    function getPurchaseID()
    {
        return $this->PurchaseID;
    }
    function getCustomerCode()
    {
        return $this->CustomerCode;
    }
    function getAmount()
    {
        return $this->Amount;
    }
    function setPurchaseID($PurchaseID)
    {
        $this->PurchaseID = $PurchaseID;
    }
    function setCustomerCode($CustomerCode)
    {
        $this->CustomerCode = $CustomerCode;
    }
    function setAmount($Amount)
    {
        $this->Amount = $Amount;
    }
}
