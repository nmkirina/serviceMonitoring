<?php

const EQUAL = 'equal';
const REQUEST_DATE = 'request_date';
const RESPONSE_DATE = 'response_date';
const TIME = 'time';
const RESPONSE_BODY = 'response_body';
    
class DataBase {
    const HOST_NAME = 'localhost';
    const DB_NAME = 'service';
    const DB_USER = 'root';
    const DB_PASS = '123456';
    const TABLE_NAME = 'compare';
    
    
    public $dataBase;
    public $exception;
    public $params;
    private $values;
    private $rows;
    private $insertValues;

    public function __construct () {
        
        $this->exception = false;
        $this->values = array(EQUAL, REQUEST_DATE, RESPONSE_DATE, 
            TIME, RESPONSE_BODY);
        $this->values();
    }
    
    public function connect (){
        try {
            $this->dataBase = new PDO('mysql:host=' . self::HOST_NAME . ';dbname=' . self::DB_NAME, 
                    self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            $this->exception = $e->getMessage();
            return false;
        };
        
        return true;
    }

    public function insert (){
        
        $sql = 'INSERT INTO ' . self::TABLE_NAME . ' ' . $this->rows . ' VALUES ' . $this->insertValues;
        $stmt = $this->dataBase->prepare($sql);
        foreach ($this->values as $value) {
            $stmt->bindParam(':' . $value, $this->params[$value]);
        }
        $stmt->execute();
    }
    
    public function fillParams ($compare, $requestDate, $responseDate, $interval, $body) {
        $this->params = [
            EQUAL => $compare,
            REQUEST_DATE => $requestDate,
            RESPONSE_DATE => $responseDate,
            TIME => $interval,
            RESPONSE_BODY => $body,
        ];
    }

    private function values (){
        
        $this->rows = '(';
        $this->insertValues = '(';
        foreach ($this->values as $value){
            $this->rows .= $value . ', ';
            $this->insertValues .= ':' . $value . ', ';
        }
        $this->rows = substr($this->rows, 0, -2);
        $this->insertValues = substr($this->insertValues, 0, -2);
        $this->rows .= ')';
        $this->insertValues .= ')';
    }
}

