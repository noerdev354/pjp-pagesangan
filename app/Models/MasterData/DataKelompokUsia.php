<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelompokUsia extends Model
{
    protected $connection = 'mysql';
    public $incrementing = true;
    public $timestamps = false;
    protected $table = "data_kelompok_usia";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
