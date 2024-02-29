<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SppModel extends Model
{
    use HasFactory;
    protected $table ='pembayaran';
    protected $guarded = [];
}