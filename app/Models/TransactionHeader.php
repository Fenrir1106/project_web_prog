<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function details(){
        return $this->hasMany(TransactionDetail::class, "header_id", "id");
    }
}
