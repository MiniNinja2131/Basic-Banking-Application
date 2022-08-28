<?php
    include_once 'header.php';
?>

        <div class="accountContainer">
            <table>
                <tr>
                    <th> Account ID </th>
                    <th> Balance </th>
                    <th> Years </th>
                    <th> New Balance after interest </th>
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