<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
require __DIR__ . '/../vendor/autoload.php';
$app = AppFactory::create();
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
$name = $args['name'];
$response->getBody()->write("Hello, $name");
return $response;
});

$app->get(
'/api/notes',
function (Request $request, Response $response, array $args) {
$notes = [
['id' => 1, 'name' => 'Spotkanie o 17:00', 'date' => '2021-03-13'],
['id' => 2, 'name' => 'Lekcje o 8:00', 'date' => '2021-03-15'],
['id' => 3, 'name' => 'Girls go IT!', 'date' => '2021-03-18'],
];
$payload = json_encode($notes);
$response->getBody()->write($payload);
return $response->withHeader('Content-Type', 'application/json');
}
);

$app->run();
