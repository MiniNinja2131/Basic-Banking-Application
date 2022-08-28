<?php
    include_once 'header.php';
?>

        <div class="accountContainer">
            <h2> Interest Calculation </h2>
            <label>Calculate interest for how many years?</label>
            <select id="year" name="year" onchange="test(this);">
                <option selected="selected" value="0"> 0 </option>
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
                <option value="6"> 6 </option>
                <option value="7"> 7 </option>
                <option value="8"> 8 </option>
                <option value="9"> 9 </option>
                <option value="10"> 10 </option>
            </select>
            <table>
                <tr>
                    <td> Balance Before Interest </td>
                    <td> Balance After Interest </td>
                </tr>
                <?php
                    $balance = $_SESSION["balance"];
                ?>

                <tr>
                    <input type="hidden" value="<?= htmlspecialchars($balance) ?>">
                    <?php
                        echo "<td>" .$_SESSION["balance"]. "</td>";
                        echo "<td>$<span class='amount' id='newBal'>" .$_SESSION["balance"]. "</span> </td>";
                    ?>

                </tr>
            </table>
            
        </div>

<?php
    require "footer.php";
?>