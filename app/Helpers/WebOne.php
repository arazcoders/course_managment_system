<?php

namespace App\Helpers;

use SoapClient;

class WebOne
{

    public string $userName="09012416225";
    public string $password="10181";
    public string $fromNumber="2100090119012";

    public  function  sendSMS(){

        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new SoapClient('http://payamakapi.ir/SendService.svc?wsdl', array('encoding'=>'UTF-8'));

        try {
            $parameters['userName'] = $this->userName;
            $parameters['password'] =$this->password;
            $parameters['fromNumber'] = $this->fromNumber;
            $parameters['toNumbers'] = array("09334020017");
            $parameters['messageContent'] = "";
            $parameters['isFlash'] = false;
            $recId = array(0);
            $status = 0x0;
            $parameters['recId'] = &$recId ;
            $parameters['status'] = &$status ;
            dd($sms_client->SendSMS($parameters)->SendSMSResult);
        }
        catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }


    }

    public  function getCredit(){

        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new SoapClient('http://payamakapi.ir/SendService.svc?wsdl', array('encoding'=>'UTF-8'));

        try {
            $parameters['userName'] = $this->userName;
            $parameters['password'] =$this->password;

            dd($sms_client->GetCredit($parameters));
        }
        catch (Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }



    }

    public  function  ippanel_send(){



    }

}
