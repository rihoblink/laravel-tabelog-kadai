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
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $sorts = [
            '新着順' => 'created_at desc',
            '価格が安い順' => 'price asc',
        ];

        $sort_query = [];
        $sorted = "created_at desc";

        if ($request->has('select_sort')) {
            $slices = explode(' ', $request->input('select_sort'));
            $sort_query[$slices[0]] = $slices[1];
            $sorted = $request->input('select_sort');
        }

        if ($request->category !== null) {
            $stores = Store::where('category_id', $request->category)->sortable($sort_query)->orderBy('created_at', 'desc')->paginate(12);
            $total_count = Store::where('category_id', $request->category)->count();
            $category = Category::find($request->category);
        } elseif ($keyword !== null) {
            $stores = Store::where('name', 'like', "%{$keyword}%")->sortable($sort_query)->orderBy('created_at', 'desc')->paginate(12);
            $total_count = $stores->total();
            $category = null;
        } else {
            $stores = Store::sortable($sort_query)->orderBy('created_at', 'desc')->paginate(12);
            $total_count = $stores->total();
            $category = null;
        }

        $categories = Category::all();

        return view('store.index', compact('stores', 'category', 'categories', 'total_count', 'keyword', 'sorts', 'sorted'));
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
        $reviews = $store->reviews()->paginate(5);

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
