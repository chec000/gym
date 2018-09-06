@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="card" >
  <div class="card-body">
            <a href="{{route('addDeporte')}}" class="small-box-footer">Agregar deporte <i class="fa fa-arrow-circle-right"></i></a>
           
  
      <table class="table table-striped " id="tbl_clientes">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Beneficios</th>
       <th scope="col">Foto</th>
      <th scope="col">Estatus</th>
         <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
      
      @foreach ($deportes as $d)
    <tr>
      <th scope="row">{{$d->id}}</th>
      <td>{{$d->nombre}}</td>
      <td>{{$d->descripcion}}</td>
           <td>
               <ul>
               @foreach($d->objetivos as $o)            
                                  <li>   <span>{{$o->nombre}}</span></li>
          @endforeach
               </ul>
           
           </td>
      <td>{{$d->foto}}</td>      
      <td>       
              <span  id="deporte_status-{{$d->id}}"  class="badge badge-{{($d->activo)==1?'success':'danger'}}">{{($d->activo)==1?'Activo':'Inactivo'}}</span>          
       </td>
       <td>
                    <span style="cursor: pointer " class="badge badge-light" onclick="activeDesactiveDeporte({{$d->id }})" data-toggle="tooltip" data-placement="top" title="{{($d->activo)==1?'Desactivar':'Activar'}}">
              <i class="fa fa-{{($d->activo)==1?'pause':'play'}}"></i>
          </span>          
          <a style="color:black" href=" {{route('edit_cliente', [$d->id ])}}">
              <span  style="cursor: pointer " class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Editar">                                          
              <i class="fa fa-edit"></i></span>                               
          </a>           
       </td>
    </tr>
    @endforeach
  </tbody>
</table>     
  </div>
 <form method="POST" action="{{ route('activeInactive_deporte') }}" id="active_deporte">
            @csrf
          <input type="hidden" name="id" id="id">
      </form>
</div>
    <script type="text/javascript">
//    $('#tbl_clientes').DataTable();
function activeDesactiveDeporte (id){
 form = $("#active_deporte");
   $("#id").val(id);
            var cliente=$('#deporte_status-'+id);

    $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: form.serialize()
    }).done(function (data) {
        if (data==="1") {
          cliente.removeClass('badge-danger');
           cliente.addClass('badge-success');       
           cliente.text("activo");
    }else{
          cliente.removeClass('badge-success');
           cliente.addClass('badge-danger');
               cliente.text("inactivo");

    }
    })

            .fail(function (data) {
                console.log(data);
            });
   
}
</script>
</div>

@endsection
