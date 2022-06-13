<?php
require("connect.php");
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        $dbC = connect($hostname, $username, $password);

        selectData($dbC, $id1);
        ?>
        <?php

        function connect($hname, $un, $pswd) {
        try {
        $dbConn = new PDO($hname, $un, $pswd);
//        echo "<h2> Connection successfull</h2>";
        return $dbConn;
        } catch (PDOException $e1) {
//        echo "<br>Connection error ";
        echo $e1->getMessage();
        }
        }

        //end of connect

    function selectData($dbC) {
        $command = "SELECT A.fileName, B.name 
        From image A, holiday B
        WHERE A.holidayId = B.id" ;
        
        
        $stmt = $dbC->prepare($command);
        $exeOk = $stmt->execute();
        
        if ($exeOk) {
//        echo "records in db as displayed under<br>";
        
        while ($row = $stmt->fetch()) {
        echo "For ".$row[name]. " ";
        echo  "<img src=images\\" .$row[fileName]."    width='100px'> ";
        echo " <br><br><br>" ;
        
        }//end of while
        } else
        echo "error executing query";
        }
        

        //end of select query
        ?>
    </body>
</html>

