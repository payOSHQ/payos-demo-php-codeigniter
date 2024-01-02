<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/success', 'Home::success');

$routes->get('/cancel', 'Home::cancel');

$routes->post('/create-payment-link', 'Checkout::createPaymentLink');
