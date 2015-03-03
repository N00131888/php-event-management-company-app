<?php

class EventTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getEvents() {
        // execute a query to get all events
        $sqlQuery = "SELECT * FROM event";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve users");
        }
        
        return $statement;
    }
    
    public function getEventById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM event WHERE eventID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve event");
        }
        
        return $statement;
    }
    
    public function insertEvent($t, $d, $sd, $ed, $ma, $c, $n, $e){
        $sqlQuery = "INSERT INTO event " .
                "(title, description, startDateTime, endDateTime, maxAttendees, cost, name, email)" .
                "VALUES (:title, :description, :startDateTime, :endDateTime, :maxAttendees, :cost, :name, :email)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "title" => $t,
            "description" => $d,
            "startDateTime" => $sd,
            "endDateTime" => $ed,
            "maxAttendees" => $ma,
            "cost" => $c,
            "name" => $n,
            "email" => $e
    );
        
    $status = $statement->execute($params);
    
    if(!$status){
        die("Could not insert event");
    }
    
    $id = $this->connection->lastInsertId();
    
    return $id;
    }
    public function deleteEvent($id) {
        $sqlQuery = "DELETE FROM event WHERE eventID = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateEvent($id, $t, $d, $sd, $ed, $ma, $c, $n, $e){
            $sqlQuery = 
                "UPDATE event SET " .
                "title = :title, " .
                "description = :description, " .
                "startDateTime = :startDateTime, " .
                "endDateTime = :endDateTime,  " .
                "maxAttendees = :maxAttendees, " .
                "cost = :cost, " .
                "name = :name, " .
                "email = :email " .
                "WHERE eventID = :eventID";
            
            $statement = $this->connection->prepare($sqlQuery);
            $params = array(
                "eventID" => $id,
                "title" => $t,
                "description" => $d,
                "startDateTime" => $sd,
                "endDateTime" => $ed,
                "maxAttendees" => $ma,
                "cost" => $c,
                "name" => $n,
                "email" => $e
            );
            
            $status = $statement->execute($params);
            
            return($statement->rowCount() == 1);
    }      
}