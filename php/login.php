<?php
    include_once 'header.php';
?>

    <div class="loginContainer">
        <h2> Login </h2>
        <form class="loginForm" action="../includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username/Email"><br>
            <input type="password" name="pwd" placeholder="Password"><br>
            <button type ="submit" name="submit"> Login </button>
        </form>
    </div>

<?php
    require "footer.php";
?>
  
