<?php
 
 namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 
 class BarangModel extends Model
 {
     use HasFactory;
 
     protected $table = 'm_barang';
     protected $primaryKey = 'barang_id';
     public $timestamps = true;
 
     protected $fillable = [
         'kategori_id',
         'kode_barang',
         'nama_barang',
         'harga_beli',
         'harga_jual',
     ];
 } 