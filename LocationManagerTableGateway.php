<?php

class LocationManagerTableGateway{

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getLocationManagers() {
        // execute a query to get all events
        $sqlQuery = "SELECT * FROM locationManager";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve locations");
        }
        //test 
        return $statement;
    }
    
    public function getLocationManagerById($id) {
        
        $sqlQuery = "SELECT * FROM locationManager WHERE locationManagerID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve location manager");
        }
        
        return $statement;
    }
    
    public function insertLocationManager($vid, $fn, $ln, $pn, $e){
        $sqlQuery = "INSERT INTO locationManager " .
                "(venueID, fName, lName, phoneNum, email)" .
                "VALUES (:venueID, :fName, :lName, :phoneNum, :email)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "venueID" => $vid,
            "fName" => $fn,
            "lName" => $ln,
            "phoneNum" => $pn,
            "email" => $e,              
        );

        $status = $statement->execute($params);

        if(!$status){
            die("Could not insert location manager");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    
    public function deleteLocationManager($id) {
        $sqlQuery = "DELETE FROM locationManager WHERE locationManagerID = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete location manager");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateLocationManager($id, $vid, $fn, $ln, $pn, $e){
            $sqlQuery = 
                "UPDATE locationManager SET " .
                "venueID = :venueID, " .
                "fName = :fName, " .
                "lName = :lName, " .
                "phoneNum = :phoneNum,  " .
                "email = :email, " .                             
                "WHERE locationManagerID = :locationManagerID";
            
            $statement = $this->connection->prepare($sqlQuery);
            $params = array(
                "locationManagerID" => $id,
                "venueID" => $vid,
                "fName" => $fn,
                "lName" => $ln,
                "phoneNum" => $pn,
                "email" => $e,                         
            );
            
            $status = $statement->execute($params);
            
            return($statement->rowCount() == 1);
    }      
}