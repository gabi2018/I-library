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
 ,('MISCELENEA ','088','0')
 , ('POLIGRAFIAS INDIVIDUALES Y COLECTIVAS CULTURA PROGRESO ','080','0')
 , ('FILOSOFIA SU ESENCIA Y SU METODO ','1','1')
 ,('HISTORIA DE LA FILOSOFIA','1[091]','1')
 ,('FILOSOFIA EN LA ARGENTINA','1[82]','1')
 ,('FILOSOFIA ANTIGUA','1-1','1'),
 ('FILOSOFIA MEDIVAL','1-2','1'),
 ('FILOSOFIA MODERNA','1-3','1'),
 ('FILOSOFIA CONTEMPORANEA','1-4','1'),
 ('METAFISICA','11','1'),
 ('COSMOLOGIA','113/119','1'),
 ('CIENCIAS OCULTAS','113','1'),
 ('SISTEMAS FILOSOFICOSESTUDIOS SOBRE OBRAS DE FILOSOFOS','141','1'),
 ('CIENCIAS OCULTAS','113','1'),
 ('PSICOLOGIA (Generalidades)','159.9','5'),
 ('HISTORIA DE LA PSICOLOGIA','159.9[091]','5'),
 ('INVESTIGACIONES EXPERIMENTALES,TEST DE INVESTIGACION','159.9.07','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('SALUD MENTAL,PSICOLOGIA PREVENTIVA,PSICOLOGIA FORENSE','159.91','5'),
 ('PSICOLOGIA COMPARADA Y DIFERENCIAL','159.92','5'),
 ('PSICOLOGIA Y EPISTEMOLOGIA GENETICA ,PIAGET (todas las obras de Piaget)','159.922','5'),
 ('PSICOLOGIA DE LA INFANCIA PSICOLOGIA EVOLUTIVA','159.922.7','5'),
 ('PSICOLOGIA DE LA ADOLESCENCIA','159.922.8','5'),
 ('TIPOLOGIA,PERSONALIDAD,TEMPERAMENTO,CARACTEROLOGIA,MOTIVACION','159.923','5'),
 ('PSICOLOGIA GENERAL,PERCEPCION,ATENCION,MEMORIA,SENSACION,PENSAMIENTO','159.93','5'),
 ('VIDA AFECTIVA,CARACTERISTICAS DE LA SENSIBILIDAD,ESTADOS,EMOCIONALES,AUTOAYUDA,AUTOPERFECCIONAMIENTO','159.94','5'),
 ('PSICOANALISIS','159.964.2','5'),
 ('OTRAS ESCUELAS DE PSICOTERAPIA','159.964.26','5'),
 ('PSICOPATOLOGIA','159.97','5'),
 ('PSICOLOGIA SOCIAL(la obra de Pichón Riviére)','159.98','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
 ('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
             ");
   $this->db->query("INSERT INTO `subtopic`(`subtopic_id`, `subtopic_name`, `topic_cdu`)
    VALUES ('0','Generalidades','0'),
           ('1','Filosofia','1'),
           ('5','PSICOLOGIA','1'),
           ('6','LOGICA','1'),
           ('2','Religion','2'),
           ('3','Ciencias sociales','3'),
           ('16','Sociologia','3'),
           ('32','Politica','3'),
           ('33','Economia Y trabajo','3'),
           ('34','Derecho','3'),
           ('35','Administracion Publica','3'), 
           ('355','Fuerzas Armadas','3'),
           ('36','Trabajo Social','3'),
           ('39','ETNOLOGIA-FOLKLORE-USOS Y COSTUMBRES-VIDA SOCIAL','3'),
           ('37','Educacion.Enseñanza ','37'),
           ('51','MATEMATICAS','5'),
           ('52','ASTRONOMIA-GEODESIA','5'),
           ('53','FISICA','5'),
           ('54',' QUIMICA','5'),
           ('55','Geologia y Ciencias Afines','5'),
           ('57','Biologia','5'),
           ('61','Medicina','6'),
           ('619','Veterinaria','6'),
           ('62','INGENIERIA','6'),
           ('63','AGRICULTURA, GANADERIA Y PESCA','6'),
           ('65','COMUNICACIONES','6'),
           ('659','GESTION DE EMPRESAS, DE PRODUCTOS Y SERVICIOS','6'),
           ('66','INDUSTRIA Y TECNOLOGIA','6'),
           ('70','ARTE','7'),
           ('79','DEPORTES','7'),
           ('80','LINGÜISTICA. FILOLOGIA','8'),
           ('82','LITERATURA','8'),
           ('90','GEOGRAFIA','9'),
           ('92','BIOGRAFIAS','9'),
           ('93','HISTORIA','9')");
 



$this->db->query("INSERT INTO `topic`(`topic_cdu`, `topic_name`)
 VALUES ('0','GENERALIDADES'),
        ('1' ,'FILOSOFIA'),
        ('2' ,'RELIGION'),
('3', 'CIENCIAS SOCIALES'),
('37' ,'EDUCACION'),
('5', 'CIENCIAS PURAS'),
('6 ','CIENCIAS APLICADAS'),
('7' ,'ARTE Y DEPORTE'),
('8' ,'LINGUISTICA Y LITERATURA'),
('9', 'GEOGRAFIA, BIOGRAFIAS E HISTORIA')
");


$this->db->query("INSERT INTO `languaje`(`languaje_id,languaje_desc`)
 VALUES ('0','español'),
        ('1' ,'ingles'),
        ('2' ,'portugues'),
        ('3', 'Chino mandarin'),
        ('37' ,'frances'),

");


$this->db->query("INSERT INTO `book_status`(`book_status_id`, `book_status_desc`)
 VALUES ('1','DISPONIBLE'),
        ('2' ,'copia unica),
        ('3 ,'Reservado'),
        ('4', 'prestado'),
        ('5' ,'No disponoble'),
        ");

			$this->db->execute();

    }
}

?>