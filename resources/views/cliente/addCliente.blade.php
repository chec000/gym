@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" id="register">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                                    <div class="form-group row">
                            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido paterno') }}</label>

                            <div class="col-md-6">
                                <input id="apellido_paterno" type="text" class="form-control{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>

                                @if ($errors->has('apellido_paterno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        
                                    <div class="form-group row">
                            <label for="apellido_materno" class="col-md-4 col-form-label text-md-right">{{ __('Apellido materno') }}</label>

                            <div class="col-md-6">
                                <input id="apellido_materno" type="text" class="form-control{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}" name="apellido_materno" value="{{ old('apellido_materno') }}" required>

                                @if ($errors->has('apellido_materno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                                    <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="tel" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" required>

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                    <div class="form-group row">
                            <label for="telefono_celular" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono celular') }}</label>

                            <div class="col-md-6">
                                <input id="telefono_celular" type="tel" class="form-control{{ $errors->has('telefono_celular') ? ' is-invalid' : '' }}" name="telefono_celular" value="{{ old('telefono_celular') }}" required>

                                @if ($errors->has('telefono_celular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono_celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                                    <div class="form-group row">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>

                                @if ($errors->has('fecha_nacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                    <div class="form-group row">
                            <label for="estado_civil" class="col-md-4 col-form-label text-md-right">{{ __('Estado civil') }}</label>

                            <div class="col-md-6">
                                <input id="estado_civil" type="text" class="form-control{{ $errors->has('estado_civil') ? ' is-invalid' : '' }}" name="estado_civil" value="{{ old('estado_civil') }}" required>

                                @if ($errors->has('fecha_nacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estado_civil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                                    <div class="form-group row">
                            <label for="pais" class="col-md-4 col-form-label text-md-right">{{ __('País') }}</label>

                            <div class="col-md-6">
                                <select name="pais"  class="form-control" id="pais" onchange="getEstadoPais(this);">
                                    @foreach ($paises as $p)
                                    <option  value="{{$p->id}}">{{$p->nombre}}</option>
                                    @endforeach
    
                                </select>

                                @if ($errors->has('pais'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pais') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                    <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                  <select name="estado"   class="form-control" id="estado">
                                      <option></option>
                                  </select>
                                @if ($errors->has('estado'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" required>

                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                
                    </form>
                                                    <div class="card">
                                               <div class="card-header">{{ __('Membresias') }}</div>
                                               <div class="card-body">   
                                                   <table class="table table-hover" id="tbl_membresias_agregadas">
                                                       <thead>Lista</thead>
                                                       <th>Membresia</th>
                                                           <th>Precio</th>
                                                         <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                        <th>Eliminar</th>
                                                            <tbody>     
                                                               
                                                            </tbody>
                                                   </table>                                                   
                                               </div>

                                </div>
                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button ype="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    {{ __('Register') }}
                                </button>                                 
                                
                            </div>
                        </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">           
            <div class="card">
                <div class="card-header">{{ __('Asignar  Membresias') }}</div>
                <div class="card-body">     
                            <div class="col-md-6">
                               <div class="wrap">
                                   <form action="" class="formulario">
                                            <ul>
                                @foreach ($membresias as $m)                                                                    
                            <div class="checkbox">		
                            <input type="checkbox" name="checkbox" id="checkbox-{{$m->id}}" onchange="agregarMembresia({{$m->id}},'{{$m->nombre}}',{{$m->precio}})">
                    <label for="checkbox-{{$m->id}}">{{$m->nombre}}</label>			
	</div>
                                    @endforeach         
                                </ul> 
                                       
                                   </form>
                               </div>
                                                                                        
                            </div>
                      
                </div>
            
        </div>
        </div>
            
    </div>
</div>




<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirmación de pago</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
  
      <div class="modal-body">
        Aqui poner el tipo de pago
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



{{ Form::open(array('url' => 'getEstados','id'=>'form_estado')) }}
<input type="hidden" id="id_pais" name="id_pais">

{{ Form::close() }}

    <script type="text/javascript">
//    $('#tbl_clientes').DataTable();
function agregarMembresia (id,nombre,precio){
console.log(id,nombre,precio);
var id_membresia="membresia-"+id;
  var m=$("#membresia-"+id);
     var cantidad= "<input class='form-control' type='text' \n\
 value=1 id=cantidad_m-"+id+"  onkeyup = 'if(event.keyCode == 13) addCantidad("+id+","+-1+","+precio+")'/>" ;
 if(m.length==0){
     var n = $('tr:last td', $("#tbl_membresias_agregadas")).length;
var tds ="<tr id="+id_membresia+"><td>"+nombre+"</td><td>"+precio+"</td>\n\
<td id=cantidad_membresia-"+id+">"+cantidad+"</td><td id=subtotal_membresia-"+id+">"+(precio*1)+"</td><td>\n\
<span onclick='eliminarMembresia("+id+")'><i class='fa fa-trash' aria-hidden='true'></i></span></td></tr>";
                                                                 ;
$("#tbl_membresias_agregadas").append(tds);

}else{     
    addCantidad(id,1,precio);
}



}

function addCantidad(id,cantidad,precio){
     var subtotal=$("#subtotal_membresia-"+id);    
    var old_value=  $("#cantidad_m-"+id) ;

if(cantidad===null){
     var ca=old_value.val();
     old_value.val(parseInt(ca)+1);
}
         
     subtotal.text(old_value.val()*precio);
               
}

function eliminarMembresia(id){
  $("#membresia-"+id).remove();

}

</script>

@endsection


