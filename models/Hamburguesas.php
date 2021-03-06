<?php

    //models/Hamburguesas.php

    //intentar ver si la herencia funciona

    class Hamburguesas extends Model{ //representa a todas las hamburguesas.

            public function GetMenu(){
                $this->db->query("select * from hamburguesa");
                return $this->db->fetchAll();
            }

            public function CrearHamburguesa($nombre,$descripcion,$precio,$imagen){

                if($this->validarNombre($nombre));
                if($this->validarDescripcion($descripcion)); //modificar para la descripcion
                if($this->validarNumero($precio));
        
                $this->db->query("INSERT INTO hamburguesa (nombre,descripcion,precio,imagen) VALUES ('$nombre','$descripcion','$precio','$imagen'); ");
                
            }
        
            public function validarNombre($string){
                
                if(!isset($string)) throw new validarExcepcion('error1- no existe contenido en el nombre');     //validar que exista
                if(strlen($string) <3) throw new validarExcepcion('error2- la extencion del nombre es menor a 3 caracteres');  //validar tamaño minimo
                if(strlen($string) >30) throw new validarExcepcion('error3- el nombre no puede ser mayor a 30 caracteres');  //validar tamaño maximo
        
                $string = str_replace('%','\%',$string);    //remplazar comodin
                $string = str_replace('_','\_',$string);    //remplazar comodin
                return true;
            }

            public function validarDescripcion($string){
                
                if(!isset($string)) throw new validarExcepcion('error4- no existe contenido en la descripcion');     
                if(strlen($string) < 3) throw new validarExcepcion('error5- la extencion de la descripcion es menor a 3 caracteres');  
                if(strlen($string) >80) throw new validarExcepcion('error6-la descripcion no puede ser mayor a 80 caracteres');  
        
                $string = str_replace('%','\%',$string);    //remplazar comodin
                $string = str_replace('_','\_',$string);    //remplazar comodin
                return true;
            }
        
            public function validarNumero($precio){
                if(!isset($precio)) throw new validarExcepcion ('error7- no existe contenido del precio');     //validar que exista
                if(!ctype_digit($precio)) throw new validarExcepcion('error8- el precio no es un digito');  //validar que sea un numero
                if($precio <= 0) throw new validarExcepcion('error9- el precio no puede ser menor a 0');  //validar que sea un monto posible
                
                return true;
            }

            //eliminar hamburguesas

            public function eliminarHamburguesa(){
                
            }

            public function BorrarHamburguesa($idhamburguesa){
                if($this->validarNumero($idhamburguesa));   //validacion
                $this->db->query("DELETE FROM hamburguesa WHERE idHamburguesa = $idhamburguesa ");
            }


    }


?>