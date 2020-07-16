<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/studies.css') }}">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Estudios</title>
</head>
<body>
    <div class="area">
        <h1 class="text-center mt-4"><i class="fas fa-user-graduate"></i> Mis Estudios</h1>

        <div class="btn-add-study mt-3">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalStudy"><i class="fas fa-plus"></i> Adicionar Estudio</button>
        </div>

        <div class="cards-studies">
            @foreach ($studies as $study)
                <div class="card mr-4 mt-3 mb-4">
                    <div class="card-body">
                        <form action="{{ url('studies/'.$study->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-sm btn-custom-danger btn-delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                        <input type="hidden" name="id" id="id_curriculum" class="form-control" value="{{ $study->fk_curriculum }}">
                        <h5 class="card-title">{{ $study->title }}</h5>
                        <span class="badge badge-info">{{ $study->type }}</span>
                        <span class="badge badge-secondary">{{ $study->institution }}</span>
                        <hr>
                        <p class="card-text">{{ $study->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $studies->links() }}
    </div>

    @include('users.technical.technical-menu')


    <!-- Modal -->
    <div class="modal fade" id="modalStudy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Estudio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="form-study">
                        @csrf
                        <input type="hidden" name="fk_curriculum" class="form-control" id="fk_curriculum">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="institution">Institución</label>
                                <input type="text" name="institution" class="form-control" id="institution">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="type">Tipo de Estudio</label>
                                <input type="text" name="type" class="form-control" id="type">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Título Obtenido</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="end_date">Fecha Finalización</label>
                                <input type="date" name="end_date" class="form-control" id="end_date">
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
                    <button type="button" class="btn btn-info" id="btn-add-study">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="{{ asset('js/studies.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@9.js') }}"></script>


    <script>
        $(document).ready(function() {
            /* ----------------------------------------------------------------------------- */
            
            @if(session('message'))
                Swal.fire({
                    title: 'Felicitaciones',
                    text: '{{ session('message') }}',
                    icon: 'success',
                    confirmButtonColor: '#00796b',
                });
            @endif

            /* ----------------------------------------------------------------------------- */

            @if(session('error'))
                Swal.fire({
                    title: 'Error',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonColor: '#00796b',
                });
            @endif

            /* ----------------------------------------------------------------------------- */
        });
    </script>
</body>
</html>