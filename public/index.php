<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application(); 

$app->get('/hello/{name}', function($name) use($app) { 
    return 'Hello '.$app->escape($name); 
});


class User
{}

$viewManager = new DJ\View\ViewManager();
/*
class ViewApp extends DJ\View\GenericView
{
	use DJ\Index;
}

$viewManager[] = new ViewApp();
*/

class UserView extends DJ\View\ModelView
{
	public $model_class = 'User';
}

$viewManager[] = new UserView();

$viewManager($app);



$app->run();

//var_dump($app['routes']);