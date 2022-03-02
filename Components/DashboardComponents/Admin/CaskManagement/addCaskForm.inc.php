<form action="addCask.inc.php" method="post">

    <label for="NameOfCask">Name of Cask</label><br>
    <input type="text" id="NameOfCask" name="NameOfCask" value=""><br>

    <label for="PercentageAvailable">Percentage Available</label><br>
    <input type="text" id="PercentageAvailable" name="PercentageAvailable" value="95"><br>

    <label for="WholeCaskPrice">Whole Cask Price</label><br>
    <input type="number" id="WholeCaskPrice" name="WholeCaskPrice" value=""><br>

    <label for="OLA">OLA</label><br>
    <input type="number" id="OLA" name="OLA" value=""><br>

    <label for="RLA">RLA</label><br>
    <input type="number" id="RLA" name="RLA" value=""><br>

    <label for="PercentageAlcohol">Percentage Alchohol</label><br>
    <input type="number" id="PercentageAlcohol" name="PercentageAlcohol" value=""><br>

    <label for="CaskType">Cask Type</label><br>
    <input type="text" id="CaskType" name="CaskType" value=""><br>

    <label for="WoodType">Wood Type</label><br>
    <input type="text" id="WoodType" name="WoodType" value=""><br>

    <label for="DistilleryName">Distilled At</label><br>
    <select name="DistilleryName">
        <?php

        include '../../../../Database/dbConnect.inc.php';

        $dbConnection = Connect();

        $result = mysqli_query($dbConnection, "SELECT DistilleryName FROM `distillery`");

        while ($row = mysqli_fetch_array($result)) {
            echo "<option>" . $row["DistilleryName"] . "</option>";
        }
        ?>
    </select><br><br>
    <input type="submit" value="Submit">
</form>