<?php

if(isset($_POST['submit'])){
    $sum = array_sum($_POST['edible']);
     echo $sum;
}

?>

<form method = "post" action="index.php">
  <input type="checkbox" id="vehicle1" name="edible[]" value="1">
  <label for="vehicle1"> Answer 1</label><br>
  <input type="checkbox" id="vehicle2" name="edible[]" value="2">
  <label for="vehicle2"> Answer 2</label><br>
  <input type="checkbox" id="vehicle3" name="edible[]" value="3">
  <label for="vehicle3"> Answer 3</label><br><br>
  <input type="submit" name = "submit" value="Submit">
</form>