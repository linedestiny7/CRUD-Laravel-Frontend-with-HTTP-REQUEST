<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class BeritaLivewire extends Component
{
    use WithFileUploads;
    public $id_berita, $id_sub_kategori, $id_users, $judul_berita, $sub_judul_berita, $short_desc_berita, $isi_berita, $foto_berita, $lokasi_berita, $jumlah_berita_dibaca, $created_at, $updated_at;
    public function render()
    {

        $json = Http::get("http://127.0.0.1:8070/api/berita");
        $decode = json_decode($json, true);
        $this->berita = $decode['data'];

        $json_sub_kategori = Http::get("http://127.0.0.1:8070/api/subkategori");
        $decode_sub_kategori = json_decode($json_sub_kategori, true);
        $this->sub_kategori = $decode_sub_kategori['data'];

        $json_users = Http::get("http://127.0.0.1:8070/api/users");
        $decode_users = json_decode($json_users, true);
        $this->users = $decode_users['data'];

        return view('livewire.berita-livewire')
        ->extends('template')
        ->section('content');
    }

    public function Clearform(){
        $this->id_sub_kategori= '';
        $this->id_users= '';
        $this->judul_berita= '';
        $this->sub_judul_berita = '';
        $this->short_desc_berita = '';
        $this->isi_berita = '';
        $this->foto_berita = '';
        $this->lokasi_berita = '';
        $this->jumlah_berita_dibaca = '';
    }

    public function store(){

        if($this->foto_berita){
            $foto_berita = $this->foto_berita->store('');
        } else{
            $foto_berita = 'no-image.png';
        };

        $insert = Http::post("http://127.0.0.1:8070/api/berita/store/", [
            'id_sub_kategori' => $this->id_sub_kategori,
            'id_users' => $this->id_users,
            'judul_berita' => $this->judul_berita,
            'sub_judul_berita' => $this->sub_judul_berita,
            'short_desc_berita' => $this->short_desc_berita,
            'isi_berita' => $this->isi_berita,
            'foto_berita' => $foto_berita,
            'lokasi_berita' => $this->lokasi_berita,
            'jumlah_berita_dibaca' => $this->jumlah_berita_dibaca,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
        $this->Clearform();
    }

    public function show($id){

        $json = Http::get("http://127.0.0.1:8070/api/berita/show/".$id);
        $decode = json_decode($json, true);

        $this->id_berita = $decode['data']['id_berita'];
        $this->id_sub_kategori = $decode['data']['id_sub_kategori'];
        $this->id_users = $decode['data']['id_users'];
        $this->judul_berita = $decode['data']['judul_berita'];
        $this->sub_judul_berita = $decode['data']['sub_judul_berita'];
        $this->short_desc_berita = $decode['data']['short_desc_berita'];
        $this->isi_berita = $decode['data']['isi_berita'];
        $this->foto_berita = $decode['data']['foto_berita'];
        $this->lokasi_berita = $decode['data']['lokasi_berita'];
        $this->jumlah_berita_dibaca = $decode['data']['jumlah_berita_dibaca'];
}

    public function update($id){

    $insert = Http::post("http://127.0.0.1:8070/api/berita/update/".$id, [
        'id_sub_kategori' => $this->id_sub_kategori,
        'id_users' => $this->id_users,
        'judul_berita' => $this->judul_berita,
        'sub_judul_berita' => $this->sub_judul_berita,
        'short_desc_berita' => $this->short_desc_berita,
        'isi_berita' => $this->isi_berita,
        'foto_berita' => $this->foto_berita,
        'lokasi_berita' => $this->lokasi_berita,
        'jumlah_berita_dibaca' => $this->jumlah_berita_dibaca,
    ]);

    session()->flash('pesan',"Berhasil Menyimpan Data!");
}

public function destroy($id){

    $json = Http::get("http://127.0.0.1:8070/api/berita/destroy/".$id);
    $decode = json_decode($json, true);

    session()->flash('pesan_delete',"Berhasil Menghapus Data!");
}

}
