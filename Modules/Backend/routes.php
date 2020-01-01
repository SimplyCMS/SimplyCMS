<?php

Route::any('backend/{uri?}', 'Backend\Classes\BackendController@handle')
    ->where('uri', '(.*)?')
    ->middleware('web');
