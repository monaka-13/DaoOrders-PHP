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


//If there was post data from an edit form then process it
if (!empty($_POST)) {
    // if ($_POST["action"] == "edit") {
    //     //Assemble the Purchase to update
    //     $PurchaseToUpdate = new Purchase();
    //     $PurchaseToUpdate->setPurchaseID($_POST["purchaseID"]);
    //     $PurchaseToUpdate->setAmount($_POST["amount"]);
    //     $PurchaseToUpdate->setCustomerCode($_POST["customerCode"]);

    //     //Send the Purchase to the DAO to be update
    //     PurchaseDAO::updatePurchase($PurchaseToUpdate);

    // } else if ($_POST["action"] == "create")    {
    //     //Assemble the Purchase to Insert
    //     $PurchaseToCreate = new Purchase();

    //     //Send the Purchase to the DAO for insertion
    //     $PurchaseToCreate->setPurchaseID($_POST["purchaseID"]);
    //     $PurchaseToCreate->setAmount($_POST["amount"]);
    //     $PurchaseToCreate->setCustomerCode($_POST["customerCode"]);

    //     PurchaseDAO::createPurchase($PurchaseToCreate);

    // }
}

//If there was a delete that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "delete")  {
    // PurchaseDAO::deletePurchase($_GET["id"]);
}


Page::header();
Page::listPurchases(PurchaseDAO::getPurchaseList());
if (isset($_GET["action"]) && $_GET["action"] == "edit")  {
    // $PurchaseToEdit = PurchaseDAO::getPurchase($_GET["id"]);
    $PurchaseToEdit = new Purchase();
    Page::editPurchaseForm($PurchaseToEdit, CustomerDAO::getCustomer());
} else {
    Page::createPurchaseForm(CustomerDAO::getCustomer());
}
Page::footer();