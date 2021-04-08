<?php
class User
{
	private $db;
	private $dbPos;
	public function __construct()
	{
		$this->db = new DataBase;
		$this->dbPos = new PostgreDB;
	}

	public function getUsers()
	{
		$this->db->query('SELECT user.user_dni,
									 user.user_name, 
									 user.user_lastname, 
									 user.user_address, 
									 user.user_phone, 
									 user.user_email, 
									 user.user_defaulter,
									 user.user_img,
									 user_type.user_type_desc 
							  FROM   user, user_type
							  WHERE  user.user_type_id = user_type.user_type_id
							  AND    user.user_type_id <> 1');

		$response = $this->db->getRecords();
		return $response;
	}

	public function getByEmail($email)
	{
		$email =  $this->db->deleteSpecialChars($email, 'email');
		$this->db->query('SELECT * FROM  user WHERE user_email = :email');
		$this->db->bind(':email', $email);
		$response = $this->db->getRecord();
		return $response;
	}

	public function addUser($param)
	{
		if(isset($param)){
		$this->db->query('INSERT INTO user 
										 (user_dni, user_name, user_lastname, user_address, user_phone, user_email, user_password, user_type_id, user_img) 
							    VALUES   (:user_dni, :user_name, :user_lastname, :user_address, :user_phone, :user_email, :user_password, :user_type_id, :user_img)');

		if (!empty($param['user-img']['name'])) {
			$nameImg = $param['user-dni'];
			$file 	 = $param['user-img']['tmp_name'];
			$type = $param['user-img']['type'];
			$ext = explode('/', $type);
			$nameImg = $nameImg . '.' . $ext[1];
			$rut 	 = 'media/images/partner/' . $nameImg;
			copy($file, $rut);
		} else {
			$nameImg = 'default-user.png';
		}
		$dni=  $this->db->deleteSpecialChars($param['user-dni'], 'int');
		# Link values 
		$this->db->bind(':user_name',     $param['user-name']);
		$this->db->bind(':user_lastname', $param['user-lastname']);
		$this->db->bind(':user_address',  $param['user-address']);
		$this->db->bind(':user_dni',      $dni);
		$this->db->bind(':user_phone',    $param['user-phone']);
		$this->db->bind(':user_email',    $param['user-email']);
		$this->db->bind(':user_password', $param['user-pass']);
		$this->db->bind(':user_type_id', $param['user-type-id']);
		$this->db->bind(':user_img', $nameImg);
	
		$careerId=$param['user-career'];
		# Run
		if($this->db->execute()){
		
			
			$this->addUHC($dni,$careerId);							
			}

			return true;
		}
		
	}

	public function userRecord($param)
	{
		$this->db->query('INSERT INTO user (user_nick, user_email, user_password)
							  VALUES (:user_nick, :user_email, :user_password)');

		# Link values
		$this->db->bind(':user_nick',     $param['user-nick']);
		$this->db->bind(':user_email',    $param['user-email']);
		$this->db->bind(':user_password', $param['user-password']);

		# Run
		return $this->db->execute();
	}


	/*funcion trae un solo usuario*/
	public function getUser($dni)
	{
		$dni =  $this->db->deleteSpecialChars($dni, 'int');
		$this->db->query('SELECT *
								FROM user 
								WHERE user_dni = :user_dni');
		$this->db->bind(':user_dni', $dni);
		$response = $this->db->getRecord();
		return $response;
	}
	//		funcion q busca usuario por su dni
	public function searchGetUser($dni)
	{
		$this->db->query('SELECT *
								FROM user 
								INNER JOIN user_type UT ON user.user_type_id = UT.user_type_id 
							  WHERE user.user_dni LIKE "%":user_dni"%" 
							  ORDER BY user.user_name,user.user_lastname');
		$this->db->bind(':user_dni', $dni);
		$result = $this->db->getRecords();

		return $result;
	}


	/*funcion que edita los usuarios y recibe un arreglo como parametro */
	public function editUsers($param)
	{
		$this->db->query('UPDATE user 
							  SET user_address = :user_address, 
							      user_phone   = :user_phone, 
							      user_email   = :user_email
							  WHERE user_dni   = :user_dni');

		# Link values
		$this->db->bind(':user_dni',     $param['user-dni']);
		$this->db->bind(':user_phone',   $param['user-phone']);
		$this->db->bind(':user_address', $param['user-address']);
		$this->db->bind(':user_email',   $param['user-email']);

		# Run
		return $this->db->execute();
	}

	/** Funcion que trae los datos del ususario para ser buscados*/
	/**Los datos del ususario son: nombre, apellido, direccion, telefono, tipo de socio, y si es moroso
	 * en el caso de serlo muestra un mensaje como moroso, si no nada.
	 */
	public function getUsersSearch($param)
	{
		$this->db->query('SELECT U.user_dni,
									 U.user_name, 
									 U.user_lastname, 
									 U.user_address, 
									 U.user_email,
									 U.user_phone, 
									 U.user_img,
									 UT.user_type_desc 
							  FROM   user U 
							  INNER JOIN user_type UT ON U.user_type_id = UT.user_type_id 
							  WHERE U.user_name LIKE "%":user_param"%"
							  AND U.user_type_id <> 1
							  ORDER BY U.user_name,U.user_lastname');
		$this->db->bind(':user_param', $param['user']);
		$result = $this->db->getRecords();
		$response = array();
		foreach ($result as $Key => $value) {

			$response[$Key] = $value;
		}
		return $response;
	}

	/**Funcion deshactiva un usuario */
	public function disableUser($dni)
	{
		$value = !$this->isDefaulter($dni);
		$this->db->query('UPDATE user 
							  SET	 user.user_defaulter = :value
							  WHERE  user.user_dni = :user_dni');
		$this->db->bind(':user_dni', $dni);
		$this->db->bind(':value', $value);

		return ($this->db->execute());
	}

	public function isDefaulter($dni)
	{
		return ($this->getUser($dni))->user_defaulter;
	}



	/** 
	 *Traer los useer de la base de datos del siu guarani
	 */

	public function getSociosSIU()
	{


		$this->dbPos->query(
			'select * 
			from user_siu,carrera c,tipo_rol tp,usuario_has_carrera uc
			WHERE  
			user_siu.tipo_rol_id=tp.tipo_rol_id and
			user_siu.usuario_id=uc.usuario_id and
			c.carrera_id=uc.carrera_id and
			user_siu.condicion=true');

		$response = $this->dbPos->getRecords();
		return $response;
	}
	//busqueda si existe en la base de datos i-library el user de siu
	public function addUserSiu()
	{
		//consulta los socios
		if($users = $this->getSociosSIU()){

			foreach ($users as $user) {

			$this->db->query('SELECT *
				FROM user 
			  	WHERE user.user_dni=:user_dni');
			$this->db->bind(':user_dni', $user->dni);
			$response = $this->db->getRecord();
			$this->register($response, $user);
			}
			return true;
		}
		return false;
	}


	//registra a los usuarios en la base i-library si no existen y desabilita los que estan desabilitados en el siu
	public function register($return, $user)
	{
		if ($return == null) {
			$pass  =  password_hash(trim($user->dni), PASSWORD_BCRYPT, ['cost' => 12]);
			$param = [
				'user-name' 	=> trim($user->nombre),
				'user-lastname' => trim($user->apellido),
				'user-address' 	=> trim($user->direccion),
				'user-dni'      => trim($user->dni),
				'user-phone' 	=> trim($user->telefono),
				'user-email' 	=> trim($user->email),
				'user-img'      => trim(''),
				'user-pass'     => $pass,
				'user-type-id' 	=> trim($user->tipo_rol_id)
			];
		return	$this->addUser($param);
		} else {
			if ($user->condicion==0) {
			return	$this->disableUser($user->dni);
			}
			
		}

	}
	public function addUHC($DNI_id,$career_id){

		$this->db->query('INSERT INTO user_has_career(user_dni,career_id)
										  VALUES (:user_dni,:career_id)');
					
						$this->db->bind(':user_dni',$DNI_id);
						$this->db->bind(':career_id',$career_id);
				
						$this->db->execute();					
					


	}

	
}
