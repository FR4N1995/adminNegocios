<?php

namespace Model;

class ActiveRecord{

     //base de datos

     protected static $db;
     protected static $columnasDB = [];
    
     protected static $tabla = '';

     //validar errores
     protected static $errores = [];
 
 
    
 

        //definir la coneccion a la base de datos
     public static function setDB($database){
         self::$db = $database;
     }




     public function guardar(){
        $resultado = '';
         if (!is_null($this->id)) {
     //actualizar
      //debuguear('entro');
         $resultado = $this->actualizar();
         }else{
     //creando un nuevo registro
         $resultado = $this->crear();
         
        // debuguear($comprobacion);

          }
          return $resultado;
     }
 
     Public function crear(){
         
         //Sanitizar los datos
         $atributos = $this->sanitizarDatos();
 
         //insertar en la base de datos
         //$query = "INSERT INTO propiedades ( titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$this->titulo','$this->precio', '$this->imagen', '$this->descripcion', '$this->habitaciones', '$this->wc', '$this->estacionamiento', '$this->creado', '$this->vendedorid') ";
         //remplazando lo que esta arriba
         $query = " INSERT INTO " . static::$tabla . " ( ";
         $query .= join(', ', array_keys($atributos));
         $query .= " ) VALUES ('";
         $query .= join("', '", array_values($atributos));
         $query .= " ') ";

        //    debuguear($query);
 
       $resultado = self::$db->query($query);

       return [
        'resultado' => $resultado,
        'id' => self::$db->insert_id
       ];
        //debuguear($resultado);
    //    return $resultado;
       //if ($resultado) {
         //Aqui mandamos un valor mediante la url para poder mostrar el mensaje de insertado correctamente
        //header('location: /mensaje');
         // echo "insertado correctamente";
         //redireccionamiento al usuario
      //}
      //
     }
 
     public function actualizar(){
             //Sanitizar los datos
             $atributos = $this->sanitizarDatos();
             $valores=[];
             foreach($atributos as $key => $value){
                 $valores[] = "{$key}='{$value}'";
             } 
 
             $query = " UPDATE " . static::$tabla . " SET ";
             $query .=  join(', ', $valores );
             $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
             $query .= " LIMIT 1 ";
 
             
           
             $resultado = self::$db->query($query);
             
            //  if ($resultado) {
                //  header('location: /confirmar-cuenta');
                     // echo "insertado correctamente";
                     //redireccionamiento al usuario
                   
             
                //   }
 
              return $resultado;
 
     }
 
    //Eliminar el registro
     public function eliminar(){
         $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
         
         $resultado = self::$db->query($query);
        //  debuguear($query);
 
        return [
            'resultado' => $resultado,
            'id' => self::$db->insert_id
           ];
     }
 
     //este se va a encargar de iterar sobre columnasDB
     //tambien identificar y unir los atributos de la BD
     public function atributos(){
         $atributos = [];
         foreach(static::$columnasDB as $columna){
     //aqui estamos ignorando el id y no lo va a agregar a atributos
             if($columna === 'id') continue;
             $atributos[$columna] = $this->$columna;
         }
         return $atributos;
     }
     //este se va a encargar de sanitizar cada uno de ellos^
     public function sanitizarDatos(){
         $atributos = $this->atributos();
         $sanitizado = [];
         foreach ($atributos as $key => $value){
             $sanitizado[$key] = self::$db->escape_string(trim($value, $value = " "));
         }
         return $sanitizado;
     }
 
     //subida de archivo(imagen)
     public function setImagen($imagen){
     // elimina la imagen anterior(al momento de actualizar)
     //debuguear($this->imagen);
     if (!is_null($this->id)) {
        // debuguear($this->id);
       $this->borrarImagen();
        // debuguear($existeArchivo);
     }
 //asignar al atributo de imagen el nombre y poder guardarlo en la base de datos
         if($imagen){
             $this->imagen= $imagen;
         }
         
     }
 
     //Elimina la imagen
     public function borrarImagen(){
         $existeArchivo = file_exists(CARPETAS_IMAGENES . $this->imagen . ".png");
        //  debuguear($existeArchivo);
         if ($existeArchivo) {
            unlink(CARPETAS_IMAGENES . $this->imagen . ".png");
            unlink(CARPETAS_IMAGENES . $this->imagen . ".webp");

         }
        //    debuguear($existeArchivo);
     }
 
 public static function seterrores($tipo, $mensaje){
    static::$errores[$tipo][] = $mensaje;
 }
 
 
 
     //validacion
 
     public static function getErrores(){
         return static::$errores;
     }
  
 
     public function validar(){ 
        static::$errores=[];
     return static::$errores;

     }
 
     //lista de todas las propiedades
 
     public static function all(){
         $query = " SELECT * FROM " . static::$tabla . " ORDER BY id DESC";
 
         $resultado = self::consultarSQL($query);
         
         return $resultado;
 
     }

     // obtener Registros con cierta cantidad
     public static function get($cantidad){
        $query = " SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
 
        $resultado = self::consultarSQL($query);
        
        return $resultado;

     }
     //PAginar los registros
     public static function paginar($por_pagina, $offset){
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT ${por_pagina} OFFSET ${offset}" ;
        // debuguear($query);
        $resultado = self::consultarSQL($query);
        
        return $resultado;
     }
     //paginar registros dependiendo del usuario
     public static function paginarWhere($columna, $valor, $por_pagina, $offset){
        $query = "SELECT * FROM " . static::$tabla . " WHERE ${columna} = '${valor}' " .  " ORDER BY id DESC LIMIT ${por_pagina} OFFSET ${offset}" ;
        // debuguear($query);
        $resultado = self::consultarSQL($query);
        
        return $resultado;
     }
 
     //busca una propiedad por su id
     public static function find($id){
         $query = " SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
         $resultado = self::consultarSQL($query);
 
         return array_shift($resultado);
 
     }
     //Aqui buscamos por columna
     public static function where($columna, $valor){
        $query = " SELECT * FROM " . static::$tabla . " WHERE ${columna} = '${valor}' ";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);

    }

    //Retornar los Resultados por un Orden
    public static function ordenar($columna, $orden){
        $query = " SELECT * FROM " . static::$tabla . " ORDER BY ${columna} ${orden} ";
        
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //retornar por un orden y un limite
    public static function ordenarLimite($columna, $columOrder, $valor, $orden, $limite){
        $query = " SELECT * FROM " . static::$tabla . " WHERE ${columOrder} LIKE ${valor}" . " ORDER BY ${columna} ${orden} LIMIT ${limite}";
        // debuguear($query);
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Busqueda where con multiples opciones
    public static function wherearray($array = []){
        $query = " SELECT * FROM " . static::$tabla . " WHERE ";
        foreach($array as $key => $value ){
            if ($key == array_key_last($array)) {
                $query .= " ${key} = '${value}'";
            }else{
                $query .= " ${key} = '${value}' AND";
            }  
        }
        // echo $query;
        // echo array_key_last($array);
        $resultado = self::consultarSQL($query);

        return ($resultado);

    }
    //Traer un Total de Registros
    public static function total($columna = '', $valor = ''){
        $query = " SELECT COUNT(*) FROM " . static::$tabla;
        if ($columna) {
            $query .=  " WHERE ${columna} = ${valor}";
        }
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();

        return array_shift($total);

    }

        //Traer un Total de Registros con un array were
        public static function totalArray($array = []){
            $query = " SELECT COUNT(*) FROM " . static::$tabla . " WHERE ";
            foreach($array as $key => $value ){
                if ($key == array_key_last($array)) {
                    $query .= " ${key} = '${value}'";
                }else{
                    $query .= " ${key} = '${value}' AND";
                }  
            }
            $resultado = self::$db->query($query);
            $total = $resultado->fetch_array();
    
            return array_shift($total);
    
        }

    public static function belongsTo($columna, $valor){
        

        $query = " SELECT * FROM " . static::$tabla . " WHERE ${columna} = '${valor}' ORDER BY id DESC ";
        $resultado = self::consultarSQL($query);

        return $resultado;

    }

    public static function RegistrosEliminar($columna, $valor, $numero){
        $query = " SELECT * FROM " . static::$tabla . " WHERE ${columna} = '${valor}' LIMIT ${numero}, 999";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }



    // Consulta plana de sql (utilizar cuando los metodos del modelo no son suficientes);
    public static function SQL($consulta){
        $query = $consulta;
        // debuguear($query);
        $resultado = self::consultarSQL($query);
        return $resultado;

    }
 
     public static function consultarSQL($query){
             //consultar la base de datos
             $resultado = self::$db->query($query);
 
             //Iterar los REsultados
             $array = [];
             while ($registro = $resultado->fetch_assoc()) {
                $array[] = static::crearObjeto($registro);
             }
             //liberar memoria
             $resultado->free();
 
             return $array;
     }
 
     protected static function crearObjeto($registro){
         $objeto = new static;
         foreach($registro as $key => $value){
             if(property_exists($objeto, $key)){
                 $objeto->$key = $value;
             }
         }
         return $objeto;
     }
 
     //sincronizar el objeto en memmoria con los cambios realizados por el usuario
      public function sincronizar($args= []){
         foreach($args as $key => $value){
             if (property_exists($this, $key) && !is_null($value)) {
                 $this->$key = $value;
             }
         }
         //  return $args;
      }
 
    
 

}
