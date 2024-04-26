<!DOCTYPE html> 
<html> 
    <head> 
        <title>showlist</title> 
        <meta charset="utf-8"> 
        <link rel="stylesheet" type="text/css" href="Main.css"> 
        <link rel="icon" href="Images/notebook.png" type="image/x-icon"> 
        <script src="Main.js"></script> 
    </head> 
        <body  style ="background-image: url(Images/P5.jpg); height: 10%;"> 
        <img src="Images/book.png" style="margin-left:47%; margin-top:1%;"> 
            <form style = "margin-left:21%; margin-top:2%;" method = "POST"> 
            <label><b>Book ISPN</b></label> 
            <input style = "marginleft:9.5%;"  type = "number"  placeholder="Via ISPN" name = "ISPN"> 
            <br> 
            <br> 
            <label><b>Author</b></label>             <input style = "marginleft:12%;" type = "text"  placeholder="Via Author" name = "AUTHOR"> 
            <br> 
            <br> 
            <label><b>Number of copies</b></label> 
            <input type = "number"  placeholder="Via number of Copies" name = "Nu m"> 
            <br> 
            <br> 
            <label><b>Publishinh year</b></label> 
            <input style = "marginleft:5%;" type = "number" name = "Pub"  placeholder="Via Publishing year"> 
            <br> 
            <br> 
            <button style = "marginleft:30%;" type = "submit" name = "Show">Show</button> 
            <br> 
            <br> 
            </form>         <?php
            if (array_key_exists("Show", $_POST)) {
                Show();
            }
            function Show()
            {
                $servername = "localhost";
                $username = "Abdelrahman";
                $password = "abdo11";
                $dbname = "library";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $ISPN = $_POST["ISPN"];
                $author = $_POST["AUTHOR"];
                $Pub = $_POST["Pub"];
                $Num = $_POST["Num"];
                $sql = mysqli_query(
                    $conn,
                    "SELECT * FROM  book WHERE Boo kISPN = '$ISPN' OR Author = '$author' OR Publishingyear = '$Pub' OR NumofCopies ='$Num' "
                );
                echo "<table  border = 1 cellpadding=1 width= 100% >";
                echo "<tr>";
                echo "<th>" . "BookName" . "</th>";
                echo "<th>" . "BookISPN" . "</th>";
                echo "<th>" . "Author" . "</th>";
                echo "<th>" . "Publishing Year" . "</th>";
                echo "<th>" . "Number of copies" . "</th>";
                echo "</tr>";
                foreach ($sql as $rows) {
                    echo "<tr><td>" .
                        $rows["BookName"] .
                        "</td><td>" .
                        $rows[" BookISPN"] .
                        "</td><td>" .
                        $rows["Author"] .
                        "</td><td>" .
                        $rows["Publishingyear"] .
                        "</td><td>" .
                        $rows["NumofCopies"] .
                        "</td></tr>";
                }
                echo "</table>";
            }
            ?> 
        </body> 
</html> 
