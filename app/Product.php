<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed category_id
 * @property mixed unit_measure
 * @property mixed name
 * @property mixed original_qty
 * @property mixed price
 * @property mixed id
 * @property mixed qty
 */
class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

   /* public function inStockQty()
    {
        return Stock::where('product_id', '=', $this->id);
    }*/

    public function available($date)
    {
        return Stock::received($date,$this->id);
        return $this->received() + $this->opening;
    }
}
