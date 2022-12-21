<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPaymentsModel extends Model
{
    use HasFactory;
    protected $table = "customer_payments";
}
