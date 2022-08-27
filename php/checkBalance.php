<?php
    include_once 'header.php';
?>

        <div class="accountContainer">
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