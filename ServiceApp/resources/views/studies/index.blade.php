<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/technical.css') }}">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estudios</title>
</head>
<body>
    <div class="area">
        <h1 class="text-center mt-4"><i class="fas fa-user-graduate"></i> Mis Estudios</h1>
        <div class="cards-studies">
            @foreach ($studies as $study)
                <div class="card mr-4 mt-5 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $study->title }}</h5>
                        <span class="badge badge-info">{{ $study->type }}</span>
                        <span class="badge badge-secondary">{{ $study->institution }}</span>
                        <hr>
                        <p class="card-text">{{ $study->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('users.technical.technical-menu')
</body>
</html>