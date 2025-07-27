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

  static function createPurchase(Purchase $purchase)
  {
    $sql = "INSERT INTO purchase(PurchaseID,CustomerCode,Amount) VALUE(:purchaseID,:customerCode,:amount);";
    self::$db->query($sql);
    self::$db->bind(":purchaseID", $purchase->getPurchaseID());
    self::$db->bind(":customerCode", $purchase->getCustomerCode());
    self::$db->bind(":amount", $purchase->getAmount());
    self::$db->execute();
    return self::$db->lastInsertedId();
  }

  static function getPurchase(string $purchaseId)
  {
    $sql = "SELECT * FROM purchase WHERE PurchaseID=:purchaseId;";
    self::$db->query($sql);
    self::$db->bind(":purchaseId", $purchaseId);
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

  static function updatePurchase(Purchase $purchase) {
    $sql = "UPDATE purchase SET CustomerCode=:customerCode,Amount=:amount WHERE PurchaseID=:purchaseId;";
    self::$db->query($sql);
    self::$db->bind(":customerCode", $purchase->getCustomerCode());
    self::$db->bind(":amount", $purchase->getAmount());
    self::$db->bind(":purchaseId", $purchase->getPurchaseID());
    self::$db->execute();
    return self::$db->singleResult();
  }

  static function deletePurchase(string $purchaseId)
  {
    $sql = "DELETE FROM purchase WHERE PurchaseID=:purchaseId;";
    self::$db->query($sql);
    self::$db->bind(":purchaseId", $purchaseId);
    self::$db->execute();
  }

  static function getPurchaseList()
  {
    $sql = "SELECT purchase.PurchaseID,purchase.Amount,customer.CustomerDetail,customer.CustomerDiscount FROM purchase JOIN customer ON purchase.CustomerCode=customer.CustomerCode;";
    self::$db->query($sql);
    self::$db->execute();
    return self::$db->resultSet();
  }
}
