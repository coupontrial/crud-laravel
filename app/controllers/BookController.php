<?php

class BookController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //get all Books
        $booksList=Book::all();
        return View::make('books.index',compact('booksList'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('books.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //create a rule validation
        $rules=array(
            'isbn'=>'required',
            'title'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'language'=>'required|numeric'
        );
        //get all book information
        $bookInfo = Input::all();
        //validate book information with the rules
        $validation=Validator::make($bookInfo,$rules);
        if($validation->passes())
        {
            //save new book information in the database
            //and redirect to index page
            Book::create($bookInfo);
            return Redirect::route('books.index')
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'Successfully created book.');
        }
        //show error message
        return Redirect::route('books.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Some fields are incomplete.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        //get the current book by id
        //get the current book by id
        $book = Book::find($id);
        if (is_null($book))
        {
            return Redirect::route('books.index');
        }
        //redirect to update form
        return View::make('books.edit', compact('book'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        //create a rule validation
        $rules=array(
            'isbn'=>'required',
            'title'=>'required',
            'author'=>'required',
            'publisher'=>'required',
            'language'=>'required|numeric'
        );
        $bookInfo = Input::all();
        $validation = Validator::make($bookInfo, $rules);
        if ($validation->passes())
        {
            $book = Book::find($id);
            $book->update($bookInfo);
            return Redirect::route('books.index')
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'Successfully updated Book.');
        }
        return Redirect::route('books.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');

    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Book::find($id)->delete();
        return Redirect::route('books.index')
            ->withInput()
            ->with('message', 'Successfully deleted Book.');
	}



}
