<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = ['email', 'id_pesanan', 'id_katalog', 'total_harga', 'tanggal', 'status'];

    public function katalog()
    {
        return $this->belongsTo(Katalog::class, 'id_katalog', 'id_katalog');
    }

    public function allData()
    {
        return DB::table('pesanan')->get();
    }
    public function detailData($id)
    {
        return DB::table('pesanan')->where('id_pesanan', $id)->first();
    }
    public function addData($data)
    {
        return DB::table('pesanan')->insert($data);
    }
    public function editData($id, $data)
    {
        return DB::table('pesanan')->where('id_pesanan', $id)->update($data);
    }
    public function deleteData($id)
    {
        DB::table('pesanan')
            ->where('id_pesanan', $id)
            ->delete();
    }
}
