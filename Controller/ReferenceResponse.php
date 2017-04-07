<?php

const REFERENCE = '../reference.xml';

class ReferenceResponse {
    
    public $referenceXml;
    public $options;
    public $methods;
    public $currentResponse;
    public $responseBody;


    public function __construct ($filename) {
        $this->referenceXml = $this->readFromFile($filename);
        $this->options = array ('LicenseNum', 'LicenseDate', 'Name', 'OgrnNum', 
            'OgrnDate', 'Brand', 'Model', 'RegNum', 'Year', 'BlankNum', 'Info');
        $this->methods = array('GetTaxiInfosResult', 'TaxiInfo');
        $this->reference = $this->referenceXml;
    }
    
    public function compare ($currentResponse) {
        
        $this->currentResponse = $currentResponse;
        return (($this->issetMethod()) && ($this->issetOptions())) + 0;
    }
    
    private function issetMethod () {
        
        foreach ($this->methods as $method) {
            if (isset($this->currentResponse->$method)) {
                $this->currentResponse = $this->currentResponse->$method;
                $this->reference = $this->reference->$method;
            } else {
                return false;
            }
        }
        return true;
    }

    private function issetOptions () {
        
        foreach ($this->options as $option) {
           
            if (!(isset($this->currentResponse->$option)) ||
                ($this->currentResponse->$option . '' != $this->reference->$option . '')) {
                return false;
            } 
        }
        return true;
    }
    private function readFromFile($filename) {
        $content = file_get_contents($filename);
        return new SimpleXMLElement($content);
    }
}

