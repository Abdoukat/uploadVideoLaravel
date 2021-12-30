<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,   shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Video upload</title>
</head>

<body>
    {{--<div class="container-fluid">
        <h3>Charger une vidéo:</h3>
        <form method="POST" action="{{ url('uploadVideo') }}" enctype="multipart/form-data">
             {{ method_field('POST') }}
            @csrf
            <div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="title" id="title" placeholder="Entrez le Titre...">
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <input class="form-control" type="file" name="video" id="video">
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <input type="submit" class=" btn btn-primary" >
                </div>
            </div>

        </form>
    </div>--}}
    <div class="content d-flex justify-content-center" style="width: 100%; height: 100%;">
        <div class="card text-center " style="width: 30rem; margin-top: 50px; margin-bottom: 20px">
            <div class="card-header">
                <h3>Charger une vidéo:</h3>
            </div>
            <div class="card-body">
                @if (Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{Session::get('success')}}</strong>

                    </div>
                @endif

                @if (Session::get('danger'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{Session::get('danger')}}</strong>

                    </div>
                @endif
                <form method="POST" action="{{ url('uploadVideo') }}" enctype="multipart/form-data">
                    {{-- {{ method_field('POST') }} --}}
                    @csrf
                    <div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="title" id="title" placeholder="Entrez le Titre...">
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="video" id="video" content="test">
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Envoyer">
                            <input type="button" class="btn btn-primary btn-block" value="Show video" href="" onclick="popshow()" id="btnshow">
                        </div>
                    </div>

                </form>

            </div>
            <div class="card-footer"  >
                <div class="invisible"  id="popshow">
                    <h1>{{ $data->title }}</h1>
                    <video controls width="450">
                        <source src="uploads/{{ $data->video }}" type="video/webm">
                    </video>
                </div>
            </div>
        </div>
    </div>


<script>
    function popshow(){
        var element = document.getElementById('popshow');
        var element2 = document.getElementById('btnshow');

            if (element.classList.contains('invisible')) {
                element.classList.remove('invisible');
                element.classList.add('visible');
                element2.value="Hide video";
            } else {
                element.classList.add('invisible');
                element.classList.remove('visible');
                element2.value="Show video";
            }

    }

</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
