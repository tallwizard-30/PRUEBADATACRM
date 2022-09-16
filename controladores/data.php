<?php
 require_once "./../modelos/dataModel.php";
class api{

   

     public function conexion(){

            $operation="getchallenge";
            $username="prueba";
            $curl = curl_init();
          /*=============================================
                   instanciamos los modelos
           =============================================*/
            $accessKey = Modelodata::conexion($operation, $username,$curl);
            if ($accessKey) {

                //instanciamos la funcion de login para verificarnos en la api
                $sessionName = Modelodata::login($accessKey,$curl);

                if($sessionName){
                     //instanciamos la funcion de query para obtener los datos
                    $resultado = Modelodata::query($sessionName,$curl);
                   $resultado = $resultado["result"];

                   //creamos la variable para generar el JSON
                   $datosJson = '{
		 
                    "data": [ ';
           
                    for($i = 0; $i < count($resultado); $i++){
      
                        /*=============================================
                       DEVOLVER DATOS JSON
                       =============================================*/
           
                       $datosJson	 .= '[
                                
                                 "'.$resultado[$i]["id"].'",
                                 "'.$resultado[$i]["contact_no"].'",
                                 "'.$resultado[$i]["lastname"].'",
                            
                                 "'.$resultado[$i]["createdtime"].'"    
                               ],';
           
                    }
           
                    $datosJson = substr($datosJson, 0, -1);
           
                   $datosJson.=  ']
                         
                   }'; 
           //se retorna el js para cargar la data al dtatable
                   echo $datosJson;
                    }
                   
                   
                }

            }

          
        
               

 
}

//instanciamos el objeto 
$data = new api();
$data ->conexion();

?>