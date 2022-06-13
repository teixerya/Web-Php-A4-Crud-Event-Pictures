<?php
require ("connect.php");
?>

<html>
    <head>
        <title></title>

    </head>
    <body>
        <?php
        $sid3 = $_GET["sid2"];
        
        
        
        

        //call connect function
        $dbC = connect($hostname, $username, $password);
        //call insert function
        deleteData($dbC, $sid3);
         echo "$sid3";
        ?>

        <?php

        function connect($hname, $un, $pswd) {

            try {
                $dbConn = new PDO($hname,
                        $un, $pswd);
                echo "<h2> Connection successfull </h2>";
                return $dbConn;
            }

//        $e is the object of PDOException
            catch (PDOException $e2) {
                echo "Connection error ";
                echo $e2->getMessage();
            }
        }

// end of connect 
       

        function deleteData($dbC, $sid3) {
            $command = "DELETE FROM texRegistry WHERE sid=$sid3";
            echo "<br> Hello $command";
            $stmt = $dbC->prepare($command);
            $exeOK = $stmt->execute();
            if ($exeOK)
                echo "<br> Successfully deleted from DB";
            else
                echo "<br> Error with delete command";
        }
        


//end of insert Data
        ?>


    </body>
</html>
