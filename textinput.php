<html>
<body>
<?php
$saving = $_REQUEST['saving'];
if ($saving == 1){ 
$data = $_POST['data'];
$unique = rand(1, 10000);
$file = "text".$unique.".txt";

$fp = fopen($file, "w") or die("<p>Couldn't open $file for writing!</p>");
fwrite($fp, $data) or die("<p>Couldn't write values to file!</p>"); 

fclose($fp); 
echo "<p>Saved to $file successfully! You may now use $file as a text input for your program.</p>";
}
?>

<p>
<form name="form1" method="post" action="?saving=1">
Write your text here:
<br>
<textarea name="data" cols="50" rows="10">
This is the file you can use to provide input to your program and later on open it inside your program to process the input.
</textarea>
<br>
<input type="submit" value="Save">
<br>
<br>
<a href="output.php">Click here to close text input</a>
</form>
</p>

</body>
</html>
