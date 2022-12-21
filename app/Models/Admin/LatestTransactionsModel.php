<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatestTransactionsModel extends Model
{
    use HasFactory;
    protected $table = "latest_transactions";
}
