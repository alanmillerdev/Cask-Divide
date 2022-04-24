<?php

$mysqli = NEW MySQLi('localhost','root','QvbtMG]g@qAPD]S4','caskdivide');
$resultSet = $mysqli->query("SELECT DistilleryName FROM distillery");
?>
<div class="col-md-6">
    <label for="DistilleryName" class="labels">Choose A Distillery</label>
    <select id=DistilleryName name="DistilleryName" class="form-control">
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $DistilleryName = $rows['DistilleryName'];
        echo "<option value='$DistilleryName'>$DistilleryName</option>";
    }
    ?>
    </select>
</div>