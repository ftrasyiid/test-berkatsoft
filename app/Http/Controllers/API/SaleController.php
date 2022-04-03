<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $sale;
    public function __construct(Sale $sale) {
        $this->sale = $sale;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = $this->sale->getSales();
        return SaleResource::collection($sales);
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
        $saleData = $this->validate($request, [
            'customer_id' => ['required', 'integer'],
            'product_id' => ['required', 'integer'],
            'sale_date' => ['required', 'date'],
            'quantity' => ['required', 'integer'],
        ]);

        return $this->sale->setSale($saleData);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $sale = $this->sale->getSale($id);
        return $sale;
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
        $saleData = $this->validate($request, [
            'customer_id' => ['required', 'integer'],
            'product_id' => ['required', 'integer'],
            'sale_date' => ['required', 'date'],
            'quantity' => ['required', 'integer'],
        ]);

        return $this->sale->updateSale($id, $saleData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->sale->deleteSale($id);

        return response(null, 204);
    }
}
