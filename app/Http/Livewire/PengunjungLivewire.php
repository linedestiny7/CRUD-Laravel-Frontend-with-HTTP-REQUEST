<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PengunjungLivewire extends Component
{
    public $id_pengunjung, $nama_pengunjung, $email_pengunjung, $telepon_pengunjung, $password, $created_at, $updated_at;

    public function render()
    {

        $json = Http::get("http://127.0.0.1:8070/api/pengunjung");
        $decode = json_decode($json, true);
        $this->pengunjung = $decode['data'];

        return view('livewire.pengunjung-livewire')
        ->extends('template')
        ->section('content');
    }

    public function Clearform(){
        $this->nama_pengunjung = '';
        $this->email_pengunjung = '';
        $this->telepon_pengunjung = '';
        $this->password = '';
    }

    public function store(){

        $insert = Http::post("http://127.0.0.1:8070/api/pengunjung/store", [
            'nama_pengunjung' => $this->nama_pengunjung,
            'email_pengunjung' => $this->email_pengunjung,
            'telepon_pengunjung' => $this->telepon_pengunjung,
            'password' => $this->password,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
        $this->Clearform();
    }

    public function show($id){

        $json = Http::get("http://127.0.0.1:8070/api/pengunjung/show/".$id);
        $decode = json_decode($json, true);

        $this->id_pengunjung = $decode['data']['id_pengunjung'];
        $this->nama_pengunjung = $decode['data']['nama_pengunjung'];
        $this->email_pengunjung = $decode['data']['email_pengunjung'];
        $this->telepon_pengunjung = $decode['data']['telepon_pengunjung'];
        $this->password = $decode['data']['password'];
    }

    public function update($id){

        $insert = Http::post("http://127.0.0.1:8070/api/pengunjung/update/".$id, [
            'nama_pengunjung' => $this->nama_pengunjung,
            'email_pengunjung' => $this->email_pengunjung,
            'telepon_pengunjung' => $this->telepon_pengunjung,
            'password' => $this->password,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
    }

    public function destroy($id){

        $json = Http::get("http://127.0.0.1:8070/api/pengunjung/destroy/".$id);
        $decode = json_decode($json, true);

        session()->flash('pesan_delete',"Berhasil Menghapus Data!");
    }
}
