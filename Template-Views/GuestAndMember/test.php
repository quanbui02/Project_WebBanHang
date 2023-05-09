<?php 
if(empty($_POST["options"])){
    $valueOption = "Not choosen";
}else{
    $valueOption = $_POST["options"];
}
?>
<html>
    <body>
        <form action="test.php" method = "post">
            <label for="">Choose name:</label>
        <select name="options">
            <option value="1"> Do the thao</option>
            <option value="2">Do boi</option>
            <option value="3">Do lot</option>
        </select>
        <input type="submit">
        </form>
        <?php 
           echo "ID vua chon la: ".$valueOption;
        ?>
    </body>
</html>