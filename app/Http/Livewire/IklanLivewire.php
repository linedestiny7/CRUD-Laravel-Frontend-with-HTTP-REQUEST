<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class IklanLivewire extends Component
{
    use WithFileUploads;
    public $id_iklan, $id_users, $judul_iklan, $ukuran_iklan, $posisi_iklan, $gambar_iklan, $created_at, $updated_at;

    public function render()
    {

        $json = Http::get("http://127.0.0.1:8070/api/iklan");
        $decode = json_decode($json, true);
        $this->iklan = $decode['data'];

        $json_users = Http::get("http://127.0.0.1:8070/api/users");
        $decode_users = json_decode($json_users, true);
        $this->users = $decode_users['data'];

        return view('livewire.iklan-livewire')
        ->extends('template')
        ->section('content');
    }

    public function Clearform(){
        $this->id_users = '';
        $this->judul_iklan = '';
        $this->ukuran_iklan = '';
        $this->posisi_iklan = '';
        $this->gambar_iklan = '';
    }

    public function store(){

        if($this->gambar_iklan){
            $gambar_iklan = $this->gambar_iklan->store('');
        } else{
            $gambar_iklan = 'no-image.png';
        };

        $insert = Http::post("http://127.0.0.1:8070/api/iklan/store", [
            'id_users' => $this->id_users,
            'judul_iklan' => $this->judul_iklan,
            'ukuran_iklan' => $this->ukuran_iklan,
            'posisi_iklan' => $this->posisi_iklan,
            'gambar_iklan' => $gambar_iklan,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
        $this->Clearform();
    }

    public function show($id){

        $json = Http::get("http://127.0.0.1:8070/api/iklan/show/".$id);
        $decode = json_decode($json, true);
        $this->id_iklan = $decode['data']['id_iklan'];
        $this->id_users = $decode['data']['id_users'];
        $this->judul_iklan = $decode['data']['judul_iklan'];
        $this->ukuran_iklan = $decode['data']['ukuran_iklan'];
        $this->posisi_iklan = $decode['data']['posisi_iklan'];
        $this->gambar_iklan = $decode['data']['gambar_iklan'];
    }

    public function update($id){

        $insert = Http::post("http://127.0.0.1:8070/api/iklan/update/".$id, [
            'id_users' => $this->id_users,
            'judul_iklan' => $this->judul_iklan,
            'ukuran_iklan' => $this->ukuran_iklan,
            'posisi_iklan' => $this->posisi_iklan,
            'gambar_iklan' => $this->gambar_iklan,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
    }

    public function destroy($id){

        $json = Http::get("http://127.0.0.1:8070/api/iklan/destroy/".$id);
        $decode = json_decode($json, true);

        session()->flash('pesan_delete',"Berhasil Menghapus Data!");
    }
}
