<div>
    <div class="container">
        <div class="row">

        <h1>Tabel Data</h1>

        @if (session()->has('pesan_delete'))
    <span class="panel-desc" style="color:red;">{{ session('pesan_delete') }}</span>
    @endif

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah
        </button>

        <hr>
        <table class="table table-bordered">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Telepon</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Foto Users</th>
            <th scope="col">Level Users</th>
            <th scope="col">Action</th>
            </tr>

        @foreach ($users as $row)

          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $row['nama'] }}</td>
            <td>{{ $row['telepon'] }}</td>
            <td>{{ $row['email'] }}</td>
            <td>{{ $row['password'] }}</td>
            <td><img src="http://127.0.0.1:8000/images/{{ $row['foto_users'] }}" height="100"/></td>
            <td>{{ $row['level_users'] }}</td>
            <td><button wire:click.prevent="show({{ $row['id_users'] }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
                Edit
              </button>
              <button wire:click.prevent="destroy({{ $row['id_users'] }})" type="button" class="btn btn-primary">
                Hapus
              </button>
            </td>
          </tr>
        @endforeach
        </table>
        </div>
            </div>

    <!-- Modal Tambah -->
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form wire:submit.prevent="store">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Users</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
            @endif

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" wire:model="nama" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="number" name="telepon" wire:model="telepon" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" wire:model="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" wire:model="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Users</label>
                    <input type="file" name="foto_users" wire:model="foto_users" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Level Users</label>
                    <input type="text" name="level_users" wire:model="level_users" class="form-control">
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
                </form>
            </div>

            <!-- Modal Edit -->
<div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form wire:submit.prevent="update({{ $id_users }})">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Users {{ $id_users }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
            @endif

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" wire:model="nama" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="number" name="telepon" wire:model="telepon" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" wire:model="email" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" wire:model="password" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Users</label>
                <input type="file" name="foto_users" wire:model="foto_users" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Level Users</label>
                <input type="text" name="level_users" wire:model="level_users" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</form>
  </div>
</div>



