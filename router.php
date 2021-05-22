<?php

require_once('./Controller/controllerProjet.php');
require_once('./Controller/controllerComment.php');
require_once('./Controller/controllerProfil.php');

$page = explode('/',$_SERVER['REQUEST_URI']);
$method = $_SERVER['REQUEST_METHOD'];

$type = $page[3];
if (isset($page[4])) { $id = $page[4]; }

// si $page[3] existe   
if (isset($type)) {
	switch($type) {
		case 'projets' : 
			switch($method) {
				case 'GET' : 
					// tous les projets
					echo getProjets();
					break;

				case 'POST' :
					// ajoute un projet 
					$json = file_get_contents('php://input');
					echo addAProjet($json);
					addCatToProjet($json);
					break;

				default:
					http_response_code('404');
					echo 'OOPS';
			}
			break;

		case 'projet' :
			if (isset($id)) {
				switch($method) {
					case 'GET' : 
						// un seul projet 
						echo getAProjetByID($id);
						break;

					case 'DELETE' :
						// supprimer un projet 
						echo deleteAProjet($id);
						break;

					case 'UPDATE' :
						// modifier un projet
						$json = file_get_contents('php://input');
						echo deleteCatFromProjet($id);
						echo updateAProjet($json, $id);
						echo addCatToProjet($json);
						break;					

					default:
						http_response_code('404');
						echo 'OOPS';
				}
			}
			break;

		case 'comments' :
			switch($method) {
				case 'POST':
					$json = file_get_contents('php://input');
					echo addAComment($json);	  
					break;

				default:
					http_response_code('404');
					echo 'OOPS';
			}
			break;

		case 'comment' :
			if (isset($id)) {
				switch($method){
					case 'GET':
						echo getACommentById($id);
						break;

					case 'DELETE':
						echo deleteAComment($id);
						break;

					case 'UPDATE':
						// modifier un commentaire
						$json = file_get_contents('php://input');
						echo updateAComment($json, $id);
						break;

					default:
						http_response_code('404');
						echo 'OOPS';
				}
			}
			break;

			case 'profils' : 
				switch($method) {
					case 'GET' : 
						// tous les projets
						echo getProfils();
						break;
	
					case 'POST' :
						// ajoute un projet 
						$json = file_get_contents('php://input');
						echo addAProfil($json);
						echo addCatToProfil($json);
						break;
	
					default:
						http_response_code('404');
						echo 'OOPS';
				}
				break;	

				case 'profil' :
					if (isset($id)) {
						switch($method) {
							case 'GET' : 
								// un seul projet 
								echo getAProfilByID($id);
								break;
		
							case 'DELETE' :
								echo deleteAProfil($id);
								break;
		
							case 'UPDATE' :
								$json = file_get_contents('php://input');
								echo deleteCatFromProfil($id);
								echo updateAProfil($json, $id);
								echo addCatToProfil($json);
								break;					
		
							default:
								http_response_code('404');
								echo 'OOPS';
						}
					}
					break;		

		default: 
			http_response_code('500');
			echo 'unknown endpoint';
			break;
	}
}



?>