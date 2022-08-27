<?php
    include_once 'header.php';
?>

        <div class="accountContainer">
            <form class="loginForm" action="../includes/withdraw.inc.php" method="post">
                <label for="transferAmountLabel"> Enter in the amount </label>

                <input type="text" name="withdrawAmount" placeholder="Withdrawn Amount"><br>

                <button type ="submit" name="submit"> Withdraw </button>
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
                        echo "<p> Successful Withdrawn the amount </p>";
                    } 
                }
            ?>
        </div>

<?php
    require "footer.php";
?>