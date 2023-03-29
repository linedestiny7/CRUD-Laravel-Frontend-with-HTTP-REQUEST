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
                <th scope="col">Nama Users</th>
                <th scope="col">Judul Iklan</th>
                <th scope="col">Ukuran Iklan</th>
                <th scope="col">Posisi Iklan</th>
                <th scope="col">Gambar Iklan</th>
                <th scope="col">Action</th>
          </tr>

          @foreach ($iklan as $row)

          <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $row['nama'] }}</td>
            <td>{{ $row['judul_iklan'] }}</td>
            <td>{{ $row['ukuran_iklan'] }}</td>
            <td>{{ $row['posisi_iklan'] }}</td>
            <td><img src="http://127.0.0.1:8000/images/{{ $row['gambar_iklan'] }}" height="100"/></td>
            <td><button wire:click.prevent="show({{ $row['id_iklan'] }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
                Edit
              </button>
              <button wire:click.prevent="destroy({{ $row['id_iklan'] }})" type="button" class="btn btn-primary">
                Hapus
              </button>
            </td>
          </tr>
          @endforeach
              </tr>
          </table>

            </div>
        </div>

        <!-- Modal Tambah -->
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form wire:submit.prevent="store">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Form Iklan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Id Users</label>
                    <select class="form-control" wire:model="id_users">
                        <option>Pilihan Users</option>
                        @foreach ($users as $row)
                        <option value="{{ $row['id_users'] }}">{{ $row['nama'] }} - {{ $row['level_users'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul Iklan</label>
                    <input type="text" name="judul_iklan" wire:model="judul_iklan" class="form-control">
                  </div>

                  <div class="mb-3">
                      <label class="form-label">Ukuran Iklan</label>
                      <input type="number" name="ukuran_iklan" wire:model="ukuran_iklan"  class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Posisi Iklan</label>
                      <input type="text" name="posisi_iklan" wire:model="posisi_iklan"  class="form-control">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Gambar Iklan</label>
                      <input type="file" name="gambar_iklan" wire:model="gambar_iklan"  class="form-control">
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
    <form wire:submit.prevent="update({{ $id_iklan }})">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Iklan {{ $id_iklan }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
            @endif

            <div class="mb-3">
                <label class="form-label">Id Users</label>
                <select class="form-control" wire:model="id_users">
                    <option>Pilihan Users</option>
                    @foreach ($users as $row)
                    <option value="{{ $row['id_users'] }}">{{ $row['nama'] }} - {{ $row['level_users'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Judul Iklan</label>
                <input type="text" name="judul_iklan" wire:model="judul_iklan" class="form-control">
              </div>

              <div class="mb-3">
                  <label class="form-label">Ukuran Iklan</label>
                  <input type="number" name="ukuran_iklan" wire:model="ukuran_iklan"  class="form-control">
                </div>

                <div class="mb-3">
                  <label class="form-label">Posisi Iklan</label>
                  <input type="text" name="posisi_iklan" wire:model="posisi_iklan"  class="form-control">
                </div>

                <div class="mb-3">
                  <label class="form-label">Gambar Iklan</label>
                  <input type="file" name="gambar_iklan" wire:model="gambar_iklan"  class="form-control">
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
