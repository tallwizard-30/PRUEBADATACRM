<?php

class Modelodata{

   static public function conexion($operation,$username,$curl){

  
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation='.$operation.'&username='.$username.'',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $decode = json_decode($response,true);
    $token= $decode["result"];
    $token=$token["token"];
      $accessKey=md5($token."3DlKwKDMqPsiiK0B");

      

      return $accessKey;

    
    }

    static public function login($accessKey,$curl){

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'operation=login&username=prueba&accessKey='.$accessKey.'',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/x-www-form-urlencoded'
            ),
          ));
          
          $response = curl_exec($curl);
          
          curl_close($curl);
          
          
          $decode = json_decode($response,true);
          $sessionName = $decode["result"];
          $sessionName =  $sessionName["sessionName"];
          return  $sessionName;
          


    }

    static public function query($sessionName,$curl,$Consulta){

      

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=query&sessionName='.$sessionName.'&query='.$Consulta.'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
          ));
          
          $response = curl_exec($curl);
          
          curl_close($curl);
          $response = json_decode($response,true);
         return  $response;
    }

   
} ?>