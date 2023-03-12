<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

   public function index(Request $request)
   {
      $items = Person::all();
      return view('person.index', ['items' => $items]);
   }

   public function find(Request $request)
   {
      return view('person.find', ['input' => '']);
   }

   public function search(Request $request)
   {
      $item = Person::find($request->input);
      $param = ['input' => $request->input, 'item' => $item];
      return view('person.find', $param);
   }
   public function add(Request $request)
   {
      return view('person.add');
   }

   public function create(Request $request)
   {
      $this->validate($request, Person::$rules);
      $person = new Person;
      $form = $request->all();
      unset($form['_token']);
      $person->fill($form)->save();
      return redirect('/person');
   }

   public function editindex(Request $request)
   {
      $items = Person::all();
      return view('person.editindex', ['items' => $items]);
   }

   public function edit(Request $request)
   {
      $person = Person::find($request->id);
      return view('person.edit', ['form' => $person]);
   }

   public function update(Request $request)
   {
      $this->validate($request, Person::$rules);
      $person = Person::find($request->id);
      $form = $request->all();
      unset($form['_token']);
      $person->fill($form)->save();
      return redirect('/person');
   }

   public function delindex(Request $request)
   {
      $items = Person::all();
      return view('person.delindex', ['items' => $items]);
   }

   public function delete(Request $request)
   {
      $person = Person::find($request->id);
      return view('person.del', ['form' => $person]);
   }

   public function remove(Request $request)
   {
      Person::find($request->id)->delete();
      return redirect('/person');
   }
}
