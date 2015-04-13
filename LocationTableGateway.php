<?php

class LocationTableGateway{

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    //s
    public function getLocations() {
        $sqlQuery =
                "SELECT l.*, lm.lName AS manName
                 FROM location l
                 LEFT JOIN locationManager lm ON lm.venueID = l.locationID";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve programmers");
        }

        return $statement;
    }
    
    public function getLocationManagerByLocationID($venueID) {
        // execute a query to get all programmers
        $sqlQuery =
                "SELECT l.*, lm.lName AS manName
                 FROM location l
                 LEFT JOIN locationManager lm ON lm.venueID = l.locationID
                 WHERE lm.venueID = :locationIDId";

        $params = array(
            'venueID' => $venueID
        );
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve locations");
        }

        return $statement;
    }

    public function getLocationsByLocationID($locationID) {
        $sqlQuery =
                "SELECT l.*, lm.lNname AS manName
                 FROM location l
                 LEFT JOIN locationManager lm ON lm.venueID = l.venueID
                 WHERE l.locationID = :venueID";

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

    public function insertLocation($n, $a, $lma, $mn, $me, $mm) {
        $sqlQuery = "INSERT INTO location " .
                "(name, address, locMaxAttendees, manName, manEmail, manMobile) " .
                "VALUES (:name, :address, :locMaxAttendees, :manName, :manEmail, :manMobile)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "address" => $a,
            "locMaxAttendees" => $lma,
            "manName" => $mn,
            "manEmail" => $me,
            "manMobile" => $mm,            
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert location");
        }

        $id = $this->connection->lastInsertId();

        return $locationID;
    }

    public function deleteLocation($locationID) {
        $sqlQuery = "DELETE FROM location WHERE locationID = :locationID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "locationID" => $locationID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete location");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateLocation($lid, $n, $a, $lma, $mn, $me, $mm) {
        $sqlQuery =
                "UPDATE location SET " .
                "name = :name, " .
                "address = :address, " .
                "locMaxAttendees = :locMaxAttendees, " .
                "manName = :manName, " .
                "manEmail = :manEmail, " .
                "manMobile = :manMobile, " .                
                "WHERE locationID = :locationID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "locationID" => $lid,
            "name" => $n,
            "address" => $a,
            "locMaxAttendees" => $lma,
            "manName" => $mn,
            "manEmail" => $me,
            "manMobile" => $mm,            
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}