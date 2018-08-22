@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card border-success mb-3">
  <div class="card-header">{{'Lista de membresias'}}
      
          <button class="btn btn-success">
              <a style="color:black" href="{{route('addMembresia')}}"><i class="fa fa-plus-circle"></i>Agregar membresia</a>
              </button>
      
  </div>
  <div class="card-body text-success">
    <h5 class="card-title">Success card title</h5>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Tipo</th>
      <th scope="col">Precio</th>
       <th> Requisitos</th>
      <th scope="col">Estatus</th>
        <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      
      @foreach ($membresias as $m)      
    <tr>
      <th scope="row">{{$m->id}}</th>
      <td>{{$m->nombre}}</td>
      <td>{{$m->tipo->nombre}}</td>
      <td>{{$m->precio}}</td>
       <td>{{$m->requisitos}}</td>
      <td>  
      <span class="badge badge-{{($m->activo)==1?'success':'danger'}}">{{($m->activo)==1?'Activo':'Inactivo'}}</span>
      </td>
      <td>
          <span style="cursor: pointer " class="badge badge-light" onclick="activeDesactiveMembresia({{$m->id }})" data-toggle="tooltip" data-placement="top" title="{{($m->activo)==1?'Desactivar':'Activar'}}">
              <i class="fa fa-{{($m->activo)==1?'pause':'play'}}"></i>
          </span>          
          <a style="color:black" href=" {{route('getMembresia', [$m->id ])}}">
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