<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $product;
    public function __construct(Item $item) {
        $this->product = $item;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->getItems();
        return ItemResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemData = $this->validate($request, [
            'name' => ['required', 'string'],
            'weight' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'characteristic' => ['nullable', 'string']
        ]);

        return $this->product->setItem($itemData);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $item = $this->product->getItem($id);
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $itemData = $this->validate($request, [
            'name' => ['required', 'string'],
            'weight' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'characteristic' => ['nullable', 'string']
        ]);

        return $this->product->updateItem($id, $itemData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->product->deleteItem($id);

        return response(null, 204);
    }
}
