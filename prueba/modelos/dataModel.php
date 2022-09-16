<?php

class Modelodata{
//se instancia la funcion conexion para la obtencion del token
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
//se decodifica la respuesta del servidor
    $decode = json_decode($response,true);
    $token= $decode["result"]["token"];
   
    //se se cifra el token en formato md5 
      $accessKey=md5($token."3DlKwKDMqPsiiK0B");

      
//se retorna el accessKey para el login 
      return $accessKey;

    }

   //se instancia la funcion login para la obtencion del sessionNamede la api
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
          
          //se decodifica la respuesta del servidor
          $decode = json_decode($response,true);

          // se guarda en una variable   sessionNamede que nos retorna el servidor
          $sessionName = $decode["result"]["sessionName"];
          //se retorna el sessionNamede para la obtencion de la informacion
          return  $sessionName;
          


    }

    
   //se instancia la funcion query para la obtencion de la informacion del api

    static public function query($sessionName,$curl){

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=query&sessionName='.$sessionName.'&query=select%20id,contact_no,lastname,createdtime%20from%20Contacts;',
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

           //se decodifica la respuesta del servidor
          $response = json_decode($response,true);
            //se retorna la respuesta der servidor para la obtencion de la informacion
         return  $response;
    }

   
} ?>