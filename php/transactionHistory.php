<?php
    include_once 'header.php';
    require_once "../includes/dbh.inc.php";
    require_once "../includes/functions.inc.php";
?>

        <div class="accountContainer">
            <h2> Transaction History </h2>
            <table>
                <tr>
                    <th> Transaction ID</th>
                    <th> Transaction Type </th>
                    <th> Date </th>
                </tr>
                <?php
                    $userInfo = $_SESSION["accountInfo"];
                    $customerID = $userInfo["customerID"];
                    $transactionHistory = getTransactionHistory($conn, $customerID);
                    while ($row_users = mysqli_fetch_array($transactionHistory)) {
                        // Generate the rows from the transaction table
                        echo "<tr>";
                            echo "<td>".($row_users['transactionID'])."</td>";
                            echo "<td>".($row_users['transactionType'])."</td>";
                            echo "<td>".($row_users['transactionDate'])."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>

<?php
    require "footer.php";
?>