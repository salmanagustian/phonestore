<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\GiftRequest;
use App\Http\Resources\Gift\GiftResource;
use App\Http\Resources\Gift\GiftCollection;
use App\Traits\ResponseUtils;

class GiftController extends Controller
{
    use ResponseUtils;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new GiftCollection(Gift::all());
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
