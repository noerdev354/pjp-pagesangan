<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelas extends Model
{
    protected $connection = 'mysql';
    public $incrementing = true;
    public $timestamps = false;
    protected $table = "data_kelas";
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function getKelompokUsia()
    {
        return $this->hasOne(DataKelompokUsia::class, 'id','kelompok_usia_id');
    }
}
