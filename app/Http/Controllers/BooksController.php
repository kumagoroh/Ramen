<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{

   public function index(Request $request)
   {
      $items = Books::all();
      return view('books.index', ['items' => $items]);
   }

   public function find(Request $request)
   {
      return view('books.find', ['input' => '']);
   }

   public function search(Request $request)
   {
      $item = Books::find($request->input);
      $param = ['input' => $request->input, 'item' => $item];
      return view('books.find', $param);
   }
   public function add(Request $request)
   {
      return view('books.add');
   }

   public function create(Request $request)
   {
      $this->validate($request, Books::$rules);
      $books = new Books;
      $form = $request->all();
      unset($form['_token']);
      $books->fill($form)->save();
      return redirect('/books');
   }

   public function editindex(Request $request)
   {
      $items = Books::all();
      return view('books.editindex', ['items' => $items]);
   }

   /* public function edit(Request $request)
   {
      $books = Books::find($request->id);
      return view('books.edit', ['form' => $books]);
   }
 */
   public function edit(Request $request)
   {
      if (!$request->id) {
         return redirect('books/editindex');
      }

      $books = Books::find($request->id);
      return view('books.edit', ['form' => $books]);
   }



   public function update(Request $request)
   {
      $this->validate($request, Books::$rules);
      $books = Books::find($request->id);
      $form = $request->all();
      unset($form['_token']);
      $books->fill($form)->save();
      return redirect('/books');
   }

   /* public function update(Request $request)
   {
      $this->validate($request, Books::$rules);
      $books = Books::find($request->id);
      $form = $request->all();
      if ($form) {
         unset($form['_token']);
         $books->fill($form)->save();
         return redirect('/books');
      }
      return redirect('/books.delindex');
   } */

   public function delindex(Request $request)
   {
      $items = Books::all();
      return view('books.delindex', ['items' => $items]);
   }

   public function delete(Request $request)
   {
      if (!$request->id) {
         return redirect('books/delindex');
      }
      $books = Books::find($request->id);
      return view('books.del', ['form' => $books]);
   }

   public function remove(Request $request)
   {
      Books::find($request->id)->delete();
      return redirect('/books');
   }
}
