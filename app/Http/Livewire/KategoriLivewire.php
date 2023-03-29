<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class KategoriLivewire extends Component
{
public $id_kategori, $nama_kategori, $keterangan_kategori, $created_at, $updated_at;

    public function render()
    {

        $json = Http::get("http://127.0.0.1:8070/api/kategori");
        $decode = json_decode($json, true);
        $this->kategori = $decode['data'];

        return view('livewire.kategori-livewire')
        ->extends('template')
        ->section('content');
    }

    public function Clearform(){
        $this->nama_kategori = '';
        $this->keterangan_kategori = '';
    }

    public function store(){

        $insert = Http::post("http://127.0.0.1:8070/api/kategori/create", [
            'nama_kategori' => $this->nama_kategori,
            'keterangan_kategori' => $this->keterangan_kategori,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
        $this->Clearform();
    }

    public function show($id){

        $json = Http::get("http://127.0.0.1:8070/api/kategori/show/".$id);
        $decode = json_decode($json, true);

        $this->id_kategori = $decode['data']['id_kategori'];
        $this->nama_kategori = $decode['data']['nama_kategori'];
        $this->keterangan_kategori = $decode['data']['keterangan_kategori'];
    }

    public function update($id){

        $insert = Http::post("http://127.0.0.1:8070/api/kategori/update/".$id, [
            'nama_kategori' => $this->nama_kategori,
            'keterangan_kategori' => $this->keterangan_kategori,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
    }

    public function destroy($id){

        $json = Http::get("http://127.0.0.1:8070/api/kategori/destroy/".$id);
        $decode = json_decode($json, true);

        session()->flash('pesan_delete',"Berhasil Menghapus Data!");
    }
}
