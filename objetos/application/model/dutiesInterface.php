<?php

interface model_dutiesInterface
{
	
	public function getQuery($action, $config);
	public function deleteDuty($id, $config);
	
	public function updateDuty($tablename, $data, $config);

	
}