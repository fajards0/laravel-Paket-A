<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;
    //Kolom(field) mana saja yang boleh di isi
    public $fillable = ['id_siswa', 'jumlah', 'tgl'];

    //Kolom(field) mana saja yang boleh di perlihatkan
    public $visible = ['id_siswa', 'jumlah', 'tgl'];
    public $timestamps = true;

    public function Siswa(){
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
