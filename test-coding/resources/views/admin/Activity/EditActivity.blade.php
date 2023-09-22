<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Tambah Activity</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('activity.edit') }}">
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
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
