<?php

	// echo 'dentro de model_usersInteface';
	// echo '<pre> Matriz: ';
	// print_r($config);
	// echo '</pre>';
	// echo $config['database']['mapper'];
	// die;

$config = parse_ini_file('../application/configs/settings.ini', TRUE);
include ('../application/autoload.php');

if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';

switch ($action)
{
			case 'delete_duty':
			
			if($_POST)
			{
			if($_POST['borrar']=="Si")
			{	
				deleteDuty('duties', $_GET['id'],$config['db_projects'] );
			}
				header('Location: users.php');
			}
			else
			{
				
				ob_start();
				include('../application/views/users/delete.php');
				$content=ob_get_contents();
				ob_end_clean();
			}
			break;	
	
		case 'insert_duty2user':
			
			if($_POST)
			{
				
				
			}
			else 
			{
				// TODO: adapt functions to take sql queries from .txt
				$sql = 
				$filas = getQuery($sql, $config['db_projects']);
				ob_start();
				include('../application/views/users/insert_dutyuser.php');
				$content=ob_get_contents();
				ob_end_clean();				
				
			}
			
		break;
	
		case 'insert_duty':
		
			if ($_POST)
			{
// 				echo '<pre> $POST';
// 				print_r($_POST);
// 				echo '</pre>';
// 						$POSTArray
// 						[dutyid] => 10
// 						[dutyname] => Consultor
// 						[submit] => Enviar consulta
//				17:49
// 				echo '<pre> $POST';
// 				print_r($_POST);
// 				echo '</pre>'.'</BR>';
// 				die;
				insert('noparadellover.duties', $_POST,$_POST['idduty'], $config['db_projects']);
				// Saltar a tabla de usuarios
				// header('Location: http://formularios.local/usuarios.php');
				header('Location: users.php');
				// header('Location: usuarios.php');
			}
			else
			{
				
				// this else was checked at 14.02.23 15.00. working.
				$sql = "SELECT 	noparadellover.duties.idduty as idduty,
							noparadellover.duties.duty	as duty
		
					FROM  	noparadellover.duties;";
				$filas = getQuery($sql, $config['db_projects']);

				ob_start();
				include('../application/views/users/insert_duties.php');
				$content=ob_get_contents();	
				ob_end_clean();
			}
		break;
		
			
	case 'select_duty':

			$obj = new model_duties($config['db_noparadellover']);
			// $filas=getProjectsperId(1,$config['db_projects']);
			$filas = $obj->getQuery($config['db_noparadellover']);
			ob_start();
			include ('../application/views/duties/select.phtml');
			$content=ob_get_contents();
			ob_end_clean();
	break;
	
		
		case 'update_duty':
			if ($_POST)
			{
				
// 				echo '<pre> $POST';
// 				print_r($_POST);
// 				echo '</pre>'.'</BR>';
				updateDuty('noparadellover.duties', $_POST, $config['db_projects']);

				header('Location: /users.php');
			}
			else
			{
				$sql = "SELECT 	noparadellover.duties.idduty as idduty,
							noparadellover.duties.duty	as duty
		
					FROM  	noparadellover.duties;";
				$filas = getQuery($sql, $config['db_projects']);
				ob_start();
				include('../application/views/users/insert_duties.php');
				$content=ob_get_contents();
				ob_end_clean();
			}
			break;
		

			
			case 'select_project':
	
		// TODO: move all sql query to setting.ini as an array with action as key
	
		$sql = "SELECT	noparadellover.projects.idproject as projectid,
						noparadellover.projects.alias as projectalias,
						noparadellover.projects.name as projectname,
						noparadellover.projects.tweet as projecttweet,
						noparadellover.projects.budget as projectbudget,
						noparadellover.projects.date_ini as projectdateini,
						noparadellover.projects.date_fini as projectfini,
						noparadellover.projects.description as projectdescription,
						noparadellover.duties.duty as projectduties,
						noparadellover.companies.name as projectcompany
				FROM  	noparadellover.projects, noparadellover.duties,
						noparadellover.companies
				GROUP BY noparadellover.projects.alias;";
	
		$filas = getQuery($sql, $config['db_projects']);
		ob_start();
		include ('../application/views/users/select_project.phtml');
		$content=ob_get_contents();
		ob_end_clean();
		break;
	


	
	
	
	case 'update':
		if ($_POST)
		{

			$obj = new model_users($config['database']);
			$obj->updateUser('users', $_POST, $_POST['iduser'],$config['database']);
			// TODO: Implementar cambiar imagen
			header('Location: /users.php');
		}
		else
		{

			$obj = new model_users($config['database']);
			$usuario=$obj->getUser($_GET['id'], $config['database']);
			ob_start();
				include('../application/views/users/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
	break;

	case 'insert':
		if ($_POST)
		{
			$obj = new model_users($config['database']);
			$obj->insertUser('users', $_POST, $_POST['iduser'],$config['database']);
			header('Location: /users.php');
		}
		else
		{
			ob_start();
			include('../application/views/users/insert.php');
			$content=ob_get_contents();
			ob_end_clean();
		}
	break;

	case 'delete':
		if($_POST)
		{
			if($_POST['borrar']=="Si")
			{
				$obj = new model_users($config['database']);
				$obj->deleteUser($_POST['id'],$config['database']);
				// TODO: delete image				
			}
			header('Location: /users.php');
		}
		else
		{	
			$obj = new model_users($config['database']);
			$usuario=$obj->getUser($_GET['id'], $config['database']);
			ob_start();
				include('../application/views/users/delete.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
	break;

	case 'select':
// echo '<pre> Matriz: ';
// print_r($config);
// echo '</pre>';
// echo 'VOY AQUI';
// die;
		
		$obj = new model_users($config['database']);
		$filas = $obj->getUsers();
		ob_start();
			include ('../application/views/users/select.phtml');
			$content=ob_get_contents();
		ob_end_clean();
	break;

	default:
	break;
}

// Include Layuout
include('../application/views/layouts/layout.phtml');




