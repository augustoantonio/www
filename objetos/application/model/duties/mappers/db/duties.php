<?php

class model_duties_mappers_db_duties extends model_mappers_db
{
	public $link;
	public $config;
	
	public function getQuery ($config)
{
	$sql = "SELECT 	noparadellover.duties.idduty as idduty,
							noparadellover.duties.duty	as duty
					FROM  	noparadellover.duties;";
	$result=mysqli_query($this->link, $sql);
	
	
	// object(mysqli_result)#2 (5) {
	//	["current_field"]=> int(0)	["field_count"]=> int(5)
	//	["lengths"]=> NULL			["num_rows"]=> int(1)	["type"]=> int(0) }
	// 	var_dump ($result);
	// 	die;
	while ($row=mysqli_fetch_assoc($result))
	{

		$filas[] =$row;



		// 		$row['projectid']=getPets($row['iduser'], $config);
		// 		$row['languages']=getLanguages($row['iduser'], $config);

	}
	// 	echo '<pre>: $rows:';
	// 	print_r($data);
	// 	echo '</pre>'.'</br>';
	// 	die;
	return $filas;
}
	public function __construct($config)
	{
		$this->config = $config;
		$this->link = parent::__construct($config);		
	}
	
	public function getUsers()
	{
		$sql="SELECT users.iduser,
					 users.username,
					 cities.name as city,
					 genders.name as gender,
					 users.photo
			  FROM users, genders, cities
			  WHERE users.genders_idgender = genders.idgender AND
					users.cities_idcity = cities.idcity";
			
		$result=mysqli_query($this->link, $sql);
		while ($row=mysqli_fetch_assoc($result))
		{
			$row['pets']=$this->getPets($row['iduser']);
			$row['languages']=$this->getLanguages($row['iduser']);
			$rows[]=$row;
		}
		return $rows;
	}
	
	public function getUser($iduser)
	{
		$sql="SELECT users.*,
					 cities.name as city,
					 genders.name as gender,
					 users.photo
			  FROM users, genders, cities
			  WHERE users.genders_idgender = genders.idgender AND
					users.cities_idcity = cities.idcity AND
					users.iduser = ".$iduser;
	
		$result=mysqli_query($this->link, $sql);
		while ($row=mysqli_fetch_assoc($result))
		{
			$row['pets']=explode('|',$this->getPets($row['iduser']));
			$row['languages']=explode('|',$this->getLanguages($row['iduser']));
			$rows[]=$row;
		}
	
		return $rows[0];
	}
	
	
	
	public function getPets($iduser)
	{
		$sql = "SELECT  GROUP_CONCAT(pets.name SEPARATOR '|') as pets
			FROM pets
			INNER JOIN users_has_pets ON
				  users_has_pets.pets_idpet = pets.idpet
			WHERE users_has_pets.users_iduser = ".$iduser;
	
		$result=mysqli_query($this->link, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['pets'];
	}
	
	public function getLanguages($iduser)
	{
		$sql = "SELECT  GROUP_CONCAT(languages.name SEPARATOR '|') as languages
			FROM languages
			INNER JOIN users_has_languages ON
				  users_has_languages.languages_idlanguage = languages.idlanguage
			WHERE users_has_languages.users_iduser = ".$iduser;
	
		$result=mysqli_query($this->link, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['languages'];
	}
	
	
	public function deleteUser($iduser)
	{
		$this->deleteUserPets($iduser);
		$this->deleteUserLanguages($iduser);
		$sql = "DELETE FROM users WHERE iduser = ".$iduser;
	
		$result=mysqli_query($this->link, $sql);
		return $result;
	}
	
	public function deleteUserPets($iduser)
	{
		$sql = "DELETE FROM users_has_pets
			WHERE users_iduser = ".$iduser;
		
		$result=mysqli_query($this->link, $sql);
		return $result;
	}
	
	public function deleteUserLanguages($iduser)
	{
		$sql = "DELETE FROM users_has_languages
			WHERE users_iduser = ".$iduser;
		
		$result=mysqli_query($this->link, $sql);
		return $result;
	}
	
	public function updateUser($iduser, $data)
	{
		$sql = "UPDATE users SET";
		foreach($data as $key => $value)
		{
			$sql.=$key."='".$value."',";
		}
		echo $sql;
		die;
	
		
		$result=mysqli_query($this->link, $sql);
		return $result;
	}
}