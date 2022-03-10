<form action="addCask.inc.php" method="post" enctype="multipart/form-data">

    <label for="NameOfCask">Name of Cask</label><br>
    <input type="text" id="NameOfCask" name="NameOfCask" value=""><br>

    <label for="CaskDescription">Cask Description</label><br>
    <input type="text" id="CaskDescription" name="CaskDescription" value=""><br>

    <label for="PercentageAvailable">Percentage Available</label><br>
    <input type="number" id="PercentageAvailable" name="PercentageAvailable" value=95 step="1"><br>

    <label for="WholeCaskPrice">Whole Cask Price</label><br>
    <input type="number" id="WholeCaskPrice" name="WholeCaskPrice" value="" step=".01"><br>

    <label for="OLA">OLA</label><br>
    <input type="number" id="OLA" name="OLA" value="" step=".01"><br>

    <label for="RLA">RLA</label><br>
    <input type="number" id="RLA" name="RLA" value="" step=".01"><br>

    <label for="PercentageAlcohol">Percentage Alchohol</label><br>
    <input type="number" id="PercentageAlcohol" name="PercentageAlcohol" value="" step=".01"><br>

    <label for="CaskType">Cask Type</label><br>
    <input type="text" id="CaskType" name="CaskType" value=""><br>

    <label for="WoodType">Wood Type</label><br>
    <input type="text" id="WoodType" name="WoodType" value=""><br>

    <label for="CaskImage">Cask Image</label><br>
    <input type="file" id="CaskImage" name="CaskImage" accept=".png, .jpg, .jpeg"><br>

    <label for="DistilleryName">Distilled At</label><br>
    <select name="DistilleryName">
        <?php
        define('SecurityCheck', TRUE);

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