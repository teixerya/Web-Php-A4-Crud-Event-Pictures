<?php
    require ("connect.php");
?>

<?php
        $dbC=connect($hostname,$username,$password);
        $sid3= (int)$_GET["sid2"];
        $hob3=$_GET["hob2"];
        
        echo "$sid3 and $hob3";
        
        updateData($dbC,$sid3,$hob3);
        ?>
        
        <?php
                function connect($hname, $un, $pswd) {

            try {
                $dbConn = new PDO($hname,$un, $pswd);
                echo "<h2> Connection successfull </h2>";
                return $dbConn;
            }

//        $e is the object of PDOException
            catch (PDOException $e2) {
                echo "Connection error ";
                echo $e2->getMessage();
            }
        }// end of connect
        
        
        function updateData($dbC,$sid3,$hob3){
            $query="UPDATE texRegistry SET hobby='".$hob3."'".
                        "WHERE sid=$sid3";
             echo"$query";           
            $stmt =$dbC->prepare($query);
            $exeOK=$stmt->execute();
            if($exeOK){
                echo "Successfully updated to DB";
            }
            else {
                echo " error executing UPDATE query";
                }
                
        }
        
        ?>
