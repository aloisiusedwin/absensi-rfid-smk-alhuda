<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Absensi Siswa</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/4c4e4140eb.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand" href="#">  <img src="{{asset("img/logo.png")}}" width="100" height="100" class="d-inline-block align-top" alt="">
</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" class="text-danger">
        <a class="nav-link" href="/jadwal"><i class="fa fa-home fa-3x" data-toggle="tooltip" data-placement="bot" title="Home" aria-hidden="true"></i><span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="d-flex align-items-center" style="">
  <div class="mx-auto">
    
    @if ($jadwal != null)
    <h1>Jadwal Sekarang</h1>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{$jadwal->mapel}}</h5>
        <p class="card-text">Jam mulai <span class="badge text-bg-success">{{$jadwal->jam_mulai}}</span> </p>
      </div>
    </div>
    <div style="padding-left: 20px; margin-top: 10px">
      RFID
      <input type="text" name="rfid" id="rfid" autofocus>
    </div>

    
    @else

    <div class="mt-4 alert alert-danger" role="alert">
      <h4 class="alert-heading">Tidak ada Jadwal di jam {{$waktuSekarang}}</h4>
      <p>Tidak ada jadwal untuk hari ini, silahkan kembali lagi</p>
    </div>
    @endif
    
  </div>
</div>

  @vite('resources/js/homepage.js')
  <script>
        document.addEventListener('DOMContentLoaded', () => {
        const rfidInput = document.getElementById('rfid');

        // Event listener untuk mendeteksi perubahan atau pengisian input RFID
        rfidInput.addEventListener('change', () => {
            const rfidValue = rfidInput.value;

            if (rfidValue) {
                console.log(`RFID ${rfidValue} berhasil diproses`);
                rfidInput.value = '';
                rfidInput.focus();
            }
        });
    });
  </script>
</body>
</html>



    