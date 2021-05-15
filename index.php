<?php
session_start();
if (isset($_GET['p'])){
$params=explode('/',$_GET['p']);

if (isset($params[0]) & !empty($params[0])) 
{
	
	$controller=ucfirst($params[0]);
	$controller=$controller.'Controller';
	
	if (file_exists("Controllers/".$controller.".php")) 
	{	
		require_once "Controllers/".$controller.".php";
		$obj=new $controller();
		
		if (isset($params[1]) & !empty($params[1])) 
		{
			$action=$params[1];
			if (method_exists($obj,$params[1] )) 
			{
				
				
					$obj->$action();
				
			}else
			{	
				include('views/includes/404.php');
			}
		}else
		{
			$action="index";
			$obj->$action();
		}

	}else
	{
		include('views/includes/404.php');
	}
	
}else
{
	require_once "Controllers/HomeController.php";
	$obj=new HomeController();
	$obj->index('login');
}
}
else
{
	require_once "Controllers/HomeController.php";
	$obj=new HomeController();
	$obj->index('login');
}

?>
