<?php

use LDAP\Result;

 require_once "./../modelos/dataModel.php";
class Total{


    function mostrarTotal(){
        $operation="getchallenge";
        $username="prueba";
        $curl = curl_init();

        $accessKey = Modelodata::conexion($operation, $username,$curl);
        if ($accessKey) {
            $sessionName = Modelodata::login($accessKey,$curl);

            if($sessionName){
                $consulta = "select%20count(*)from%20Contacts;";
                $resultado = Modelodata::query($sessionName,$curl,$consulta);
               $resultado = $resultado["result"];
                    
              echo json_encode($resultado);
            }
        }
    }
}

$total = new Total();
$total->mostrarTotal();