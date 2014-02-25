<?php

class model_duties_mappers_db_duties extends model_mappers_db
{
	public $link;
	public $config;
	
	
	public function __construct($config)
	{
		$this->config = $config;
		$this->link = parent::__construct($config);		
	}

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
}