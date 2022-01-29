<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\GiftRequest;
use App\Http\Resources\Gift\GiftResource;
use App\Http\Resources\Gift\GiftCollection;
use App\Services\GiftService;
use App\Traits\ResponseUtils;

class GiftController extends Controller
{
    use ResponseUtils;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new GiftCollection(Gift::paginate(6));
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
    public function store(GiftRequest $request)
    {
        $validRequest = $request->validated();
        Gift::create(array_merge($validRequest, ['slug' => Str::slug($validRequest['series'])] ));

        return $this->sendResponseSuccess(__('response.success'));
    }

    /**
    * Give Redeem to specified resource by gift points.
    *
    * @param  \App\Models\Gift $gift
    * @return \Illuminate\Http\Response
    */
    public function redeem(Request $request, Gift $gift)
    {
        $stockItem =  (new GiftService)->checkStockItem($gift);
        
        if(!$stockItem)
            return response()->json([
                'status' => false,
                'message' => 'Tidak dapat melakukan redeem, dikarenakan stok item tidak tersedia.'
            ]);
    }

    /**
    * Give Rating to specified resource.
    *
    * @param  \App\Models\Gift $gift
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function rating(Request $request, Gift $gift)
    {
       $rating = (new GiftService)->giveRatingItem($gift, $request);

       if($rating)
            return response()->json([
                'status' => true,
                'message' => 'Berhasil, memberi nilai rating untuk item '.$gift->series
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function show(Gift $gift)
    {
        return new GiftResource($gift);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function edit(Gift $gift)
    {
        return new GiftResource($gift);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function update(GiftRequest $request, Gift $gift)
    {
        $validRequest = $request->validated();

        $gift->update($validRequest);

        return $this->sendResponseSuccess(__('response.success-update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();

        return $this->sendResponseSuccess(__('response.success-delete'));
    }
}
