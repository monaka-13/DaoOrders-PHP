<?php
require_once("inc/config.inc.php");

require_once("inc/Entity/Purchase.class.php");
require_once("inc/Entity/Customer.class.php");
require_once("inc/Entity/Page.class.php");

require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/CustomerDAO.class.php");
require_once("inc/Utility/PurchaseDAO.class.php");

//Initialize the DAO(s)
PurchaseDAO::initialize("Purchase");
CustomerDAO::initialize("Customer");

// POST
if (!empty($_POST)) {
  if ($_POST["action"] == "edit") {
    // Edit
    $purchaseToUpdate = new Purchase();
    $purchaseToUpdate->setPurchaseID($_POST["purchaseID"]);
    $purchaseToUpdate->setAmount($_POST["amount"]);
    $purchaseToUpdate->setCustomerCode($_POST["customerCode"]);

    PurchaseDAO::updatePurchase($purchaseToUpdate);
    $_GET = [];
  } else if ($_POST["action"] == "create") {
    // Create
    $purchaseToCreate = new Purchase();
    $purchaseToCreate->setPurchaseID($_POST["purchaseID"]);
    $purchaseToCreate->setAmount($_POST["amount"]);
    $purchaseToCreate->setCustomerCode($_POST["customerCode"]);

    PurchaseDAO::createPurchase($purchaseToCreate);
  }
}

// Delete
if (isset($_GET["action"]) && $_GET["action"] == "delete") {
  PurchaseDAO::deletePurchase($_GET["id"]);
}


Page::header();
Page::listPurchases(PurchaseDAO::getPurchaseList());
if (isset($_GET["action"]) && $_GET["action"] == "edit") {
  // Edit (display form)
  $editPurchase = PurchaseDAO::getPurchase($_GET["id"]);
  Page::editPurchaseForm($editPurchase, CustomerDAO::getCustomer());
} else {
  // Create (display form)
  Page::createPurchaseForm(CustomerDAO::getCustomer());
}
Page::footer();
