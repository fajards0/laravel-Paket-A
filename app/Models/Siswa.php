<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    //Kolom(field) mana saja yang boleh di isi
    public $fillable = ['nis', 'nama', 'kelas', 'jk', 'agama', 'alamat'];

    //Kolom(field) mana saja yang boleh di perlihatkan
    public $visible = ['nis', 'nama', 'kelas', 'jk', 'agama', 'alamat'];
    public $timestamps = true;

    public function Tabungan()
    {
        return $this->hasOne(Tabungan::class, 'id_tabungan');
    }

    // menghapus foto
    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/siswa/' . $this->foto))) {
            return unlink(public_path('images/siswa/' . $this->foto));
        }
    }
}
