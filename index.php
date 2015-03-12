<?php 
/*$content = file_get_contents(__DIR__.'/test.json');
$obj = json_decode($content);
echo $obj->baz;*/

/*$obj = new stdClass();
$obj->title = 'Test';
$obj->text = 'foo bar baz';
echo json_encode($obj);
die;*/

require_once __DIR__.'/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$pathParts = explode('/', $path);
$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';

$controllerClassName = 'Application\\Controllers\\'.$ctrl.'Controller';

try{
	$controller = new $controllerClassName;
	$method = 'action'.$act;
	$controller->$method(); 

}catch(Exception $e){
	$view = new View();
	$view->error = $e->getMessage();
	header("HTTP/1.0 404 Not Found");
	$view->display('/../error.php');
}

?>