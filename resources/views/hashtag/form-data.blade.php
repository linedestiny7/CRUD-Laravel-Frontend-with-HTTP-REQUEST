<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marisha - News</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
          </a>

          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Kategori</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Hashtag</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Berita</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Pengunjung</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Iklan</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Users</a></li>
          </ul>

          <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
          </div>
        </header>
      </div>
    </header>

    <form>
        <div class="mb-3">
          <label class="form-label">Nama Hashtag</label>
          <input type="text" name="nama_hashtag" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan Hashtag</label>
            <input type="text" name="keterangan_hashtag" class="form-control">
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
