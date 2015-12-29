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

/*
  $app->add(function (ServerRequestInterface $request, ResponseInterface $response, callable $next) {
  // Use the PSR 7 $request object

  return $next($request, $response);
  });
 */


$app->get('/hello(/(:name))', function ($name = "") {
    echo "Hello, $name";
});


/*

  $app->map('/actividades', function() {
  echo "Fancy, huh?";
  })->via('GET', 'POST', 'PUT', 'DELETE')->name('foo');


 */
/*
  $app['notFoundHandler'] = function ($app) {
  return function ($request, $response) use ($app) {
  GeneratorResponse::getInstancia()->setStatus(500);
  GeneratorResponse::getInstancia()->setStatusMsg(GeneratorResponse::getInstancia()->getEstado()[GeneratorResponse::getInstancia()->getStatus()]);
  GeneratorResponse::getInstancia()->setData('app no found');
  GeneratorResponse::getInstancia()->makeResponse();
  $body = GeneratorResponse::getInstancia()->getResponse();
  $app->response->setStatus(GeneratorResponse::getInstancia()->getStatus());
  $app->response->headers->set('Content-Type', 'application/json');
  $app->response->setBody($body);
  };
  }; */








$app->group('/actividades', function() use ($app) {

    $request = $app->request;


    require_once '../backend/controllers/actividad_controller.php';
    $app->get('(/(:id))', function ($id = null) use ($app) {

        $body = getActividades($id);
        $app->response->setStatus(GeneratorResponse::getInstancia()->getStatus());
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->setBody($body);
    });

    $app->post('/', function () use ($app) {

        try {

            $request = $app->request->post();
            $body = createActividad($request);
            $app->response->setStatus(GeneratorResponse::getInstancia()->getStatus());
            $app->response->headers->set('Content-Type', 'application/json');
            $app->response->setBody($body);
        } catch (Exception $ex) {

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

        try {

            $request = $app->request->put();
            $body = updateActividad($id, $request);
            $app->response->setStatus(GeneratorResponse::getInstancia()->getStatus());
            $app->response->headers->set('Content-Type', 'application/json');
            $app->response->setBody($body);
        } catch (Exception $ex) {

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

    $app->delete('/:id', function ($id) use ($app) {

        $body = deleteActividad($id);
        $app->response->setStatus(GeneratorResponse::getInstancia()->getStatus());
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->setBody($body);
    });

    $app->notFound(function() use ($app) {


        GeneratorResponse::getInstancia()->setStatus(404);
        GeneratorResponse::getInstancia()->setStatusMsg(GeneratorResponse::getInstancia()->getEstado()[GeneratorResponse::getInstancia()->getStatus()]);
        GeneratorResponse::getInstancia()->setData('app no found');
        GeneratorResponse::getInstancia()->makeResponse();
        $body = GeneratorResponse::getInstancia()->getResponse();
        $app->response->setStatus(GeneratorResponse::getInstancia()->getStatus());

        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->setBody($body);
      ///  $app->render(404, null);

        echo $body; 
    });
});





$app->run();

