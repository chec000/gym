@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="card" >
  <div class="card-body">
  
      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Telefono</th>
       <th scope="col">Dirección</th>
      <th scope="col">Estado</th>
      <th scope="col">Fecha inscripción</th>
       <th scope="col">Activo</th>
               <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
      
      @foreach ($clientes as $c)
    <tr>
      <th scope="row">{{$c->id}}</th>
      <td>{{$c->usuario->name}}</td>
      <td>{{$c->usuario->apellido_paterno.' '.$c->usuario->apellido_materno}}</td>
      <td>{{$c->usuario->telefono}}</td>
       <td>{{$c->usuario->direccion}}</td>
       <td>{{$c->fecha_inscripcion}}</td>
       <td>{{$c->estado_cliente}}</td>                     
       <td>       
              <span  id="membresia_status-{{$c->activo}}"  class="badge badge-{{($c->activo)==1?'success':'danger'}}">{{($c->activo)==1?'Activo':'Inactivo'}}</span>          
       </td>
       <td>
                    <span style="cursor: pointer " class="badge badge-light" onclick="activeDesactiveCliente({{$c->id }})" data-toggle="tooltip" data-placement="top" title="{{($c->activo)==1?'Desactivar':'Activar'}}">
              <i class="fa fa-{{($c->activo)==1?'pause':'play'}}"></i>
          </span>          
          <a style="color:black" href=" {{route('edit_cliente', [$c->id ])}}">
              <span  style="cursor: pointer " class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Editar">                                          
              <i class="fa fa-edit"></i></span>                               
          </a>           
       </td>
    </tr>
    @endforeach
  </tbody>
</table>     
  </div>
</div>
    
</div>

@endsection
