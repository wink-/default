<?php
Route::get('/', function () {
    return redirect('/admin/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('customers', 'Admin\CustomersController');
    Route::post('customers_mass_destroy', ['uses' => 'Admin\CustomersController@massDestroy', 'as' => 'customers.mass_destroy']);
    Route::post('customers_restore/{id}', ['uses' => 'Admin\CustomersController@restore', 'as' => 'customers.restore']);
    Route::delete('customers_perma_del/{id}', ['uses' => 'Admin\CustomersController@perma_del', 'as' => 'customers.perma_del']);

    Route::resource('contacts', 'Admin\ContactsController');
    Route::post('contacts_mass_destroy', ['uses' => 'Admin\ContactsController@massDestroy', 'as' => 'contacts.mass_destroy']);
    Route::post('contacts_restore/{id}', ['uses' => 'Admin\ContactsController@restore', 'as' => 'contacts.restore']);
    Route::delete('contacts_perma_del/{id}', ['uses' => 'Admin\ContactsController@perma_del', 'as' => 'contacts.perma_del']);
    
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'Admin\UserActionsController');
    
    Route::resource('processes', 'Admin\ProcessesController');
    Route::post('processes_mass_destroy', ['uses' => 'Admin\ProcessesController@massDestroy', 'as' => 'processes.mass_destroy']);
    Route::post('processes_restore/{id}', ['uses' => 'Admin\ProcessesController@restore', 'as' => 'processes.restore']);
    Route::delete('processes_perma_del/{id}', ['uses' => 'Admin\ProcessesController@perma_del', 'as' => 'processes.perma_del']);
    
    Route::resource('quotes', 'Admin\QuotesController');
    Route::post('quotes_mass_destroy', ['uses' => 'Admin\QuotesController@massDestroy', 'as' => 'quotes.mass_destroy']);
    Route::post('quotes_restore/{id}', ['uses' => 'Admin\QuotesController@restore', 'as' => 'quotes.restore']);
    Route::delete('quotes_perma_del/{id}', ['uses' => 'Admin\QuotesController@perma_del', 'as' => 'quotes.perma_del']);
    Route::get('quotes/{id}/copy', ['uses' => 'Admin\QuotesController@copy', 'as' => 'quotes.copy']);
    
    Route::resource('parts', 'Admin\PartsController');
    Route::post('parts_mass_destroy', ['uses' => 'Admin\PartsController@massDestroy', 'as' => 'parts.mass_destroy']);
    
    Route::resource('workorders', 'Admin\WorkordersController');
    Route::post('workorders_mass_destroy', ['uses' => 'Admin\WorkordersController@massDestroy', 'as' => 'workorders.mass_destroy']);
    
    Route::resource('discrepant_materials', 'Admin\DiscrepantMaterialsController');
    Route::post('discrepant_materials_mass_destroy', ['uses' => 'Admin\DiscrepantMaterialsController@massDestroy', 'as' => 'discrepant_materials.mass_destroy']);
    Route::post('discrepant_materials_restore/{id}', ['uses' => 'Admin\DiscrepantMaterialsController@restore', 'as' => 'discrepant_materials.restore']);
    Route::delete('discrepant_materials_perma_del/{id}', ['uses' => 'Admin\DiscrepantMaterialsController@perma_del', 'as' => 'discrepant_materials.perma_del']);

    Route::resource('corrective_actions', 'Admin\CorrectiveActionsController');
    Route::post('corrective_actions_mass_destroy', ['uses' => 'Admin\CorrectiveActionsController@massDestroy', 'as' => 'corrective_actions.mass_destroy']);
    Route::post('corrective_actions_restore/{id}', ['uses' => 'Admin\CorrectiveActionsController@restore', 'as' => 'corrective_actions.restore']);
    Route::delete('corrective_actions_perma_del/{id}', ['uses' => 'Admin\CorrectiveActionsController@perma_del', 'as' => 'corrective_actions.perma_del']);
    
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');

    Route::get('/downloadPDF/{id}', 'Admin\QuotesController@downloadPDF')->name('quotes.print');

    Route::get('search', 'MegaSearchController@search')->name('mega-search');
});
