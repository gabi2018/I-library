<?php
/*
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


    INSERT INTO `author_type`(`author_type_id`, `author_type_identifier`) VALUES ('1','narrador'),('2','ilustrador'),("3"),("coautor");

    iNSERT INTO category (category_name,category_cod, subtopic_id)
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
('Psicologia institucional','159.99','5'),
('TEORIA Y TECNICAS DE GRUPO','159.90','5'),
('Logica','16','6'),
('TEORIA  DEL CONOCIMIENTO','165','6'),
('ETICA-CUESTIONES DEL CONOCIMIENTO','170','6'),
('RELIGION-TEOLOGIA-ATEISMO','21','2'),
('LA BIBLIA-ANTIGUO TESTAMENTO-NUEVO TESTAMENTO','22','2'),
('TEOLOGIA DOGMATICA-ARTE Y SIMBOLOS CRISTIANOS-ASCETICA. ESPIRITUALIDAD-IGLESIA CRISTIANA-EVANGELIZACION-ORDENES. CONGREGACIONES','23/27','2'),
('COMUNIDADES RELIGIOSAS VARIAS-SECTAS','28','2'),
('MITOLOGIA-CIENCIA E HISTORIA COMPARADA DE LAS RELIGIONES','29','2'),
('RELIGIONES DE LOS PUEBLOS GERMANICOS Y BALTOESLAVOS','293','2'),
('RELIGIONES DE LA INDIA-HINDUISMO-RELIGIONES PERSAS','294/295','2'),
('RELIGION JUDIA -EL JUDAISMO','296','2'),
('EL CORAN -EL ISLAMISMO','297','2'),
('RELIGIONES DE LOS PUEBLOS AFRICANOS','299.6','3'),
('RELIGIONES DE LOS PUEBLOS DE AMERICA','299.7/8','2'),
('TEORIAS DE LAS CIENCIAS SOCIALES-GENERALIDADES DE LAS CIENCIAS SOCIALES','30','3'),
('CUESTION SOCIAL EN GENERAL-POLITICAS SOCIALES-POBREZA, MINORIDAD, FAMILIA','304','3'),
('CUESTION SOCIAL EN LA ARGENTINA-POLITICAS SOCIALES-POBREZA-PROBLEMAS DE MINORIDAD Y FAMILIA','304[82]','3'),
('ESTADISTICA COMO CIENCIA-TEORIA DE LA ESTADISTICA-INVESTIGACION ESTADISTICA','311','3'),
('DEMOGRAFIA','314','3'),
('MIGRACION-INMIGRACION Y EMIGRACION-TRASLADOS DE POBLACION','314.7','3'),
('Sociologia','316','16'),
('SOCIOLOGIA EN LA ARGENTINA','316[82]','16'),
('ESTRUCTURA SOCIAL-SOCIEDAD COMO SISTEMA SOCIAL-TIPOS SOCIO-ECONOMICOS DE SOCIEDADES GLOBALES','316.3','16'),
('SOCIOLOGIA URBANA Y RURAL','316.33','16'),
('ESTRATIFICACION SOCIAL-CLASES SOCIALES-GRUPOS Y CAPAS SOCIALES-MOVILIDAD SOCIAL-MARGINALIDAD-RACISMO-DISCRIMINACION','316.34','16'),
('PROCESOS SOCIALES','316.4','16'),
('Sociologia de la cultura','316.7','16'),
('politica','32','32'),
('POLITICA ARGENTINA','32[82]','32'),
('FORMAS DE LA ORGANIZACION POLITICA-LOS ESTADOS COMO PODERES POLITICOS-SOBERANIA-MONARQUIA-DICTADURA-DEMOCRACIA','321','32'),
('MOVIMIENTOS NACIONALES-MINORIAS NACIONALES-IRREDENTISMO-MOVIMIENTOS CONTRA CIERTAS RAZAS Y NACIONALISMOS-REGIONALISMOS','323.1','32'),
('REVOLUCION-GOLPE DE ESTADO-INSURRECCION-GUERRA CIVIL-PERSECUCION POLITICA','323.2','32'),
('COLONIZACION-OCUPACION DE TERRITORIOS-TIPOS DE COLONIAS (penales, militares, de explotación económica)','325','32'),
('RELACIONES POLITICAS INTERNACIONALES-POLITICA INTERNACIONAL-POLITICA EXTERIOR-IMPERIALISMO-INTERNACIONALISMO','327','32'),
('PARTIDOS Y MOVIMIENTOS POLITICOS','329','32'),
('PARTIDOS POLITICOS EN LA ARGENTINA','329[82]','32'),
('ECONOMIA -ECONOMIA POLITICA','330','33'),
('HISTORIA DE LA ECONOMIA','330[091]','33'),
('ECONOMIA DE LATINOAMERICA MERCOSUR','330[7/8]','33'),
('ECONOMIA -ECONOMIA POLITICA','330[82]','33'),
('HISTORIA DE LAS TEORIAS ECONOMICAS-TEORIAS ECONOMICAS ANTERIORES AL SIGLO XX','330.8','33');
('TRABAJO-HISTORIA DEL TRABAJO-ECONOMIA DEL TRABAJO','331','33'),
('HISTORIA DEL TRABAJO EN ARGENTINA','331[82]','33'),
('CONDICIONES Y MEDIO AMBIENTE DE TRABAJO-SEGURIDAD EN EL TRABAJO','331.4','33'),
('MERCADO DEL TRABAJO-EMPLEO','331.5','33'),
('SINDICATOS-CONFLICTOS LABORALES. NEGOCIACION COLECTIVA-ORGANIZACION INTERNACIONAL DEL TRABAJO','331.91','33'),
('ECONOMIA REGIONAL-POLITICA ECONOMICA REGIONAL','332','33'),
('FORMAS DE ORGANIZACION Y COOPERACION EN LA ECONOMIA','334','33'),
('FINANZAS-HACIENDA PUBLICA-PRESUPUESTOS DEL ESTADO','336','33'),
('SITUACION ECONOMICA<POLITICA ECONOMICA-INDUSTRIA COMO SECTOR ECONOMICO<ECONOMIA DEL TRANSITO Y COMUNICACIONES','338','33'),
('SITUACION ECONOMICA EN LA ARGENTINA-POLITICA ECONOMICA EN LA ARGENTINA','338[82]','33'),
('MERCADOS-COMERCIO INTERIOR-COMERCIO EXTERIOR','339','33'),
('DERECHO ARGENTINO','34[82]','34'),
('HISTORIA DEL DERECHO','34[091]','34'),
('LEYES<DECRETOS-EDICTOS--PROYECTOS DE LEY-REGLAMENTOS','34[094]','34'),
('DERECHO-CIENCIAS AUXILIARES DEL DERECHO-DERECHO COMPARADO-TIPOS Y FORMAS DEL DERECHO','340','34'),
('DERECHO INTERNACIONAL-ORGANISMOS ESPECIALIZADOS DE GOBIERNO MUNDIAL','341','34'),
('DERECHO DE GUERRA-ESTADO DE GUERRA O BELIGERANCIA-DECLARACION DE GUERRA','341.3','34'),
('DERECHO POLITICO','342','34'),
('CONSTITUCIONES<REFORMA CONSTITUCIONAL-ASAMBLEAS NACIONALES','342.4','34'),
('DERECHO PARLAMENTARIO-PODERES DEL ESTADO','342.5','34'),
('DERECHOS FUNDAMENTALES<DERECHOS HUMANOS-DERECHOS Y DEBERES DE LOS CIUDADANOS','342.7','34'),
('DERECHO PENAL-DELITOS PENALES<PREVENCION DEL DELITO','343','34'),
('DERECHO PENAL MILITAR-DERECHO PENAL MARITIMO-DERECHO PENAL AERONAUTICO','344','34'),
('DERECHO CIVIL EN GENERAL-ORIGEN DE LOS DERECHOS','347','34'),
('DERECHOS REALESDERECHOS DE LA PROPIEDAD-DERECHO PRIVADO','347.2','34'),
('OBLIGACIONES-CONTRATOS','347.4','34'),
('DERECHO DE FAMILIA-DERECHO MATRIMONIAL-DERECHO DE SUCESIONES','347.6','34'),
('DERECHO AEREO-DERECHO ESPACIAL-DERECHO DE LA RADIODIFUSION','347.8','34'),
('DERECHO PROCESAL-PROCEDIMIENTO CIVIL','347.9','34'),
('DERECHO ECLESIASTICO-DERECHO CANONICO-DERECHO EN LAS DIFERENTES RELIGIONES','348','34'),
('RAMAS ESPECIALES DEL DERECHO-DERECHO DEL TRABAJO-DERECHO SOCIAL-DERECHO AGRARIO-DERECHO URBANISTICO-DERECHO AMBIENTAL','349','34'),
('ORGANIZACION ADMINISTRATIVA -ADMINISTRACION PUBLICA DE LA ECONOMIA','345','35'),
('ARTE Y CIENCIAS MILITARES EN GENERAL-HISTORIA DE LAS DIFERENTES ARMAS-DEFENSA NACIONAL-ARMAS DE TIERRA, AIRE Y MAR-SOCIOLOGIA DE LA GUERRA-POLICIA MILITAR-FUERZAS ARMADAS EN GENERAL','355/359','355'),
('TRABAJO SOCIAL-PROBLEMAS GENERALES QUE INFLUYEN EN EL BIENESTAR-PERSONAS QUE TRABAJAN EN LA ASISTENCIA SOCIAL','36','36'),
('ORGANIZACION ADMINISTRATIVA -ADMINISTRACION PUBLICA DE LA ECONOMIA','366','36'),
('TURISMO','379.85','36'),
('SEGUROS-CLASES DE EMPRESAS DE SEGUROS','368','36'),
('CONSUMISMO --PAPEL DEL CONSUMIDOR EN LA ECONOMIA Y EN LA SOCIEDAD-RIESGOS DEL CONSUMIDO','366','36'),

(' ETNOGRAFIA -ANTROPOLOGIA CULTURAL Y SOCIAL-ANTROPOLOGIA FISICA Y/O BIOLOGICA','39','39'),
( 'VESTIMENTA-MASCARAS-TATUAJES','391','39'),

('USOS Y COSTUMBRES EN LA VIDA PRIVADA ','392','39' ),

('MUERTE. FUNERALES (ritos)', '393','39'), 
('FIESTAS NACIONALES-FESTEJOS POPULARES-CEREMONIAS OFICIALES-CEREMONIAL-DIPLOMACIA','394','39'), 

('FEMINISMO-MUJER (emancipación, igualdad, derecho, trabajo, política, etc.)','396','39'), 
('FOLKLORE PROPIAMENTE DICHO (tradiciones, sabiduría popular)CREENCIAS Y TRADICIONES-JUEGOS POPULARES-CANCIONERO POPULAR. DICHOS POPULARES-MARIONETAS. TITERES','398','39') ,

('FOLKLORE ARGENTINO', '398[82]','39'),

('CIENCIA DE LA EDUCACION', '37','37'),

('PEDAGOGOS ','37:929','37'), 
('HISTORIA DE LA EDUCACION (propiamente dicha)', '37[091]','37'), 
('LEGISLACION EDUCATIVA-RESPONSABILIDAD CIVIL DOCENTE (en general)-CONVALIDACION DE TITULOS','37[094]','37'),

('EDUCACION EN TODOS LOS PAISES QUE NO CONFORMAN AMERICA LATINA ','37[4/9]','37'), 
('EDUCACION EN AMERICA LATINA (solo temáticas muy generales.', '37[7/8]','37'), 
('HISTORIA DE LA EDUCACION EN LA ARGENTINA ','37[82][091]','37'),
('LEGISLACION EDUCATIVA ARGENTINA-ESTATUTO DEL DOCENTE-LEY FEDERAL DE EDUCACION','37[82][094] ','37'),
('FILOSOFIA DE LA EDUCACION','37.011 ','37'),
('INVESTIGACION EDUCATIVA<METODOS DE INVESTIGACION EDUCATIVA-INVESTIGACION-ACCION-EDUCACION COMPARADA','37.012 ','37'),
('TEORIA GENERAL DE LA EDUCACION -PEDAGOGIA-CONCEPTOS GENERALES DE EDUCACION','37.013 ','37'),
('POLITICA EDUCATIVA-ESTADO Y EDUCACION-DERECHO A LA EDUCACIOn-EDUCACION Y VIDA PUBLICA-CRISIS DE LA EDUCACION-CALIDAD DE LA EDUCACION-SISTEMAS EDUCATIVOs','37.014 ','37'),
('ESCUELA PUBLICA-EDUCACION PUBLICA-DESERCION ESCOLAR','37.014.2','37'),
('ANALFABETISMO-ALFABETIZACION DE ADULTOS','37.014.22 ','37'),
('REFORMAS EDUCATIVAS ','37.014.3 ','37'),
('PLANEAMIENTO EDUCATIVO- NACIONAL-REGIONAL ','37.014.5 ','37'),
('POLITICA DE LA EDUCACION SEGUN PUNTOS DE VISTA-ECONOMICOS-FINANCIACION DE LA EDUCACION','37.014.54','37'),
('PSICOLOGIA DE LA EDUCACION','37.015 ','37'),
('ANTROPOLOGIA DE LA EDUCACION-SOCIOLOGIA PEDAGOGICA-SOCIOMETRIA PEDAGOGICA-SOCIOLOGIA DE LA EDUCACION','37.015.4 ','37'),
('APRENDIZAJE-FRACASO ESCOLAR-TRASTORNOS DEL APRENDIZAJE','37.015.5 ','37'),
('EDUCACION A DISTANCIA-ESTUDIOS NOCTURNOS-EDUCACION PERMANENTE',' 37.018 ','37'),
('EDUCACION EN FAMILIA','37. 018.1 ','37'),
('CUESTIONES GENERALES DE DIDACTICA Y METODOLOGIA-METODO DE PROYECTOS','37.02','37'),
('METODOS Y TECNICAS DE ESTUDIO','37.025 ','37'),
('EDUCACION PARA LA SALUD-HIGIENE ESCOLAR','37.03 ','37'),
('EDUCACION SEXUAL','37.031','37'),
('EDUCACION MORAL,EDUCACION EN VALORES','37.034 ','37'),
('TEMAS TRANSVERSALES-EDUCACION PARA LA PAZ-EDUCACION DEL CONSUMIDOR-EDUCACION PARA LA IGUALDAD-EDUCACION VIAL','37.034.1 ','37'),
('EDUCACION POLITICA','37.035','37'),
('ORIENTACION ESCOLAR-COEDUCACION. EDUCACION INTEGRADA Y SEGREGADA-SEXISMO EN EDUCACION -FORMACION AUTODIDACTA','37.04 ','37'),





("ORIENTACION VOCACIONALCONSEJO PEDAGOGICO-ORIENTACION PROFESIONAL-ORIENTACION POR PADRES Y DOCENTES","37.048",'37'), 

('RELACIONES ENTRE PADRES, DOCENTES, COMUNIDAD ALUMNOS-RELACIONES HUMANAS-AMBIENTE EDUCACIONAL','37.06'), 

('ORGANIZACION DE LA EDUCACION Y LA ENSEÑANZA','371 ','37');
('PERSONAL DOCENTE-PERSONAL AUXILIAR<ROL DOCENTE','371.12 ','37');

 ('FORMACION DE LOS PROFESORES Y EDUCADORES-PERFECCIONAMIENTO DOCENTE-PERFECCIONAMIENTO DOCENTE EN SERVICIO3','371.13','37')

('ORGANIZACION DE LAS INSTITUCIONES EDUCATIVAS Y DE LA ENSEÑANZA (a nivel escuela) GESTION INSTITUCIONAL',' 371.2 ','37'),
('PLANES DE ESTUDIOS<PROGRAMAS ESCOLARES.CURRICULO<CONTENIDOS BASICOS COMUNES','371.214 ','37'),
(' ACTOS ESCOLARES.CEREMONIAS ESCOLARES','371.239','37'),
('APRECIACION Y SUPERVISION DE LOS PROFESORES A LOSALUMNOS (notas, informes, tests) EXAMENES. CALIFICACIONES TITULOS. DIPLOMAS EVALUACION','371.27','37'),
('METODOS DE ENSEÑANZA PROCEDIMIENTOS DE ENSEÑANZA','371.3','37'),
('tALLERES.AULA-TALLER.DINAMICA DE GRUPO.TRABAJO EN EQUIPOCLUBES ESCOLARES','371.311','37'),
(' ENSEÑANZA PROGRAMADA (o instrucción programada)','371.315','37'),
('371.38 ','TRABAJO MANUAL','37'),
('METODO ACTIVO','371.382 ','37'),
('PERIODISMO ESCOLAR','371.385 ','37'),
('TRABAJOS PRACTICOS DE LABORATORIO -EXPERIENCIAS CIENTIFICAS','371.388 ','37'),
(' DISCIPLINA ESCOLAR-REGLAMENTOS, REGLAS DE CONDUCTA, COMPORTAMIENTO-SANCIONES','371.5','37'),
('.EMPLAZAMIENTO DE ESTABLECIMIENTOS EDUCATIVOS<EDIFICACIONES. ARQUITECTURA ESCOLAR-MOBILIARIO','371.6','37'),
(' MATERIAL AUDIOVISUAL','371.68','37'),
(' VIDA DE LOS ESTUDIANTES (costumbres)-INTERCAMBIO ESTUDIANTI','371.8','37'),
('EDUCACION PREESCOLAR-JARDIN DE INFANTES-GUARDERIAS-NIVEL INICIAL','372.3 ','37'),
(' ENSEÑANZA GENERAL BASICA (EGB 1 Y 2)-ENSEÑANZA PRIMARIA','372.4','37'),
(' LA LECTURA.LECTOESCRITURA INICIAL<COMPRENSION LECTORA<EXPRESION ORAL. VOCABULARIO','372.41','37'),

(' ESCRITURAENSEÑANZA DE LA REDACCIO','372.45','37'),
('LA ENSEÑANZA DE LA LENGUA (para Primaria y EGB, a nivelgeneral)','372.46','37'),
('ELEMENTOS DE GRAMATICA Y ORTOGRAFIA','372.462 ','37'),
(' DIDACTICA DE LOS IDIOMAS','','37'),
('','','37'),
('','','37'),
('','','37'),
('','','37'),


 
  
 









372.80
EDUCACION BILINGÜE
372.81 DIDACTICA DE LA FILOSOFIA
372.815 DIDACTICA DE LA PSICOLOGIA
372.82 DIDACTICA DE LA RELIGION
372.83 DIDACTICA DE LAS CIENCIAS SOCIALES (Primaria y EGB)
372.835 DIDACTICA DE LA FORMACION ETICA Y CIUDADANA
DIDACTICA DE LA EDUCACION CIVICA
372.85 DIDACTICA DE LAS CIENCIAS NATURALES
DIDACTICA DE LA EDUCACION AMBIENTAL
372.851 DIDACTICA DE LAS MATEMATICAS (Primaria /Media)
372.853 DIDACTICA DE LA FISICA
372.854 DIDACTICA DE LA QUIMICA
372.86 DIDACTICA DE LA TECNOLOGIA
EDUCACION TECNOLOGICA
( Bloque de tecnologías que responden a la nueva curricula,
relaciona: Materiales
Herramientas
Procesos tecnológicos
Máquinas
Instrumentos
Evolución de las técnicas
Relaciones entre tecnología y sociedad
Historia de los descubrimientos científicos
y tecnológicos)
372. 868 DIDACTICA DE LA INFORMATICA
54
USO DE SOFTWARE y HARDWARE EDUCATIVO
372.87 DIDACTICA DE LAS ARTES PLASTICAS
ARTE INFANTIL
ENSEÑANZA DEL DIBUJO. PINTURA. CERAMICA
372.878 DIDACTICA DE LA MUSICA
EDUCACION MUSICAL
372.879 DIDACTICA DE LA EDUCACION FISICA
EXPRESION CORPORAL
EDUCACION PSICOMOTRIZ
372.879.2 TEATRO ESCOLAR
TITERES
DRAMATIZACION
372.88 ENSEÑANZA DE LENGUA Y LITERATURA (para EGB3, Secundaria
y Superior )
372.891 DIDACTICA DE LA GEOGRAFIA (Media/Polimodal/Superior)
372.893 DIDACTICA DE LA HISTORIA (Media/Polimodal/Superior)
373.5 ENSEÑANZA SECUNDARIA
ENSEÑANZA MEDIA
POLIMODAL
373.62 ENSEÑANZA TECNICA (Escuelas Técnicas)
373.68 EDUCACION RURAL
ESCUELAS UNITARIAS
374.7 EDUCACION DE ADULTOS
EDUCACION Y TERCERA EDAD
CENTROS DE EDUCACION DE ADULTOS
376 EDUCACION ESPECIAL (discapacitados físicos / mentales)
INTEGRACION ESCOLAR
PROBLEMATICA DE LOS PADRES CON NIÑOS ESPECIALES
376.6 EDUCACION DE PERSONAS EN SITUACION SOCIAL ESPECIAL
PRIVILEGIADOS SOCIALES
MARGINACION
EXCLUSION
HUERFANOS (abandonados)
NIÑOS EXTRANJEROS (inmigrantes, refugiados)
55
MINORIAS ETNICAS
GRUPOS RELIGIOSOS (sectas)
377 FORMACION PROFESIONAL
ESCUELAS PROFESIONALES
FORMACION Y ENSEÑANZA DE PROFESIONES NO
CUALIFICADAS
ESCUELAS DE APRENDICES
ORGANIZACION DE LA ENSEÑANZA PROFESIONAL
377.3 EDUCACION Y EMPLEO
378 ENSEÑANZA SUPERIOR/ TERCIARIA
UNIVERSIDADES
379.8 EDUCACION EN TIEMPO LIBRE (actividades extraescolares)
EXCURSIONES ESCOLARES
OCIO Y TIEMPO LIBRE. CAMPAMENTISMO
ENTRETENIMIENTOS EN EL HOGAR Y LA






INSERT INTO `subtopic`(`subtopic_id`, `subtopic_name`, `topic_cdu`)
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
      ('93','HISTORIA','9');




INSERT INTO `topic`(`topic_cdu`, `topic_name`)
VALUES ('0','GENERALIDADES'),
   ('1' ,'FILOSOFIA'),
   ('2' ,'RELIGION'),
('3', 'CIENCIAS SOCIALES'),
('37' ,'EDUCACION'),
('5', 'CIENCIAS PURAS'),
('6 ','CIENCIAS APLICADAS'),
('7' ,'ARTE Y DEPORTE'),
('8' ,'LINGUISTICA Y LITERATURA'),
('9', 'GEOGRAFIA, BIOGRAFIAS E HISTORIA');


INSERT INTO `languaje`(`languaje_id,languaje_desc`)
VALUES ('0','español'),
   ('1' ,'ingles'),
   ('2' ,'portugues'),
   ('3', 'Chino mandarin'),
   ('37' ,'frances');

INSERT INTO `book_status`(`book_status_id`, `book_status_desc`)
VALUES ('1','DISPONIBLE'),
   ('2' ,'copia unica'),
   ('3 ','Reservado'),
   ('4', 'prestado'),
   ('5' ,'No disponoble');
}
*/
?>