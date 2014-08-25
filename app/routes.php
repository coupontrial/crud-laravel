
<?php
Route::get('/', function()
{
    return View::make('hello');
});
Route::resource('books','BookController');

//Route::get('/upload', 'ImageController@getUploadForm');
//Route::post('/upload/image','ImageController@postUpload');

Route::get('form', function(){
    return View::make('form');
});

Route::any('form-submit', function(){
    var_dump(Input::file('file'));
});
Route::any('form-submit', function(){
    return Input::file('file')->move(__DIR__.'/storage/',Input::file('file')->getClientOriginalName());
});

Route::get('/', function()
{
    return View::make('index');
});

Route::post('/', function()
{
    //var_dump(input::file('image'));
    //var_dump(input::get('title'));

    //get image
    $image = Input::file('image');
    //image name
    $filename = $image->getClientOriginalName();

    Input::file('image')->move(__DIR__.'/storage/',Input::file('image')->getClientOriginalName());

    //instantiate new product model
    $product = new Product;
    $product->title = Input::get('title');
    $product->image = $filename;

    //var_dump($product);
    $saveflag = $product->save();
    if($saveflag){
        return 'Product image Moved to path = "/var/www/html/book/app/storage" & product added to database';
    }

});