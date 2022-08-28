<?php
    include_once 'header.php';
?>

        <div class="accountContainer">
            <h2> Deposit </h2>
            <form class="loginForm" action="../includes/deposit.inc.php" method="post">
                <label for="transferAmountLabel"> Enter in the amount </label>

                <input type="text" name="depositAmount" placeholder="Deposit Amount"><br>

                <button type ="submit" name="submit"> Deposit </button>
            </form>
            
            <!-- Error handling -->
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyInput"){
                        echo "<p> Fill in all fields </p>";
                    }else if($_GET["error"] == "invalidAmount"){
                        echo "<p> Enter in a positive number </p>";
                    }else if($_GET["error"] == "stmtFailed"){
                        echo "<p> Error 404 Something went wrong ~ </p>";
                    }else if($_GET["error"] == "none"){
                        echo "<p> Successful Deposited </p>";
                    } 
                }
            ?>
        </div>

<?php
    require "footer.php";
?>