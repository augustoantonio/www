<?php

class model_duties implements model_dutiesInterface
{
	public function __construct($config)
	{

		$txt = 'model_duties_mappers_'.$config['mapper'].'_duties';
		
		$this->mapper = new $txt($config);
// echo 'dentro de model_usersInteface';
// echo '<pre> Matriz: ';
// print_r($config);
// echo '</pre>';
// echo '$config: '.$config['mapper'];
// echo ($this->mapper);

		
	}
	
	public function getQuery($config)
	{
		return $this -> mapper -> getQuery($config);				
	}
	
		public function deleteDuty($id, $config)
		{ 
			return $this->mapper->deleteDuty($id, $config);
		}
		
	public function updateDuty($tablename, $data, $config)
	{
		return $this->mapper->updateDuty($data, $id, $config);
	}
	
	
	
	
}