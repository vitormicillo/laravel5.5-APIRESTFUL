<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookController extends Controller
{
    use Helpers;

    public function __construct()
    {
        //If you need to ignore token authentication, set the name of the method here
       //$this->middleware('jwt.auth', ['except' => ['//nomedometodoaqui']]);
    }

    public function index()
    {
    	$currentUser = JWTAuth::parseToken()->authenticate();

        return $currentUser
                    ->books()
                    ->orderBy('created_at', 'DESC')
                    ->get()
                    ->toArray();
    }

    public function show($id)
    {
        $currentUser = JWTAuth::parseToken()->authenticate();

        $book = $currentUser->books()->find($id);

        if (!$book) {
            throw new NotFoundHttpException;
        }

        return $book;
    }

    public function store(Request $request)
    {
        $currentUser = JWTAuth::parseToken()->authenticate();

        $book = new Book;
        $book->title = $request->get('title');
        $book->author = $request->get('author');

        if ($currentUser->books()->save($book)) {

            // return $this->response->created([$book], 200);
            // or
            return response()->json($book,200);
        }

        return $this->response->error('could_not_create_book', 500);
    }

    public function update(Request $request, $id)
    {
        $currentUser = JWTAuth::parseToken()->authenticate();
        $book = $currentUser->books()->find($id);

        if (!$book) {
            throw new NotFoundHttpException;
        }

        $book->fill($request->all());

        if ($book->save()) {
            return $book;
        }

        return $this->response->error('could_not_update_book', 500);
    }

    public function destroy($id)
    {
        $currentUser = JWTAuth::parseToken()->authenticate();
        $book = $currentUser->books()->find($id);

        if (!$book) {
            throw new NotFoundHttpException;
        }

        if ($book->delete()) {
            return response()->json(['message' => 'book deleted'], 200);
        }

        return $this->response->error('could_not_delete_book', 500);
    }
}
