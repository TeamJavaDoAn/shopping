<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\models\menu;
use Illuminate\Http\Request;
use Session;

class MenuController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$menu = menu::all();
		return view('backend.menu.index', compact('menu'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return View('backend.menu.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$menu = new menu;
		$menu->menu_name = $request->get('menu_name');
		$menu->menu_link = $request->get('menu_link');
		$menu->save();

		return redirect('menu')->with('success', 'Information has been added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$menu = menu::find($id);
		return view('backend.menu.edit', compact('menu', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		$menu = menu::findOrFail($id);
		$input = $request->all();

		$menu->fill($input)->save();

		return redirect('menu')->with('success', 'Information has been updated');

/*		$menu->save();
return redirect('menu');*/

		Session::flash('message', 'Successfully updated nerd!');
		return Redirect::to('menu');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$menu = menu::find($id);
		$menu->delete();
		return redirect('menu')->with('success', 'Information has been  deleted');
	}
}
