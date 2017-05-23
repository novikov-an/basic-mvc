<?php
/**copyright**/

$router->get('', 'PageController@home');
$router->get('about', 'PageController@about');
$router->get('contact', 'PageController@contact');

$router->post('name', ' /add-name.php');

$router->get('users', 'UsersController@index');
$router->post('users', 'UsersController@add');
