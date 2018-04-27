<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
  protected $fillable = [
      'category_id',
      'title',
      'description',
      'date_init',
      'date_end',
      'hour',
      'hour_end',
      'place',
      'entrytype',
      'price',
      'webfacebook',
      'email',
      'image',
      'approved',
      'sticky',
      'note'
  ];

  public function category()
  {
    return $this->hasOne('App\Category', 'id', 'category_id');
  }

  public function scopeDatelimit($query)
   {
       return $query->where('date_init', '>=', date('Y-m-d', strtotime(Carbon::now())));
   }

  public function scopePopular($query)
   {
       return $query->where('approved', 1);
   }

   public function scopeNote($query)
    {
        return $query->where('note', 1);
    }
}
