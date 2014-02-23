<?php

// include ('../application/models/models_txtfile.php');
include ('../application/model/model_uploadfile.php');

include ('../application/model/model_users.php');
$config = parse_ini_file('../application/configs/settings.ini', TRUE);

// echo '<pre> $GET';
// print_r($_GET);
// echo '</pre>'.'</BR>';

// echo '<pre> $POST';
// print_r($_POST);
// echo '</pre>'.'</BR>';

if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';

echo $action;
		
switch ($action)
{
	
	
	case 'insert_duty':
		if ($_POST)
		{
			
			insertDuty ('users', $_POST, $_POST['iduser'],$config['database']);
			// Saltar a tabla de usuarios
			// header('Location: http://formularios.local/usuarios.php');
			echo 'antes del header al users.php';
		
			header('Location: /users.php');
			// header('Location: usuarios.php');
		}
		else
		{
			
// 			echo '<pre> $filas';
// 			print_r($filas);
// 			echo '</pre>'.'</BR>';
// 			echo 'aqui llego bien';
			ob_start();
			$usuario=getUser($_GET['id'], $config['database']);
			$filas = getProjects($_GET['id'], $config['db_projects']);
			include('../application/views/users/select_project.phtml');
			$content=ob_get_contents();
			ob_end_clean();
		}
		break;
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
			insert('users', $_POST, $_POST['iduser'],$config['$db']);
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

	case 'select':
		$filas=getUsers($config['database']);
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




