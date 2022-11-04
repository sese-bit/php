<?php 
    $sodasArray = array('Coke' => 15, 'Sprite' => 20, 'Royal' => 20, 'Pepsi' => 15, 'Moutain Dew' => 20);
    $sizesArray = array('Regular' => 'Regular', 'Up-size (add ₱5)' => 'Up-size', 'Jumbo (add ₱10)' => 'Jumbo');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendo Machine</title>
</head>
<body>

    <h3>Vendo Machine</h3>
    <form method="post">

        <fieldset style="width: 365px;">
        
            <legend>Products</legend>
            <?php 
                if (isset($sodasArray)){
                    foreach ($sodasArray as $sodasKey => $sodasValue) {
                        echo "<input type='checkbox' name='sodaCheck[". $sodasKey ."]' value='". $sodasValue ."'>
                        <label>". $sodasKey ." - ₱" . $sodasValue ."</label><br>";
                    }
                }

            ?>
        </fieldset>

        <fieldset style="display: inline-block;">

            <legend>Options</legend>
            <label for="sizeSelect">Size</label>
            <select name="sizeSelect" id="sizeSelect">
                
                <?php 
                    if (isset($sizesArray)) {
                        foreach ($sizesArray as $sizesKey => $sizesValue) {
                            echo "<option value'" . $sizesValue ."'>". $sizesKey ."</option>";
                        }
                    }
                ?>
            </select>

            <label for="numQuatity">Quantity</label>
            <input type="number" name="numQuantity" id="numQuatity" min="0" max="100" value="0">

            <button type="submit" name="btnSubmit">Check Out</button>
        </fieldset>
    </form>

    <?php
        if (isset($_POST['$btnSubmit'])) {
            
            if (isset($_POST['sodaCheck']) && isset($_POST['$sizeSelect'])) {

                $quantity = $_POST['numQuantity'];
                $size = $_POST['sizeSelect'];
                $pop = $_POST['sodaCheck'];


                if ($quantity == 1) {
                    $term = "piece";
                }
                else{
                    $term = "pieces";
                }

                if ($size == 'Regular') {
                    $addOn = 0;
                }
                elseif ($size == 'Up-size') {
                    $addOn = 5;
                }
                elseif ($size == 'Jumbo') {
                    $addOn = 10;
                }

                echo "<h3>Purchase Summary</h3>";
                
                foreach ($pop as $popKey => $popValue) {
                    echo
                    "<ul>
                        <li>". $quantity ." ". $term ." of ". $size ." ". $popKey ."amounting to ₱". $totalVal = 
                        intval($popValue) * intval($quantity) + ($addOn * intval($quantity)) .
                        "</li>
                    </ul>";
                $itemsTotal = ($quantity * sizeof($pop));
                $grandTotal = (array_sum($pop) + $addOn * $quantity) * $quantity;

                echo "<label><b>Total number of items: </label>". $itemsTotal ."<br>";
                echo "<label><b>Total amount: </label>". $grandTotal;

                }
            }
            else {
                echo "No selected product; Please try again.";
                
            }   
        }
    ?>

</body>
</html>