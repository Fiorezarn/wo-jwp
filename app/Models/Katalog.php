<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Katalog extends Model
{
    use HasFactory;

    protected $table = 'katalog';

    protected $fillable = ['nama_katalog', 'deskripsi', 'gambar', 'harga'];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_katalog', 'id_katalog');
    }
    public function allData()
    {
        return DB::table('katalog')->get();
    }
    public function detailData($id)
    {
        return DB::table('katalog')->where('id_katalog', $id)->first();
    }
    public function addData($data)
    {
        return DB::table('katalog')->insert($data);
    }
    public function editData($id, $data)
    {
        return DB::table('katalog')->where('id_katalog', $id)->update($data);
    }
    public function deleteData($id)
    {
        DB::table('katalog')
            ->where('id_katalog', $id)
            ->delete();
    }
}
