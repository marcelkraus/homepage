<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

$app->register(new TwigServiceProvider(), array(
    'twig.form.templates' => array('form.html.twig'),
    'twig.path' => __DIR__ . '/Resources/views',
));

$app->get('/', function () use ($app) {
    return $app['twig']->render('homepage.html.twig');
});

return $app;
