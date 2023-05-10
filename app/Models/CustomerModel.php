<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
  protected $table = 'customers';
  public $timestamps = false;
  protected $fillable = ['cfname', 'clname','cbdate', 'caddress', 'cphone'];
}
