<?php

// include ('../application/models/models_txtfile.php');
include ('../application/model/model_uploadfile.php');

include ('../application/model/model_users.php');
$config = parse_ini_file('../application/configs/settings.ini', TRUE);

// echo '<pre> $GET';
// print_r($_GET);
// echo '</pre>'.'</BR>';
// die;
// echo '<pre> $POST';
// print_r($_POST);
// echo '</pre>'.'</BR>';

if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';

switch ($action)
{
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
// 				array_pop($_POST)
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
				$freeindex = getFreeIndex($filas);
				
				ob_start();
				include('../application/views/users/insert_duties.php');
				$content=ob_get_contents();	
				ob_end_clean();
			}
		break;
		
		case 'insert':
		
			if ($_POST)
			{
				$photo_name = renameFile($_FILES['photo']['name'],
						$_SERVER['DOCUMENT_ROOT']);
				$destino = $_SERVER['DOCUMENT_ROOT'];
				// Inyectar nombre_final en post.
				if(isset($photo_name)&&$photo_name!=='')
					$_POST['photo']= $photo_name;
				uploadFile($photo_name, $destino, $_FILES['photo']);
				
// 				echo '<pre>';
// 				print_r($_POST);
// 				echo '</pre>';
// 				die;
				insert('users', $_POST, $_POST['iduser'],$config['database']);
				// Saltar a tabla de usuarios
				// header('Location: http://formularios.local/usuarios.php');
				header('Location: /users.php');
				// header('Location: usuarios.php');
			}
			else
			{
				ob_start();
				include('../application/views/users/insert.php');
				$content=ob_get_contents();
				ob_end_clean();
			}
			break;
		
	// UPDATE BLOCK		
			
	case 'update':
		if ($_POST)
		{
			update('users', $_POST, $_POST['iduser'],$config['database']);
			// TODO: revolve show images issue
			header('Location: /users.php');
		}
		else
		{
			$usuario=getUser($_GET['id'], $config['database']);
			ob_start();
				include('../application/views/users/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
	break;
	
	// DELETE BLOCK

	
	case 'delete':
		if($_POST)
		{
			if($_POST['borrar']=="Si")
			{
				deleteUser($_POST['id'],$config['database']);
				// TODO: delete image				
			}
			header('Location: /users.php');
		}
		else
		{
			$usuario=getUser($_GET['id'], $config['database']);
			ob_start();
				include('../application/views/users/delete.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
	break;

	// SELECT BLOCK
	
	case 'select':
	
		$filas=getUsers($config['database']);
		ob_start();
		include ('../application/views/users/select.phtml');
		$content=ob_get_contents();
		ob_end_clean();
		break;
	
	default:
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
	
	
	case 'select_duty':

			$sql = "SELECT 	noparadellover.duties.idduty as idduty,
							noparadellover.duties.duty	as duty
			
					FROM  	noparadellover.duties;";
				
			$filas = getQuery($sql, $config['db_projects']);
			// $filas=getProjectsperId(1,$config['db_projects']);
			ob_start();
			include ('../application/views/users/select_duty.phtml');
			$content=ob_get_contents();
			ob_end_clean();
	break;
	
}

// Include Layuout
include('../application/views/layouts/layout.phtml');




