<?php
class Event {
private $title;
private $description;
private $startDateTime;
private $endDateTime;
private $maxAtendees;
private $cost;
private $name;
private $email;

public function __construct($t, $d, $sd, $ed, $ma, $c, $n, $e){
    $this->title = $t;
    $this->description = $d;
    $this->startDateTime = $sd;
    $this->endDateTime = $ed;
    $this->maxAtendees = $ma;
    $this->cost = $c;
    $this->name = $n;
    $this->email = $e;
}
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getStartDateTime() { return $this->startDateTime; }
    public function getEndDateTime() { return $this->endDateTime; }
    public function getMaxAtendees() { return $this->maxAtendees; }
    public function getCost() { return $this->cost; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }


}


