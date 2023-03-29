<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SubKategoriLivewire extends Component
{
    public $id_sub_kategori, $id_kategori, $nama_sub_kategori, $keterangan_sub_kategori, $updated_at;
    public function render()
    {
        $json = Http::get("http://127.0.0.1:8070/api/subkategori");
        $decode = json_decode($json, true);
        $this->sub_kategori = $decode['data'];

        return view('livewire.sub-kategori-livewire')
        ->extends('template')
        ->section('content');
    }

    public function Clearform(){
        $this->id_kategori = '';
        $this->nama_sub_kategori = '';
        $this->keterangan_sub_kategori = '';
    }

    public function store(){

        $insert = Http::post("http://127.0.0.1:8070/api/subkategori/store", [
            'id_kategori' => $this->id_kategori,
            'nama_sub_kategori' => $this->nama_sub_kategori,
            'keterangan_sub_kategori' => $this->keterangan_sub_kategori
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
        $this->Clearform();
    }

    public function show($id){

        $json = Http::get("http://127.0.0.1:8070/api/subkategori/show/".$id);
        $decode = json_decode($json, true);

        $this->id_sub_kategori = $decode['data']['id_sub_kategori'];
        $this->id_kategori = $decode['data']['id_kategori'];
        $this->nama_sub_kategori = $decode['data']['nama_sub_kategori'];
        $this->keterangan_sub_kategori = $decode['data']['keterangan_sub_kategori'];
    }

    public function update($id){

        $insert = Http::post("http://127.0.0.1:8070/api/subkategori/update/".$id, [
            'id_kategori' => $this->id_kategori,
            'nama_sub_kategori' => $this->nama_sub_kategori,
            'keterangan_sub_kategori' => $this->keterangan_sub_kategori,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
    }

    public function destroy($id){

        $json = Http::get("http://127.0.0.1:8070/api/subkategori/destroy/".$id);
        $decode = json_decode($json, true);

        session()->flash('pesan_delete',"Berhasil Menghapus Data!");
    }
}
