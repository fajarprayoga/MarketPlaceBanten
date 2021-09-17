<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('bantens', BantenController::class);
    $router->resource('upakaras', UpakaraController::class);
    $router->resource('pembelis', PembeliController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('kalender-upakaras', KalenderController::class);
    $router->resource('pengayah', PengayahController::class);
	$router->resource('benners', BennerController::class);
    $router->get('report/orders', 'ReportController@report');
    $router->get('report/print', 'ReportController@print');
});
