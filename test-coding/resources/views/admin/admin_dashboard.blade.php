<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('instruktur.logout') }}">Keluar</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Selamat datang, Admin!</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Aktivitas Pembelajaran
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Method</th>
                                    @php
                                    $agenda = App\Lesson::latest()->get();
                                @endphp

                                @foreach($agenda as $item)
                                    <th>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('F') }}</th>
                                @endforeach
                                <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agenda as $key => $item)

                                <tr>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->deskripsi }} <br> {{ $item->tanggal_mulai }} - {{ $item->tanggal_berakhir }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal{{$item->id}}">
                                            Edit Data
                                        </button>
                                        <a href="#" class="btn btn-danger mb-3" onclick="deleteActivity({{ $item->id }})">Hapus Data</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Job Assignment <td>Sesuai Penugasan</td>  <td>Aksi</td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Activity</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('add.activity') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Judul Agenda</label>
                                            <input type="text"  name="judul" class="form-control" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi Agenda</label>
                                            <input type="text"  name="deskripsi" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_mulai">tanggal mulai</label>
                                            <input type="date" name="tanggal_mulai" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_berakhir">tanggal berakhir</label>
                                            <input type="date" name="tanggal_berakhir" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    @foreach($agenda as $key => $item)
                    <div class="modal fade" id="editModal{{$item->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Activity</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('activity.update', $item->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name">Judul Agenda</label>
                                            <input type="text" name="judul" class="form-control" required value="{{$item->judul}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi Agenda</label>
                                            <input type="text" name="deskripsi" class="form-control" required value="{{$item->deskripsi}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_mulai">tanggal mulai</label>
                                            <input type="date" name="tanggal_mulai" class="form-control" required value="{{$item->tanggal_mulai}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_berakhir">tanggal berakhir</label>
                                            <input type="date" name="tanggal_berakhir" class="form-control" required value="{{$item->tanggal_berakhir}}">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function deleteActivity(id) {
            Swal.fire({
                title: 'Hapu Data ini?',
                text: 'Data Tidak bisa Kembali!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'YA,Hapus ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('activity.delete', '') }}/" + id;
                }
            });
        }
    </script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
