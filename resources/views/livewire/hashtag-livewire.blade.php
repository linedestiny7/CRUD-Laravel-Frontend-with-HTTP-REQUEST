<div>
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
                <th scope="col">Nama Hashtag</th>
                <th scope="col">Keterangan Hashtag</th>
                <th scope="col">Action</th>
              </tr>

              @foreach ($hashtag as $row)

              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $row['nama_hashtag'] }}</td>
                <td>{{ $row['keterangan_hashtag'] }}</td>
                <td><button wire:click.prevent="show({{ $row['id_hashtag'] }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
                    Edit
                  </button>
                  <button wire:click.prevent="destroy({{ $row['id_hashtag'] }})" type="button" class="btn btn-primary">
                    Hapus
                  </button>
                </td>
              </tr>
              @endforeach
          </table>

            </div>
        </div>

        <!-- Modal Tambah -->
    <div wire:ignore.self class="modal fade" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form wire:submit.prevent="store">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Form Hashtag</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
            @endif

                <div class="mb-3">
                    <label class="form-label">Nama Hashtag</label>
                    <input type="text" name="nama_hashtag" wire:model="nama_hashtag" class="form-control">
                  </div>

                  <div class="mb-3">
                      <label class="form-label">Keterangan Hashtag</label>
                      <textarea class="form-control" name="keterangan_hashtag" wire:model="keterangan_hashtag"></textarea>
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
    <form wire:submit.prevent="update({{ $id_hashtag }})">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Hashtag {{ $id_hashtag }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
            @endif

            <div class="mb-3">
                <label class="form-label">Nama Hashtag</label>
                <input type="text" name="nama_hashtag" wire:model="nama_hashtag" class="form-control">
              </div>

              <div class="mb-3">
                  <label class="form-label">Keterangan Hashtag</label>
                  <textarea class="form-control" name="keterangan_hashtag" wire:model="keterangan_hashtag"></textarea>
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

