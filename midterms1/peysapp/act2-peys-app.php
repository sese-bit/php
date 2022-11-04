<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pays app</title>
</head>
<body>
    <h1>Peys App</h1>
    <form  method ="get">
    <label for="imgSize">Select Photo Size:</label>
     <input type="range" id="imgSize" name="imgSize"  min="0" max="100" step="10"><br>
    
    <label for="bColor">Select Border Color:</label>
    <input type="color" name="bdColor" id="bdColor"><br>
    
    <input type="submit" name="btnSave" value="Process"><br>
    
    <?php
        if(isset($_GET['btnSave'])){
            $imageRangeSize = 30;
            $imageRangeSize = $_GET['imgSize'];
            $border = $_GET['bdColor'];
        }
    ?>
    <br>
    <img src="xxx.jpg" style="width: <?php echo $imageRangeSize . '%'; ?>;border-color: <?php echo $border; ?>;border-width: 5px; border-style: solid;">

    </form>

</body>
</html>