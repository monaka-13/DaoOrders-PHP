<?php

# Make sure to :
# 1. Edit the studentName and studentID
# 2. Edit the page's meta author and title
# 3. Edit the page's main heading to use the static member
# 4. Complete the listPurchases(), addPurchaseForm() and editPurchaseForm()

class Page  {

    public static $studentName = "My Name!";
    public static $studentID = "My ID!";

    static function header()   { ?>
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

    static function footer()   { ?>
        <!-- Start the page's footer -->            
                </article>
            </body>

        </html>

    <?php }

    // This function lists all purchase records
    // The $purchases is the array of Purchase object obtained from the PurchaseDAO from the controller
    static function listPurchases(Array $purchases)    {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">
        <h2>Current Data</h2>
        <table id="list">
            <thead>
                <tr>
                    <th>Purchase ID</th>
                    <!-- Complete the remaining header --> 
                    <th>Edit</th>
                    <th>Delete</th>
            </thead>
            <?php

                //List all the purchase records
                $i=0;
                foreach($purchases as $purchase)  {
                    // make sure to use the correct tr class
                    // echo "<tr class=
                    
                    // ... Write your code ...

                    // CustomerDetail is not a member of Purchase object. However, if you 
                    // perform the join correctly when you implement getPurchaseList, you 
                    // should be able to access it here if you do it correctly

                    // Make sure to calculate the price. Remember that ITEM_PRICE is a constant 
                    // and CustomerDiscount is not part of the Purchase object.
                    // Make sure to perform join correctly when you implement getPurchaseList.
                    // You should be able to access it here if you do it correctly.
                    // use the debugger to check

                    // example of how you make the delete link!
                    echo '<td><a href="?action=delete&id='.$purchase->getPurchaseID().'">Delete</td>';
                    echo "</tr>";
                    $i++;
                } 
        
        echo '</table>
            </section>';
  
    }

    // this function displays the add new purchase record
    // $customers is the array of Customer objects obtained from the CustomerDAO
    // $customers is required to display the CustomerCode and CustomerDetail in select options
    static function createPurchaseForm(Array $customers)   { ?>        
        <!-- Start the page's add entry form -->
        <section class="form1">
                <h3>Add a New Purchase</h3>
                <!-- make sure to edit the form action -->                
                <form action="" method="post">
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
                                // use loop to list all CustomerDetail here
                                // from the database to display the html's option elements
                            ?>
                            </select>
                            </td>
                        </tr>
                    </table>
                    <!-- Use input type hidden to let us know that this action is to create record -->
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
    static function editPurchaseForm(Purchase $purchaseToEdit, Array $customers)   {  
        // Make sure the form's method is pointing to $_SERVER["PHP_SELF"]
        // and it is using post method
        ?>        
        <!-- Start the page's edit entry form -->
        <section class="form1">
            <h3>Edit Purchase - <?php // I should echo something here ?></h3>
            <form action="<?php // which server should I send the post? ?>" method="post">
                <table>
                    <tr>
                        <td>Purchase ID</td>
                        <td><?php // What is the purchase ID of the record being edited? ?></td>
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
                <input type="hidden" name="purchaseID" value="<?php   // what is the record's purchase ID again? ?>">
                <!-- Use input type hidden to let us know that this action is to edit -->
                <input type="hidden" name="action" value="edit">
                <input type="submit" value="Edit Purchase">                
            </form>
        </section>

<?php }

}