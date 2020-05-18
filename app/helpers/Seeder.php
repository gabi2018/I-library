<?php

class Seeder
{
    
    static private$seeder=null;
    private $db;
    private  function Seeder(){
        $this->db = new DataBase;
        $this->insert();
        
    }

public  static  function create(){
 

    if (self::$seeder==null){

        
        self::$seeder = new Seeder;
       
    }
    return self::$seeder;
}

//insercion de datos en Category sumbtema  y tema
    public function insert(){
        $this->db->query("INSERT INTO category (category_name,category_cod, subtopic_id)
         VALUES ('GENERALIDADES EN CIENCIA','001','0')
 ,('GENERALIDADES EN CIENCIA ','001','0')
 , (' CIENCIA Y CONOCIMEINTO GENERAL EN LA ARGENTINA ','001[82]','0')
 , ('METODOLOGIA DE LA INVESTIGACION,ASPECTOS TEORICOS DE LA INVESTIGACION,ANALISIS DE DATOS','001.8','0')
 ,('COMUNICACION,CIBERNETICA  ','007','0')
 ,('CULTURA,PROGRESO ','008','0')
 , ('BIBLIOTECOLOGIA  ','020','0')
 , ('MUSEOLOGIA ','069','0')
 , ('PERIODISMO, LIBERTAD DE PRENSA ','070','0')
 , ('POLIGRAFIAS INDIVIDUALES Y COLECTIVAS CULTURA PROGRESO ','080','0')
 ");

# Run//insert tipo de authores
			$this->db->execute();
		

    }
}

?>