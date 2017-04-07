<?php

const TAXI_NUM = 'ем33377';

class Soap {
    
    const WSDL = 'http://82.138.16.126:8888/TaxiPublic/Service.svc?wsdl';
    const REQUEST_OPEN = '<taxi:RegNum>';
    const REQUEST_CLOSE = '</taxi:RegNum>';


    public $client;
    public $exception;


    public function connect () {
        try {
            $this->client = new SoapClient(self::WSDL);
        } catch (SoapFault $e) {
            
            $this->exception = $e;
            return false;
        }
        return true;
    }
    
    public function request ($taxiNum) {
        return $this->client->GetTaxiInfos($this->createRequest($taxiNum));
    }
    
    private function createRequest ($taxiNum){
        return self::REQUEST_OPEN . $taxiNum . self::REQUEST_CLOSE;
    }
}

