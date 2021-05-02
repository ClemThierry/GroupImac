<?php
require_once('controller.php');
header('Access-Control-Allow-Origin: *');
$page = explode('/', $_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

switch ($page[4]) {
	case 'profils' :
		switch ($method) {
			case 'GET' : 
				// affiche tous les projets (en tant que table pour le moment)
				echo getMembersAsTable();
				break;
			case 'POST' :
				// ajoute un profil 
				$json = file_get_contents('php://input');
				echo addAMember($json);
				break;

			default:
				http_response_code('404');
				echo 'OOPS';
		}
		break;
	case 'profil':
		switch ($method) {
			case 'GET':
				echo getAMemberById($page[5]);
				break;
			case 'DELETE':
				echo deleteAMember($page[5]);
				break;

			case 'UPDATE':
				$json = file_get_contents('php://input');
				echo updateAMember($json, $page[5]);
				break;
			default:
				http_response_code('404');
				echo 'OOPS';
		}
		break;
	default:
		http_response_code('500');
		echo 'unknown endpoint';
		break;
}
?>
