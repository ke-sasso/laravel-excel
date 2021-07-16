<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f2f2;
        }

        #file_target img {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }

        #venue_target img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .input-group-addon>.material-icons {
            font-size: 1.3rem;
        }

        #venue_map {
            width: 100%;
            height: 200px;
            background-color: lavender;
            border-radius: 4px;
        }

    </style>

    <title>CARGA EXCEL</title>
</head>
<body>
    <div class='container mt-5 mb-5'>
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            <div class='row mt-5'>
                <div class='col-sm-12'>
                     @if ($message = Session::get('message-success'))
                        <div class="alert alert-success" role="alert">
                        {!! $message !!}
                        </div>
                    @endif
                    @if ($message = Session::get('message-error'))
                        <div class="alert alert-danger" role="alert">
                        {!! $message !!}
                        </div>
                    @endif

                    <div class="card text-center">
                        <div class='card-header'>
                            <i class="bi bi-file-earmark-spreadsheet"></i> IMPORTACIÓN DE ARCHIVO EXCEL - FECHAS DE CUMPLEAÑOS
                        </div>
                        <div class='card-body'>
                            <h5 class="card-title">¡RECORDATORIO - FECHAS DE CUMPLEAÑOS CLIENTES!</h5>
                            <p class="card-text">Adjuntar archivo excel y nosotros nos encargamos de enviarte un correo con los clientes que estas cumpliendo años el día de ahora.  <p class="card-text"><small class="text-muted"><b>{{date('Y-m-d')}}</b></small></p> </p>
                            {{--<div class='form-row'>
                                <div class='form-group col-md-12'>
                                    <label for='ticket_name'>Name</label>
                                    <input class='form-control' id='ticket_name' type='text'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='ticket_description'>Description</label>
                                <textarea class='form-control' id='ticket_description' rows='4'></textarea>
                            </div>--}}
                            <div class='form-group'>
                                <label for='ticket_description'><i class="bi bi-calendar-plus"></i> Adjunta archivo excel</label>
                                <input type="file" name="file" accept=".xlsx" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @csrf
            <div class="card-footer">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <button class='btn btn-primary' type="submit">
                                <i class="bi bi-shift"></i> Subir archivo
                            </button>
                        </div>
                        <div class="col-6">
                        </div>
                        <div class="col">
                            <button class='btn btn-info' type="submit"><i class="bi bi-envelope-open"></i> Enviar recordatorio  <i class="bi bi-arrow-repeat"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
