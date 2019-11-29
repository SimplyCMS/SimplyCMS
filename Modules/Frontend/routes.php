<?php

/*
 * Extensibility
 * add before and after route events
 */
Route::any('{slug}', 'Frontend\Classes\FrontendController@handle')
    ->where('slug', '(.*)?')
    ->middleware('web');
