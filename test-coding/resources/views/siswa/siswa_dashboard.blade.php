<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Siswa Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('siswa.logout') }}">Keluar</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Selamat datang, Siswa!</h1>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agenda as $key => $item)

                                <tr>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->deskripsi }} <br> {{ $item->tanggal_mulai }} - {{ $item->tanggal_berakhir }}</td>
                                </tr>
                                <tr>
                                    <td>Job Assignment <br><td>Sesuai Penugasan <br> </td> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
