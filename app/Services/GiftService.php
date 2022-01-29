<?php

namespace App\Services;

class GiftService
{
    /** Check Stock Item Gift.
     * 
     * @param object $gift
     * @return boolean
     */
    public function checkStockItem($gift)
    {
        $stockItem = $gift->stock;

        if($stockItem == 0) return false;
    }

    /** Check Stock Item Gift.
     * 
     * @param object $gift
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function giveRatingItem($gift, $request)
    {
        $data = $request->validate(
            ['rating' => 'required|numeric'], 
            ['rating.required' => 'Harap isi nilai rating.', 
            'rating.numeric' => 'Rating hanya mendukung format numeric.']);

        $gift->update(['rating' => $data['rating']]);

        return true;
    }
}