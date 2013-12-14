<html>

<body>
<?php
$saving = $_REQUEST['saving'];
if ($saving == 1){ 
$data = $_POST['data'];
$args = $_POST['args'];
$stdin= $_POST['stdin'];
$unique = rand(1, 10000);
$file = "prog".$unique.".c";
$srcpath = "./".$file;
$executable = "./"."prog".$unique;
$fp = fopen($file, "w") or die("<p>Couldn't open $file for writing!</p>");
fwrite($fp, $data) or die("<p>Couldn't write values to file!</p>"); 

fclose($fp); 
echo "<p>Saved to $file successfully!</p>";

echo"<p>
Compiling the program $file<br>
Error list:<br>";
$output1 = shell_exec("g++ $srcpath -o $executable 2>&1");
echo "$output1";
echo "</p>";
echo "<p>Running the program:<br>";
$output2 = shell_exec("echo $stdin | $executable $args");
echo "$output2";
echo "<br>
</p>";

shell_exec("rm -rf $srcpath $executable");
}
else {
echo "<p>Enter your code in the left frame and hit run to display the output.</p>";
}
?>
</body>

</html>
