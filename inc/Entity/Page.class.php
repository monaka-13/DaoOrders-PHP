<?php

# 4. Complete the listPurchases(), addPurchaseForm() and editPurchaseForm()

class Page
{

  static function header()
  { ?>
    <!-- Start the page 'header' -->
    <!DOCTYPE html>
    <html>

    <head>
      <title></title>
      <meta charset="utf-8">
      <meta name="author" content="WHOAMI">
      <title>There should be a title here</title>
      <link href="css/styles.css" rel="stylesheet">
    </head>

    <body>
      <header>
        <h1>There should be heading here</h1>
      </header>
      <article>
      <?php }

    static function footer()
    { ?>
      </article>
    </body>

    </html>

  <?php }

    static function listPurchases(array $purchases)
    {
  ?>
    <section class="main">
      <h2>Current Data</h2>
      <table id="list">
        <thead>
          <tr>
            <th>Purchase ID</th>
            <th>Amount</th>
            <th>Customer Detail</th>
            <th>Price</th>
            <!-- Complete the remaining header -->
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <?php
        //List all the purchase records
        $i = 1;
        foreach ($purchases as $purchase) {
          if ($i % 2 == 0) {
            echo '<tr class="evenRow">';
          } else {
            echo '<tr>';
          }
          echo "<td>" . $purchase->getPurchaseID() . "</td>";
          echo "<td>" . $purchase->getAmount() . "</td>";
          echo "<td>" . $purchase->CustomerDetail . "</td>";
          echo "<td>$" . ITEM_PRICE * $purchase->getAmount() * (1 - $purchase->CustomerDiscount) . "</td>";
          echo '<td><a href="?action=edit&id=' . $purchase->getPurchaseID() . '">Edit</td>';
          echo '<td><a href="?action=delete&id=' . $purchase->getPurchaseID() . '">Delete</td>';
          echo "</tr>";
          $i++;
        }
        echo '</table></section>';
      }

      // this function displays the add new purchase record
      // $customers is the array of Customer objects obtained from the CustomerDAO
      // $customers is required to display the CustomerCode and CustomerDetail in select options
      static function createPurchaseForm(array $customers)
      { ?>
        <section class="form1">
          <h3>Add a New Purchase</h3>
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <table>
              <tr>
                <td>Purchase ID</td>
                <td><input type="text" name="purchaseID" id="purchaseID" placeholder="PXXX{R|S}"></td>
              </tr>
              <tr>
                <td>Amount</td>
                <td><input type="text" name="amount" id="amount" placeholder="1 to 10"></td>
              </tr>
              <tr>
                <td>Customer Detail</td>
                <td>
                  <select name="customerCode">
                    <?php
                    foreach ($customers as $customer) {
                      echo "<option>" . $customer->getCustomerDetail() . "</option>";
                    }
                    ?>
                  </select>
                </td>
              </tr>
            </table>
            <input type="hidden" name="action" value="create">
            <input type="submit" value="Add Purchase Record">
          </form>
        </section>

      <?php }

      // This function is to show the edit purchase record form
      // The edit form should be displayed only when the Edit link is clicked
      // Whether you will display add form or edit form should be controlled in the main file.

      // The $purchaseToEdit is a singleResult record of purchase whose link was clicked
      // The $customers contains the array of customer objects from the CustomerDAO
      static function editPurchaseForm(Purchase $purchaseToEdit, array $customers)
      {
        // Make sure the form's method is pointing to $_SERVER["PHP_SELF"]
        // and it is using post method
      ?>
        <!-- Start the page's edit entry form -->
        <section class="form1">
          <h3>Edit Purchase - <?php // I should echo something here 
                              ?></h3>
          <form action="<?php // which server should I send the post? 
                        ?>" method="post">
            <table>
              <tr>
                <td>Purchase ID</td>
                <td><?php // What is the purchase ID of the record being edited? 
                    ?></td>
              </tr>
              <tr>
                <td>Amount</td>
                <td>
                  <input type="text" name="amount" id="amount" placeholder="1 to 5" value="<?php echo $purchaseToEdit->getAmount() ?>">
                </td>
              </tr>
              <tr>
                <td>Customer Detail</td>
                <td>
                  <select name="customerCode">
                    <?php
                    // use loop to list all customer detail 
                    // from the database to build the html's option element
                    // make sure the corresponding customer detail for this purchase is selected
                    ?>
                  </select>
                </td>
              </tr>
            </table>

            <!-- We need another hidden input for purchase id here. Why? -->
            <input type="hidden" name="purchaseID" value="<?php   // what is the record's purchase ID again? 
                                                          ?>">
            <!-- Use input type hidden to let us know that this action is to edit -->
            <input type="hidden" name="action" value="edit">
            <input type="submit" value="Edit Purchase">
          </form>
        </section>

    <?php }
    }
