<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('customers', 'CustomersController', ['except' => ['create', 'edit']]);

        Route::resource('contacts', 'ContactsController', ['except' => ['create', 'edit']]);

        Route::resource('processes', 'ProcessesController', ['except' => ['create', 'edit']]);

        Route::resource('quotes', 'QuotesController', ['except' => ['create', 'edit']]);

        Route::resource('parts', 'PartsController', ['except' => ['create', 'edit']]);

        Route::resource('workorders', 'WorkordersController', ['except' => ['create', 'edit']]);

});
