<?php

class LocationTableGatewayTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getLocations() {
        // execute a query to get all events
        $sqlQuery = "SELECT * FROM location";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve locations");
        }
        
        return $statement;
    }
    
    public function getLocationById($id) {
        
        $sqlQuery = "SELECT * FROM location WHERE locationID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve location");
        }
        
        return $statement;
    }
    
    public function insertLocation($n, $a, $lma, $mn, $me, $mm){
        $sqlQuery = "INSERT INTO location " .
                "(name, address, locMaxAttendees, manName, manEmail, manMobile)" .
                "VALUES (:name, :address, :locMaxAttendees, :manName, :manEmail, :manMobile)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "address" => $a,
            "locMaxAttendees" => $lma,
            "manName" => $mn,
            "manEmail" => $me,
            "manMobile" => $mm            
        );

        $status = $statement->execute($params);

        if(!$status){
            die("Could not insert location");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    
    public function deleteLocation($id) {
        $sqlQuery = "DELETE FROM location WHERE locationID = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete location");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateLocation($id, $n, $a, $lma, $mn, $me, $mm){
            $sqlQuery = 
                "UPDATE location SET " .
                "name = :name, " .
                "address = :address, " .
                "locMaxAttendees = :locMaxAttendees, " .
                "manName = :manName,  " .
                "manEmail = :manEmail, " .
                "manMobile = :manMobile, " .             
                "WHERE eventID = :eventID";
            
            $statement = $this->connection->prepare($sqlQuery);
            $params = array(
                "locationID" => $id,
                "name" => $n,
                "address" => $a,
                "locMaxAttendees" => $lma,
                "manName" => $mn,
                "manEmail" => $me,
                "manMobile" => $mm              
            );
            
            $status = $statement->execute($params);
            
            return($statement->rowCount() == 1);
    }      
}