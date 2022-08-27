<?php
    include_once 'header.php';
?>
        <div class="accountContainer">
            <h2> User's Action </h2>
            <div class="userAction">
                <a href="checkBalance.php">
                    <button> Check Balance </button>
                </a><br>

                <a href="deposit.php">
                    <button> Make Deposit </button>
                </a><br>

                <a href="transfer.php">
                    <button> Transfer Money </button>
                </a><br>

                <a href="withdraw.php">
                    <button> Withdraw Money </button>
                </a><br>

                <a href="transactionHistory.php">
                    <button> View Transaction History </button>
                </a><br>

                <a href="interest.php">
                    <button> Calculate Interest </button>
                </a><br>
            </div>
        </div>
<?php
    require "footer.php";
?>
  