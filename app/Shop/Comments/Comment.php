<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 03.11.18
 * Time: 10:00
 */

namespace App\Shop\Comments;


use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comments';

    protected $fillable = [
        'parent_id',
        'name',
        'email',
        'text',
        'product_id'
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }




}