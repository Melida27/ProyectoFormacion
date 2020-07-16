<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/experiences.css') }}">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Experiencias</title>
</head>
<body>
    <div class="area">
        <h1 class="text-center mt-4"><i class="fas fa-briefcase"></i> Mis Experiencias</h1>

        <div class="btn-add-experience mt-3">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalExperience"><i class="fas fa-plus"></i> Adicionar Experiencia</button>
        </div>

        <div class="cards-experiences">
            @foreach ($experiences as $experiency)
                <div class="card mr-4 mt-3 mb-4">
                    <div class="card-body">
                        <input type="hidden" name="id" id="id_curriculum" class="form-control" value="{{ $experiency->fk_curriculum }}">
                        <h5 class="card-title">{{ $experiency->position }}</h5>
                        <span class="badge badge-info">{{ $experiency->company_name }}</span>
                        <span class="badge badge-secondary">{{ $experiency->time_experience_company }}</span>
                        <hr>
                        <p class="card-text">{{ $experiency->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $experiences->links() }}
    </div>

    @include('users.technical.technical-menu')


    <!-- Modal -->
    <div class="modal fade" id="modalExperience" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Experiencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="form-experience">
                        @csrf
                        <input type="hidden" name="fk_curriculum" class="form-control" id="fk_curriculum">

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="company_name">Empresa</label>
                                <input type="text" name="company_name" class="form-control" id="company_name">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="position">Cargo</label>
                                <input type="text" name="position" class="form-control" id="position">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="time_experience_company">Tiempo Laborado</label>
                                <input type="text" name="time_experience_company" class="form-control" id="time_experience_company">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-info" id="btn-add-experience">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="{{ asset('js/experiences.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@9.js') }}"></script>
</body>
</html>