<?php
    include_once 'header.php';
?>

    <div class="signupContainer">
        <h2> Sign Up </h2>
        <form class="signupForm" action="includes/signup.inc.php" method="post">
            <input type="text" name="fName" placeholder="First Name"><br>

            <input type="text" name="lName" placeholder="Last Name"><br>

            <input type="date" name="dob" placeholder="Date of Birth"><br>

            <input type="text" name="houseNo" placeholder="House Number"><br>

            <input type="text" name="postcode" placeholder="Postcode"><br>

            <input type="text" name="country" placeholder="Country"><br>

            <input type="text" name="telephone" placeholder="Telephone/Phone number"><br>

            <input type="text" name="email" placeholder="Email Address"><br>

            <input type="text" name="uid" placeholder="Username"><br>
            
            <input type="password" name="pwd" placeholder="Password"><br>

            <input type="password" name="pwdRepeat" placeholder="Repeat Password"><br>

            <button type ="submit" name="submit"> Sign Up </button>
        </form>
    </div>

<?php
    require "footer.php";
?>
  
