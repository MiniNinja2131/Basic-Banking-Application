<?php
    include_once 'header.php';
?>

        <div class="signupContainer">
            <h2> Sign Up </h2>
            <form class="signupForm" action="../includes/signup.inc.php" method="post">
                <input type="text" name="fName" placeholder="First Name">
                
                <input type="text" name="lName" placeholder="Last Name"><br>

                <label for="dobText"> Date of Birth </label>

                <input type="date" name="dob" placeholder="Date of Birth"><br>

                <input type="text" name="houseNo" placeholder="House Number">

                <input type="text" name="postcode" placeholder="Postcode"><br>

                <select name="country" placeholder="Country">
                    <option value="United Kingdom"> United Kingdom </option>
                    <option value="United State"> United State </option>
                    <option value="China"> China </option>
                    <option value="India"> India </option>
                    <option value="Russia"> Russia </option>
                    <option value="Kazakhstan"> Kazakhstan </option>
                </select>

                <input type="text" name="telephone" placeholder="Telephone/Phone number"><br>

                <input type="text" name="email" placeholder="Email Address">

                <input type="text" name="uid" placeholder="Username"><br>
                
                <input type="password" name="pwd" placeholder="Password">

                <input type="password" name="pwdRepeat" placeholder="Repeat Password"><br>

                <button type ="submit" name="submit"> Sign Up </button>
            </form>

            <!-- Error handling -->
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyInput"){
                        echo "<p> Fill in all fields </p>";
                    }else if($_GET["error"] == "invalidUID"){
                        echo "<p> Invalid Username. Can only contains letters and numbers </p>";
                    }else if($_GET["error"] == "invalidEmail"){
                        echo "<p> Invalid Email </p>";
                    }else if($_GET["error"] == "passwordDontMatch"){
                        echo "<p> Password doesn't match </p>";
                    }else if($_GET["error"] == "stmtFailed"){
                        echo "<p> Something went wrong, try again! </p>";
                    }else if($_GET["error"] == "usernameOrEmailTaken"){
                        echo "<p> Username or Email already taken </p>";
                    }else if($_GET["error"] == "none"){
                        echo "<p> You have signed up </p>";
                    } 
                }
            ?>
        </div>
    
<?php
    require "footer.php";
?>
  
