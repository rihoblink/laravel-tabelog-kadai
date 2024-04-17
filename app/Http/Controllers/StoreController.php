<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::paginate(15);

        return view('store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('store.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store();
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        $store->price = $request->input('price');
        $store->hours = $request->input('hours');
        $store->code = $request->input('code');
        $store->address = $request->input('address');
        $store->phone = $request->input('phone');
        $store->holiday = $request->input('holiday');
        $store->category_id = $request->input('category_id');
        $store->save();

        return to_route('stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $reviews = $store->reviews()->get();

        return view('store.show', compact('store', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $categories = Category::all();

        return view('store.edit', compact('store', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $store->name = $request->input('name');
        $store->description = $request->input('description');
        $store->price = $request->input('price');
        $store->hours = $request->input('hours');
        $store->code = $request->input('code');
        $store->address = $request->input('address');
        $store->phone = $request->input('phone');
        $store->holiday = $request->input('holiday');
        $store->category_id = $request->input('category_id');
        $store->update();

        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete(); 

        return to_route('stores.index');
    }
}
