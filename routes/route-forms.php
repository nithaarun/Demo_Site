<?php



Route::get('forms/index',['as' => 'forms.index',
    'uses' => 'FormController@index']);

    Route::get('forms/create',['as' => 'forms.create',
    'uses' => 'FormController@create']);

    Route::post('form/save',['as' => 'form.save',
    'uses' => 'FormController@save']);

    Route::get('load/fields','FormController@loadFields');

    Route::get('form/view/{id}',['as' => 'form.view',
    'uses' => 'FormController@view']);

    Route::get('form/edit/{id}',['as' => 'form.edit',
    'uses' => 'FormController@edit']); 

    Route::get('form/delete/{id}',['as' => 'form.delete',
    'uses' => 'FormController@delete']);

    Route::post('form/update',['as' => 'form.update',
    'uses' => 'FormController@update']);


