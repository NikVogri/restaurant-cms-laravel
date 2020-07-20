<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index', [
            'items' => Item::orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        // ddd(request());
        $attributes = request()->validate([
            'name' => ['required'],
            'image' => ['file', 'required'],
            'price' => ['required'],
            'description' => ['required'],
            'category_id' => ['required']
        ]);

        $attributes['image'] = request('image')->store('items');

        Item::create($attributes);

        return redirect(route('items.index'))->with('message', 'Added new item successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', [
            'item' => $item,
            'categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Item $item)
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'image' => ['nullable', 'file'],
            'price' => ['required'],
            'description' => ['required'],
            'category_id' => ['required']
        ]);

        // check if image was uploaded
        if (request('image')) {
            // delete previous image from filesystem
            Storage::delete($item->image);
            // store new file
            $attributes['image'] = request('image')->store('items');
        }

        $item->update($attributes);

        return redirect(route('items.index'))->with('message', 'Item updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        // delete image from storage
        Storage::delete($item->image);
        // delete record in db
        $item->delete();
        return redirect(route('items.index'))->with('message', 'Item deleted');
    }
}