<?php
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','cataclysm');
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $conn= new PDO($dsn, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {
            if(isset($_POST["lat"])){
            $lat = trim($_POST["lat"]);
            $long = trim($_POST["long"]);
            $area = trim($_POST["area"]);
            $levels = trim($_POST["levels"]);
            $title = trim($_POST["title"]);
            $hazardDescription = trim($_POST['hazardDescription']);   
            $sql = "INSERT INTO hazards(Latitude,Longitude,Area,Title,Description,Levels)
                        VALUES('".$lat."','".$long."','.$area.','".$title."', '".$hazardDescription."','".$levels."')";
            $conn->exec($sql);
            }
        }
            catch(PDOException $e)
            {
                return $e->getMessage();
            }


            $result = $conn->query("SELECT * FROM hazards");
            $rows = $result->fetchAll();
            echo json_encode($rows);
