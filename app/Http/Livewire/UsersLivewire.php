<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class UsersLivewire extends Component
{
    use WithFileUploads;
    public $id_users, $nama, $telepon, $email, $password, $foto_users, $level_users, $created_at, $updated_at;

    public function render()
    {

        $json = Http::get("http://127.0.0.1:8070/api/users");
        $decode = json_decode($json, true);
        $this->users = $decode['data'];


        return view('livewire.users-livewire')
        ->extends('template')
        ->section('content');
    }

    public function Clearform(){
        $this->nama = '';
        $this->telepon = '';
        $this->email = '';
        $this->password = '';
        $this->foto_users = '';
        $this->level_users = '';
    }

    public function store(){

        if($this->foto_users){
            $foto_users = $this->foto_users->store('');
        } else{
            $foto_users = 'no-image.png';
        };

        $insert = Http::post("http://127.0.0.1:8070/api/users/store", [
            'nama' => $this->nama,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'password' => $this->password,
            'foto_users' => $foto_users,
            'level_users' => $this->level_users,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
        $this->Clearform();
    }

    public function show($id){

        $json = Http::get("http://127.0.0.1:8070/api/users/show/".$id);
        $decode = json_decode($json, true);

        $this->id_users = $decode['data']['id_users'];
        $this->nama = $decode['data']['nama'];
        $this->telepon = $decode['data']['telepon'];
        $this->email = $decode['data']['email'];
        $this->password = $decode['data']['password'];
        $this->foto_users = $decode['data']['foto_users'];
        $this->level_users = $decode['data']['level_users'];
    }

    public function update($id){

        $insert = Http::post("http://127.0.0.1:8070/api/users/update/".$id, [
            'nama' => $this->nama,
            'telepon' => $this->telepon,
            'email' => $this->email,
            'password' => $this->password,
            'foto_users' => $this->foto_users,
            'level_users' => $this->level_users,
        ]);

        session()->flash('pesan',"Berhasil Menyimpan Data!");
    }

    public function destroy($id){

        $json = Http::get("http://127.0.0.1:8070/api/users/destroy/".$id);
        $decode = json_decode($json, true);

        session()->flash('pesan_delete',"Berhasil Menghapus Data!");
    }
}
