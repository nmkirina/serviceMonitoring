<?php
 
class Soap {
    
    const WSDL = 'http://82.138.16.126:8888/TaxiPublic/Service.svc?wsdl';
    const REQUEST = '<taxi:RegNum>ем33377</taxi:RegNum>';
    
    public $client;
    public $exception;


    public function connect() {
        try {
            $this->client = new SoapClient(self::WSDL);
        } catch (SoapFault $e) {
            
            $this->exception = $e;
            return false;
        }
        return true;
    }
    
    public function request() {
        return $this->client->GetTaxiInfos(self::REQUEST);
    }
}

