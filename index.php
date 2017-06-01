<?php
/*
 * File:   readFileFixed.php
 * Author: Tiffany Mathers
 * Purpose: Improper Limitation of a Pathname to a Restricted Directory - fixed
 * Created on November 19, 2016, 10:42 PM
 */
?>

<html>
    <head>
        <title>File Reader</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">      
    </head>
    <body>
        <div class="jumbotron">
            <div class="container">
                <table>
                    <form action="<?php echo htmlentities($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8") ?>" method="post" enctype="multipart/form-data">
                        <tr>
                            <td colspan="3"><h1><center>File Reader<br></center></h1></td>
                        </tr>
                        <tr>
                            <td>Enter the name of a text file to read, followed by .txt :</td>
                            <!-- input name of text file -->
                            <td><input type="text" name="filename" id="filename"></td>
                            <td><input type="submit" value="Read File" name="submit"></td>
                    </form>
                    </tr>
                </table>

                <?php
                // only run php if the submit button is pressed
                if (isset($_POST["submit"])) {
                    // insert basename() method to return only the trailing name of path
                    //$name=$_POST['filename'];
                    $name = basename(($_POST['filename']));
                    // read files of documents in the File_Readerdirectory matching user input
                    $filename = "C:/xampp/htdocs/File_Reader/" . $name;

                    $fileType = pathinfo($filename, PATHINFO_EXTENSION);

                    $ext_type = array('txt');
                    if (in_array($fileType, $ext_type)) {
                        //check if the file exists before opening
                        if (file_exists($filename)) {
                            $fileHandler = fopen($filename, "r");
                            while (!feof($fileHandler)) {
                                echo htmlentities(fgets($fileHandler), ENT_QUOTES, "utf-8") . "<br />";
                            }
                            fclose($fileHandler);
                        } else {
                            echo "Please select a file.";
                        }
                    } else {
                        echo "Not a text file.";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
