@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col d-flex justify-content-center ">
        <div class="col-md-12">
            <div class="card border-primary mb-3" >
                <div class="card-header card-header-warning">{{ __('PERSONAS') }}
                <ul class="nav nav-pills card-header-pills" style="float: right;">
      <li class="nav-item">
        <a class="nav-link active" href="{{ url('/persona') }}">Agregar</a>
      </li>
     
    </ul>
                </div>

                <div class="card-body">
                  
                    <form id="basic-form" >
                    {{ csrf_field() }}
  <div class="flex flex-wrap -mx-3 mb-6">

  <!--!Fila triple columnas -->
  
  <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido Materno</th>

                <th>Correo</th>
                <th>Descripciòn</th>
            </tr>
        </thead>
        <tbody>
       
       
        @forelse ($personas as $person)
                  <tr>
                    <td>{{ $person->rut }}</td>
                    <td>{{ $person->nombre }}</td>
                    <td>{{ $person->apellido_paterno }}</td>
                    <td>{{ $person->apellido_materno }}</td>
                    <td>{{ $person->mail }}</td>
                    <td>{{ $person->direccion }}</td>

                 
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2">Sin registros.</td>
                  </tr>
                  @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Direcciòn</th>
            </tr>
        </tfoot>
    </table>
    </div>
  
</form>
                </div>
            </div>
        </div>


    </div>

    
</div>
@endsection
<script>

</script>