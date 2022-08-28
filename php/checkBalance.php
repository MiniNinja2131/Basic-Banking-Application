<?php
    include_once 'header.php';
?>

        <div class="accountContainer">
            <h2> User's Balance </h2>
            <table>
                <tr>
                    <th> Account ID </th>
                    <th> Balance </th>
                </tr>
                <tr>
                    <?php 
                        $userInfo = $_SESSION["accountInfo"];
                        echo "<td>" .$userInfo["accountID"]. "</td>";
                        echo "<td>" .$_SESSION["balance"]. "</td>";
                    ?>
                </tr>
            </table>
        </div>

<?php
    require "footer.php";
?>