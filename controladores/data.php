<?php
 require_once "./../modelos/dataModel.php";
class api{

   

     public function conexion(){

            $operation="getchallenge";
            $username="prueba";
            $curl = curl_init();

            $accessKey = Modelodata::conexion($operation, $username,$curl);
            if ($accessKey) {
                $sessionName = Modelodata::login($accessKey,$curl);

                if($sessionName){
                    $consulta = "select%20id,contact_no,lastname,createdtime%20from%20Contacts;";
                    $resultado = Modelodata::query($sessionName,$curl,$consulta);
                   $resultado = $resultado["result"];

                   
                   $datosJson = '{
		 
                    "data": [ ';
           
                    for($i = 0; $i < count($resultado); $i++){
      
                        /*=============================================
                       DEVOLVER DATOS JSON
                       =============================================*/
           
                       $datosJson	 .= '[
                                 "'.($i+1).'",
                                 "'.$resultado[$i]["id"].'",
                                 "'.$resultado[$i]["contact_no"].'",
                                 "'.$resultado[$i]["lastname"].'",
                            
                                 "'.$resultado[$i]["createdtime"].'"    
                               ],';
           
                    }
           
                    $datosJson = substr($datosJson, 0, -1);
           
                   $datosJson.=  ']
                         
                   }'; 
           
                   echo $datosJson;
                    }
                   
                   
                }

            }

          
        
               

 
}

$data = new api();
$data ->conexion();

?>