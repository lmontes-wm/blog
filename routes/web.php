<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('emp/{id}/g/{type}', function($id, $type) {
    echo "id=>" . $id;
    echo "Type=>" . $type;
})->name('ArtSort');


/*
  Route::group(['prefix'=>'articles'],function(){
  Route::get('view/{article?}',function($article = 'default view'){
  $url = route('ArtSort', ['id' => '1','type' => 'n']);
  var_dump($url);
  echo "Articulo => {$article}";
  });
  });
 */

Route::group(['prefix' => 'catalog'], function() {
    Route::group(['prefix' => 'articles'], function() {
                                            //controlador@funcion
        Route::get('view/{id}', ['uses' => 'testController@view',
            'as' => 'articlesView'
        ]);
    });
    Route::group(['prefix' => 'sales'], function() {
                                            //controlador@funcion
        Route::get('view/{id}', ['uses' => 'testController@view',
            'as' => 'articlesView'
        ]);
    });
   
});

Route::group(['prefix' => 'admin'], function(){
    Route::resource('users','UsersController');
    Route::get('users/{id}/destroy',[
    'uses' => 'UsersController@destroy',
    'as' => 'admin.users.destroy'
  ]);
});
    

