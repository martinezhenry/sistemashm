<?php

//require '../vendor/autoload.php';

require_once '../vendor/slim/slim/Slim/Slim.php';

require_once '../backend/core/Configurator.php';
require_once '../backend/core/GeneratorResponse.php';
require_once '../backend/core/DBManagement.php';


\Slim\Slim::registerAutoloader();

Configurator::getInstance();

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


$app->group('/actividades', function() use ($app) {

    require_once '../backend/controllers/actividad_controller.php';
    $app->get('(/(:id))', function ($id = null) use ($app) {

        $body = getActividades($id);
        $app->response->setStatus(GeneratorResponse::getInstancia()->getStatus());
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->setBody($body);
    });

    $app->post('/', function () use ($app) {

        try {
            
          4/0;
            
        $request = $app->request->post();
        $body = createActividad($request);
        $app->response->setStatus(GeneratorResponse::getInstancia()->getStatus());
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->setBody($body);
        } catch(Exception $ex){
            
            GeneratorResponse::getInstancia()->setStatus(500);
            GeneratorResponse::getInstancia()->setStatusMsg(GeneratorResponse::getInstancia()->getEstado()[GeneratorResponse::getInstancia()->getStatus()]);
            GeneratorResponse::getInstancia()->setData($ex->getMessage());
            GeneratorResponse::getInstancia()->makeResponse();
            $body = GeneratorResponse::getInstancia()->getResponse();
            $app->response->setStatus(GeneratorResponse::getInstancia()->getStatus());
            $app->response->headers->set('Content-Type', 'application/json');
            $app->response->setBody($body);
            //echo $ex->getMessage();            
            
        }
        
    });

    $app->put('/:id', function ($id) use ($app) {

        $request = $app->request->put();
        echo updateActividad($id, $request);
    });

    $app->delete('/:id', function ($id) {

        echo deleteActividad($id);
    });
});


$app->run();

