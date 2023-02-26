<?php

    class Database{
        private $PDOLocal;
        private $user = "root";
        private $password = "";
        private $server = "mysql:host=127.0.0.1;bdname=bd_cursoweb;charset=utf8";

        public function conectarBD(){
            try{
                $this-> PDOLocal = new PDO($this->server,$this->user,$this ->password);
            }
            catch(PDOException $e){
                echo "Error de conexión.";
                echo $e->getMessage();

            }
        }

        
        public function ejecutarSQL($query){
            try{
                $this->PDOLocal->query($query);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }

        }

        public function desconectarBD(){
            try{
                $this->PDOLocal = null;
            }
            catch(PDOException $e){
               
                echo $e->getMessage();
            }
        }


        public function seleccionar($query){
            try{
                 $resultado = $this->PDOLocal->query($query);
                 $renglon = $resultado->rowCount();

                 if($renglon > 0){
                    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                        $Datos[]=$row;
                    }
                 }else{
                    $Datos[]=null;
                 }

                 return $Datos;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

    }

       //$db = new Database();
       //$db -> conectarBD();
       //$resp = $db -> seleccionar("USE bd_cursoweb");
       //$resp = $db -> seleccionar("SELECT * FROM peliculas");
       //print_r($resp);


?>
