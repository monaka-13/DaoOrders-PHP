<?php

/*
+------------------+-------------+------+-----+---------+-------+
| Field            | Type        | Null | Key | Default | Extra |
+------------------+-------------+------+-----+---------+-------+
| CustomerCode     | varchar(2)  | NO   | PRI | NULL    |       |
| CustomerDetail   | varchar(20) | YES  |     | NULL    |       |
| CustomerDiscount | float(3,2)  | YES  |     | NULL    |       |
+------------------+-------------+------+-----+---------+-------+
*/

class Customer
{
    private $CustomerCode;
    private $CustomerDetail;
    private $CustomerDiscount;

    function getCustomerCode()
    {
        return $this->CustomerCode;
    }
    function getCustomerDetail()
    {
        return $this->CustomerDetail;
    }
    function getCustomerDiscount()
    {
        return $this->CustomerDiscount;
    }

    function setCustomerCode($CustomerCode)
    {
        $this->CustomerCode = $CustomerCode;
    }
    function setCustomerDetail($CustomerDetail)
    {
        $this->CustomerDetail = $CustomerDetail;
    }
    function setCustomerDiscount($CustomerDiscount)
    {
        $this->CustomerDiscount = $CustomerDiscount;
    }
}
