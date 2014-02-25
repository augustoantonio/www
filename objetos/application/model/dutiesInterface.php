<?php

interface model_dutiesInterface
{
	
	public function getQuery($config);
	public function deleteDuty($id, $config);
	
	public function updateDuty($tablename, $data, $config);

	
}