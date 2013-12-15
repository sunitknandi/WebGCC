<html>
<body>
<?php
$saving = $_REQUEST['saving'];
if ($saving == 1)
{ 
    $data = $_POST['data'];
    $unique = rand(1, 10000);
    $file = "text".$unique.".txt";

    $fp = fopen($file, "w") or die("<p>Couldn't open $file for writing!</p>");
    fwrite($fp, $data) or die("<p>Couldn't write values to file!</p>"); 

    fclose($fp); 
    echo "<p>Saved to $file successfully! You may now use $file as a text input for your program.</p>";
}
/* Code for taking text input. Similar to the first part of output.php */
?>

<p>
<form name="form1" method="post" action="?saving=1">
Write your text here:
<br>
<!-- Text box to take text input for program -->
<textarea name="data" cols="50" rows="10">
This is the file you can use to provide input to your program and later on open it inside your program to process the input.
</textarea>
<br>
<!-- Submit button goes here -->
<input type="submit" value="Save">
<br>
<br>
<!-- Link to close text input -->
<a href="output.php">Click here to close text input</a>
</form>
</p>

</body>
</html>