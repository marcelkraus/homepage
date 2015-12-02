<?php

use Silex\Provider\TwigServiceProvider;

$loader = require_once __DIR__ . '/../vendor/autoload.php';
$loader->add(null, __DIR__.'/../src');

$app = new Silex\Application();
$app['debug'] = (strstr($_SERVER['SERVER_NAME'], '.dev') || strstr($_SERVER['SERVER_NAME'], 'staging.')) ? true : false;

$app->register(new TwigServiceProvider(), array(
    'twig.form.templates' => array('form.html.twig'),
    'twig.path' => __DIR__ . '/Resources/views',
));

$app->get('/', function () use ($app) {
    return $app['twig']->render('homepage.html.twig');
});

$app->run();
