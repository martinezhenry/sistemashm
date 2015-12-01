<?php

//require '../vendor/autoload.php';

require '../vendor/slim/slim/Slim/Slim.php';

require_once '../backend/core/Configurator.php';





\Slim\Slim::registerAutoloader();


$app = new \Slim\Slim(array(
    'debug' => true,
    'mode' => 'development',
    'log.enabled' => true
));


$app->get('/hello(/(:name))', function ($name = "") {
    echo "Hello, $name";
});


/*

$app->map('/actividades', function() {
    echo "Fancy, huh?";
})->via('GET', 'POST', 'PUT', 'DELETE')->name('foo');


*/


$app->group('/actividades', function() use ($app){

	require_once '../backend/controllers/actividad_controller.php';
	$app->get('(/(:id))', function ($id = null) {
    
            echo getActividades($id);
            
            echo Configurator::getInstance()->getName();
            
	});

	$app->post('/', function () use ($app){

		$request = $app->request->post();

    
    echo createActividad($request);
	});

	$app->put('/:id', function ($id) use ($app){

		$request = $app->request->put();

    
    echo updateActividad($id, $request);
	});

		$app->delete('/:id', function ($id) {
    
    echo deleteActividad($id);
	});


});


$app->run();

