<!DOCTYPE html>
<html>
  <head>
    <title>Calculator</title>
  </head>


  <body>

    <h1>Sumit's Calculator</h1>
    <p>Three arguments are needed. First put the operation on the operation box. This can either be +, -, x, /, m. m is modulous. Then in the next two boxes, enter the two numbers you want to operate with.</p>

    <?php
       // define variables and set to empty values
       $arg1 = $arg2 = $arg3 = $output = $retc = "";

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $arg1 = test_input($_POST["arg1"]);
         $arg2 = test_input($_POST["arg2"]);
         $arg3 = test_input($_POST["arg3"]);
         exec("/usr/lib/cgi-bin/student4/calculator " . $arg1 . " " . $arg2 . " " . $arg3, $output, $retc); 
       }

       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Enter the operation you want to do. Either +, -, x, /, or m <br><input type="text" name="arg1"><br><br>
      Enter the first number: <br><input type="text" name="arg2"><br><br>
      Enter the second number: <br><input type="text" name="arg3"><br><br>
      <input type="submit">
    </form>

    <?php
       echo "<h2>Calculator Input:</h2>";
       echo $arg1;
       echo "<br>";
       echo $arg2;
       echo "<br>";
       echo $arg3;
       echo "<br>";
       
       echo "<h2>C Calculator program Output:</h2>";
       echo "<p>Answer: </p>";
      foreach ($output as $line) {
         echo $line;
         echo "<br>";
       }
       
       echo "<h2>C Program Return Code:</h2>";
       echo $retc;
      
     ?>
    
  </body>
</html>
