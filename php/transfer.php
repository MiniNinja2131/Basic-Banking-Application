<?php
    include_once 'header.php';
?>
        
        <div class="accountContainer">
            <form class="transferForm" action="../includes/transfer.inc.php" method="post">
                <label for="transferAccountLabel"> Enter in their Username or Account ID </label>

                <input type="text" name="transferID" placeholder="Username/AccountID"><br>

                <label for="transferAmountLabel"> Transfer Amount </label>

                <input type="text" name="transferAmount" placeholder="Amount"><br>

                <button type ="submit" name="submit"> Transfer </button>
            </form>

            <!-- Error handling -->
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyInput"){
                        echo "<p> Fill in all fields </p>";
                    }else if($_GET["error"] == "invalidAmount"){
                        echo "<p> Enter in a positive number </p>";
                    }else if($_GET["error"] == "exceedAmount"){
                        echo "<p> You do not have enough fund to transfer that amount </p>";
                    }else if($_GET["error"] == "sameID"){
                            echo "<p> Invalid transferer information </p>";
                    }else if($_GET["error"] == "stmtFailed"){
                        echo "<p> Error 404 Something went wrong ~ </p>";
                    }else if($_GET["error"] == "none"){
                        echo "<p> Transferred Successfully </p>";
                    } 
                }
            ?>
        </div>
        
<?php
    require "footer.php";
?>