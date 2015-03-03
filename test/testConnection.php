<?php

$host = "daneel";
$database = "john";
$username = "john";
$password = "secret";

$dsn = "mysql:host=" . $host . ";dbname=" . $database;
$connection = new PDO($dsn, $username, $password);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($connection) {
            echo "Connected to database";
            
            $sqlQuery = "SELECT * FROM users";
            $statement = $connection->query($sqlQuery);
            if (!$statement) {
                echo "Could not retrieve users";
            }
            else {
                echo '<table>';
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '<td>' . $row['role'] . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                echo '</table>';
            }
        }
        else {
            echo "Not connected to database";
        }
        ?>
    </body>
</html>
