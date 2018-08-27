@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}
                   <button class="btn btn-success">
              <a style="color:black" href="{{route('list_membresia')}}">
                 <i class="fa fa-undo"></i>
                  Regresar</a>
              </button>
                </div>

                <div class="card-body">
                  <form method="POST" action="{{ route('saveMembresia') }}" aria-label="{{ __('Register') }}" id="register">
                        @csrf

                                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                            <div class="col-md-6">
                          
                                <select name="tipo" class="form-control">
                                        @foreach ($tipos as $t)                                             
                                        <option value="{{$t->id}}">{{$t->nombre}}</option>
                                        @endforeach                                  
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                  
                        
                                    <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" name="precio" value="{{ old('precio') }}" required>

                                @if ($errors->has('precio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('precio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        
                        
                                    <div class="form-group row">
                            <label for="requisitos" class="col-md-4 col-form-label text-md-right">{{ __('Requisitos') }}</label>
                            <div class="col-md-6">
                                <textarea id="fecha_nacimiento" type="" class="form-control{{ $errors->has('requisitos') ? ' is-invalid' : '' }}" name="requisitos" value="{{ old('requisitos') }}" required ></textarea>
                                @if ($errors->has('requisitos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('requisitos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="duracion" class="col-md-4 col-form-label text-md-right">{{ __('Duración') }}</label>
                            <div class="col-md-6">
                                <input id="duracion" type="date" class="form-control{{ $errors->has('duracion') ? ' is-invalid' : '' }}" name="duracion" value="{{ old('duracion') }}" required>

                                @if ($errors->has('duracion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('duracion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="card col-md-6">
  <div class="card-header">Beneficios</div>
  <div class="card-body">
                  @foreach ($beneficios as $b)                              
                  <div class="form-check" style="display: inline-block">
                                    <label class="form-check-label">
                                      <input name="beneficio[]" type="checkbox" class="form-check-input" value="{{$b->id}}">{{$b->nombre}}
                                    </label>
                                  </div>
                  @endforeach                               
  </div> 
</div>     
                        
                                         <div class="card col-md-6">
                        <div class="card-header">Beneficios</div>
                        <div class="card-body">
                  @foreach ($deportes as $b)                              
                  <div class="form-check" style="display: inline-block">
                                    <label class="form-check-label">
                                      <input name="deporte[]" type="checkbox" class="form-check-input" value="{{$b->id}}">{{$b->nombre}}
                                    </label>
                                  </div>
                  @endforeach                               
                    </div> 
                  </div> 
                        
              
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agregar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


