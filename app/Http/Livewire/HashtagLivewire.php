<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class HashtagLivewire extends Component
{
    public $id_hashtag, $nama_hashtag, $keterangan_hashtag, $created_at, $updated_at;
    public function render()
    {

        $json = Http::get("http://127.0.0.1:8070/api/hashtag");
        $decode = json_decode($json, true);
        $this->hashtag = $decode['data'];

        return view('livewire.hashtag-livewire')
        ->extends('template')
        ->section('content');
    }

    public function Clearform(){
        $this->nama_hashtag= '';
        $this->keterangan_hashtag = '';
    }


    public function store(){

        $insert = Http::post("http://127.0.0.1:8070/api/hashtag/store/", [
            'nama_hashtag' => $this->nama_hashtag,
            'keterangan_hashtag' => $this->keterangan_hashtag,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
        $this->Clearform();
    }

    public function show($id){

        $json = Http::get("http://127.0.0.1:8070/api/hashtag/show/".$id);
        $decode = json_decode($json, true);

        $this->id_hashtag = $decode['data']['id_hashtag'];
        $this->nama_hashtag = $decode['data']['nama_hashtag'];
        $this->keterangan_hashtag = $decode['data']['keterangan_hashtag'];
    }

    public function update($id){

        $insert = Http::post("http://127.0.0.1:8070/api/hashtag/update/".$id, [
            'nama_hashtag' => $this->nama_hashtag,
            'keterangan_hashtag' => $this->keterangan_hashtag,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
    }

    public function destroy($id){

        $json = Http::get("http://127.0.0.1:8070/api/hashtag/destroy/".$id);
        $decode = json_decode($json, true);

        session()->flash('pesan_delete',"Berhasil Menghapus Data!");
    }
}
