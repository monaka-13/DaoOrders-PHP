<?php


/*
+------------+--------------+--------+
| PurchaseID | CustomerCode | Amount |
+------------+--------------+--------+
*/

class PurchaseDAO
{

  static private $db;
  static function initialize($className)
  {
    self::$db = new PDOService($className);
  }

  static function createPurchase(Purchase $newPurchase)
  {
  }

  static function getPurchase(string $purchaseId)
  {
    $sql = "SELECT * FROM purchase WHERE PurchaseID=:purchaseId;";
    self::$db->query($sql);
    self::$db->bind(":purchaseId",$purchaseId);
    self::$db->execute();
    return self::$db->singleResult();
  }

  static function getPurchases()
  {
    $sql = "SELECT * FROM purchase;";
    self::$db->query($sql);
    self::$db->execute();
    return self::$db->resultSet();
  }

  static function updatePurchase(Purchase $PurchaseToUpdate)
  {
  }

  static function deletePurchase(string $PurchaseId)
  {
  }

  // WE NEED TO USE JOIN HERE
  // Make sure to select from both tables joined at the correct column
  // You may need to also query some columns from the Customer class/table. 
  // Those columns are needed for price calculation and display the Customer detail in the main page    
  static function getPurchaseList()
  {
    $sql = "SELECT purchase.PurchaseID,purchase.Amount,customer.CustomerDetail,customer.CustomerDiscount FROM purchase JOIN customer ON purchase.CustomerCode=customer.CustomerCode;";
    self::$db->query($sql);
    self::$db->execute();
    return self::$db->resultSet();
  }
}
