<html>

<body>
<?php
$saving = $_REQUEST['saving']; //check whether a saving request is provided
if ($saving == 1) //do if saving request is provided
{ 
    $data = $_POST['data']; //extract the code from the form into a variable
    $args = $_POST['args']; //extract the command-line arguments from the form into a variable
    $stdin= $_POST['stdin']; //extract the standard input from the form into a variable
    $unique = rand(1, 10000); //generate a random number for the current execution session
    $file = "prog".$unique.".c"; //declare the file name
    $srcpath = "./".$file; //declare the source file path
    $executable = "./"."prog".$unique.".bin"; //declare the executable path
    $fp = fopen($file, "w") or die("<p>Couldn't open $file for writing!</p>"); //open file for writing
    if(!fwrite($fp, $data)) //write the code to file
    {
        shell_exec("rm -rf $srcpath");
        die("<p>Couldn't write values to file!</p>"); //clean up and exit if unable to write
    }

    fclose($fp); //close and save the file
    echo "<p>Saved to $file successfully!</p>"; //notify the user that file has been saved

    echo"<p>Compiling the program $file<br>"; 
    $output1 = shell_exec("g++ $srcpath -o $executable 2>&1");
    /* try compiling the program with GCC and collect errors and warnings */
    if($output1!=NULL)
    {
        echo "Error list:<br><pre>$output1</pre>"; //display the errors and warnings if present
    }
    echo "</p>";
    if(file_exists($executable)) //check if executable exists
    {
        echo "<p>Running the program:<br>";
        $output2 = shell_exec("echo $stdin | $executable $args 2>&1");
        /* execute the file providing the necessary inputs and collect the output */
        echo "<pre>$output2</pre>";
        echo "<br></p>";
    }
    
    shell_exec("rm -rf $srcpath $executable"); //clean up the session files
}
else //do if saving request is not provided
{
    echo "<p>Enter your code in the left frame and hit run to display the output.</p>";
    /* tell the user to  fill up the form on the left frame */
}
?>
</body>

</html>