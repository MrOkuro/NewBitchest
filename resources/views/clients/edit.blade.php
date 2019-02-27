@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('clients.partials.sidenav')

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <form class="form-horizontal" method="POST" action="{{ route('admin.users.update', Auth::user()->id) }}">
                            {{ csrf_field() }}
                    {{ method_field('PUT') }} 


                    <div class="form-row form-group">
         
            <div class="col-md-3">
                <label for="name" class="control-label font-weight-bold">@lang('Name')</label>
                <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} " name="name" value="{{ (!empty($user->name)) ? $user->name : old('name') }}" placeholder="name" autofocus>
                @if ($errors->has('name'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div>

            <div class="col-md-3">
                <label for="email" class="control-label font-weight-bold">@lang('email')</label>
                <input id="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} " name="email" value="{{ (!empty($user->email)) ? $user->email : old('email') }}" placeholder="vidéo" autofocus>
                @if ($errors->has('email'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div>
            
            <div class="form-group col-md-2">
                    <label for="solde" class="control-label font-weight-bold">@lang('Solde')</label>
                    <input id="solde" type="text" class="form-control " name="solde" value="{{ (!empty($user->solde)) ? $user->solde : old('solde') }}" placeholder="solde" autofocus>
                    @if ($errors->has('solde'))
                        <div class="help-block text-danger font-italic"></div>
                    @endif
            </div>
            

        </div>
            
      <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    @lang('Modifier utilisateur')
                </button>
                
            </div>
        </div>
    </form>
                    </div>
                </div>
    </div>
</div>
@endsection