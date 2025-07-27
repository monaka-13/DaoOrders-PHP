<?php
class Page
{

  static function header()
  {
?>
    <!DOCTYPE html>
    <html>

    <head>
      <title></title>
      <meta charset="utf-8">
      <meta name="KayShigenaga" content="DAOOrders-PHP">
      <title>DAOOrders-PHP</title>
      <link href="css/styles.css" rel="stylesheet">
    </head>

    <body>
      <header>
        <h1>DAOOrders-PHP</h1>
      </header>
      <article>
      <?php
    }

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
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <?php
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

      static function editPurchaseForm(Purchase $purchaseToEdit, array $customers)
      {
      ?>
        <section class="form1">
          <h3>Edit Purchase -
            <?= $purchaseToEdit->getPurchaseID() ?>
          </h3>
          <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <table>
              <tr>
                <td>Purchase ID</td>
                <td><?= $purchaseToEdit->getPurchaseID() ?></td>
              </tr>
              <tr>
                <td>Amount</td>
                <td>
                  <input type="text" name="amount" id="amount" placeholder="1 to 5" value="<?= $purchaseToEdit->getAmount() ?>">
                </td>
              </tr>
              <tr>
                <td>Customer Detail</td>
                <td>
                  <select name="customerCode">
                    <?php
                    foreach ($customers as $customer) {
                      if (strcasecmp($purchaseToEdit->getCustomerCode(), $customer->getCustomerCode()) == 0) {
                        echo "<option selected>";
                      } else {
                        echo "<option>";
                      }
                      echo $customer->getCustomerDetail() . "</option>";
                    }
                    ?>
                  </select>
                </td>
              </tr>
            </table>
            <input type="hidden" name="purchaseID" value="<?= $purchaseToEdit->getPurchaseID() ?>">
            <input type="hidden" name="action" value="edit">
            <input type="submit" value="Edit Purchase">
          </form>
        </section>
    <?php
      }
    }
