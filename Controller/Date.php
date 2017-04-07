<?php

class Date {
    
    public $requestDate;
    public $responseDate;
    public $interval;


    public function start () {
        $this->requestDate = date('Y-m-d H:i:s');
    }
    
    public function end () {
        $this->responseDate = date('Y-m-d H:i:s');
    }
    
    public function difference () {
        $startDateObj = date_create($this->requestDate);
        $endDateObj = date_create($this->responseDate);
        $diffObj = $startDateObj->diff($endDateObj);
        $this->interval = $diffObj->s;
    }
}
