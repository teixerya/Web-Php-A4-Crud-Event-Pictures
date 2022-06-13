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
        $fname3 = $_GET["fname2"];
        $LName3 = $_GET["LName2"];
        $hobby3 = $_GET["hobby2"];
        $city3 = $_GET["city2"];
        $pnum3 = $_GET["pnum2"];
        $camp3 = $_GET["camp2"];
        $course3 = $_GET["course2"];        
        
        
        
        $array1 = array($sid3, $fname3, $LName3, $hobby3, $city3, $pnum3, $camp3, $course3);
        //call connect function
        $dbC = connect($hostname, $username, $password);
        //call insert function
        insertData($dbC, $array1);
         echo "$sid3, $fname3, $LName3, $hobby3, $city3, $pnum3, $camp3, $course3";
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
       

        function insertData($dbC1, $arrayValues) {
            $command = "INSERT INTO texRegistry(sid,fName,LName,hobby,city,phoneNum,campus,courseName)"
                    . "VALUES(?,?,?,?,?,?,?,?)";
            echo "<br> Hello $command";
            $stmt = $dbC1->prepare($command);
            $exeOK = $stmt->execute($arrayValues);
            if ($exeOK)
                echo "<br> Successfully inserted in DB";
            else
                echo "<br> Error executing insert command";
        }

//end of insert Data
        ?>


    </body>
</html>
