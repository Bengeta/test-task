<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getList()
    {
        $books_list = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->get();
        return view('books_list', compact("books_list"));
    }

    public function addBook(Request $request)
    {

        $errors = [];
        if ($request->isMethod('post')) {
            if ($request['title'] === null) {
                $errors['title'] = 'Title is empty';
            }
            if ($request['description'] === null) {
                $errors['description'] = 'Description is empty';
            }
            if ($request['author_id'] === null || Author::where('id','=',$request['author_id']) === null) {
                $errors['author_not_exist'] = 'Author does not exist';
            }
            if (count($errors) > 0) {
                $request->flash();
                return view('book_add', ['errors' => $errors, 'success' => false]);
            } else {
                $book = new Book();
                $book->title =  $request->input('title');
                $book->author_id = $request->input('author_id');
                $book->description = $request->input('description');
                $book->page_count = $request->input('page_count');
                $book->save();
                return redirect()
                    ->route('books')
                    ->with('success', true);
            }
        }
        return view('book_add', ['success' => true]);
    }
}
