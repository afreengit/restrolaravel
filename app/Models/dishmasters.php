<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dishmasters extends Model
{
    use HasFactory;
    protected $table='dishmasters';
    protected $primaryKey="dm_id";
    protected $keyType= 'int';
    public $incrementing=true;
    protected $fillable = [
        'dm_name',
        'dm_description',
        'dm_type',
        'dm_image',
        'dm_status',
    ];

    public function dishdetail()
    {
        return $this->hasMany(dishdetails::class,"dm_id");
    }
    // public function dc()
    // {
    //     return $this->hasManyThrough(dishdetails::class,dishcarts::class);
    // }
}
