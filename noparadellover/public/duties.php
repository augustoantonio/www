<?php




// include ('../application/models/models_txtfile.php');
include ('../application/model/model_uploadfile.php');

include ('../application/model/model_users.php');
$config = parse_ini_file('../application/configs/settings.ini', TRUE);


// $s = $config['db_projects'];
// echo '<pre>: $get:';
// print_r($_GET);
// echo '</pre>'.'</br>';
// die;

if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';



switch ($action)
{
	case 'update':
		if ($_POST)
		{
			update('projects', $_POST, $_POST['idproject'],$config['db_projects']);
			// TODO: revolve show images issue
			header('Location: /duties.php');
		}
		else
		{
			$usuario=getUser($_GET['id'], $config['db_projects']);
			ob_start();
				include('../application/views/users/insert_duties.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
		break;

	case 'insert':

		if ($_POST)
		{
			insertProject('projects', $_POST, $_POST['idproject'],$config['db_projects']);
			// insert('users', $_POST, $_POST['iduser'],$config['$db']);
			// Saltar a tabla de usuarios
			// header('Location: http://formularios.local/usuarios.php');
			header('Location: /duties.php');
			// header('Location: usuarios.php');
		}
		else
		{
			ob_start();
			include('../application/views/users/insert_duties.php');
			$content=ob_get_contents();
			ob_end_clean();
		}

	case 'delete':
		if($_POST)
		{
			if($_POST['borrar']=="Si")
			{
				deleteUser($_POST['id'],$config['db_projects']);
				// TODO: delete image				
			}
			header('Location: /users.php');
		}
		else
		{
			$usuario=getUser($_GET['id'], $config['db_projects']);
			ob_start();
				include('../application/views/users/delete.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
		break;

	case 'select':
		$filas=getProjects(1,$config['db_projects']);
		ob_start();
			include ('../application/views/users/select_project.phtml');
			$content=ob_get_contents();
		ob_end_clean();
		break;

	default:
		break;
}

// Include Layuout
include('../application/views/layouts/layout.phtml');




