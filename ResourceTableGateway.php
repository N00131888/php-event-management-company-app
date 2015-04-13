<?php

class ResourceTableGateway{

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getResources() {
        // execute a query to get all events
        $sqlQuery = "SELECT * FROM resource";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve resource");
        }
        //test 
        return $statement;
    }
    
    public function getResourceById($id) {
        
        $sqlQuery = "SELECT * FROM resource WHERE resourceID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve resource");
        }
        
        return $statement;
    }
    
    public function insertResource($n, $d, $s, $c){
        $sqlQuery = "INSERT INTO resource " .
                "(name, description, supplier, cost)" .
                "VALUES (:name, :description, :supplier, :cost";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "description" => $d,
            "supplier" => $s,
            "cost" => $c,               
        );

        $status = $statement->execute($params);

        if(!$status){
            die("Could not insert resource");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }
    
    public function deleteResource($id) {
        $sqlQuery = "DELETE FROM resource WHERE resourceID = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete resource");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateResource($id, $n, $d, $s, $c){
            $sqlQuery = 
                "UPDATE resource SET " .
                "name = :name, " .
                "description = :description, " .
                "supplier = :supplier, " .
                "cost = :cost,  " .                                             
                "WHERE resourceID = :resourceID";
            
            $statement = $this->connection->prepare($sqlQuery);
            $params = array(
                "resourceID" => $id,
                "name" => $n,
                "description" => $d,
                "supplier" => $s,
                "cost" => $c,                                 
            );
            
            $status = $statement->execute($params);
            
            return($statement->rowCount() == 1);
    }      
}