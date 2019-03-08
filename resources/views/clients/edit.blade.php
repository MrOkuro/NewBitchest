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
                <input id="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} " name="email" value="{{ (!empty($user->email)) ? $user->email : old('email') }}" placeholder="email" autofocus>
                @if ($errors->has('email'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div>   
            
            <div class="col-md-3">
                <label for="ville" class="control-label font-weight-bold">@lang('Ville')</label>
                <input id="ville" type="text" class="form-control {{ $errors->has('ville') ? 'is-invalid' : '' }} " name="ville" value="{{ (!empty($user->ville)) ? $user->ville : old('ville') }}" placeholder="ville" autofocus>
                @if ($errors->has('ville'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div> 

            <div class="col-md-3">
                <label for="adresse" class="control-label font-weight-bold">@lang('Adresse')</label>
                <input id="adresse" type="text" class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }} " name="adresse" value="{{ (!empty($user->adresse)) ? $user->adresse : old('adresse') }}" placeholder="adresse" autofocus>
                @if ($errors->has('adresse'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div> 

            <div class="col-md-3">
                <label for="code_postal" class="control-label font-weight-bold">@lang('Code Postal')</label>
                <input id="code_postal" type="text" class="form-control {{ $errors->has('code_postal') ? 'is-invalid' : '' }} " name="code_postal" value="{{ (!empty($user->code_postal)) ? $user->code_postal : old('code_postal') }}" placeholder="code postal" autofocus>
                @if ($errors->has('code_postal'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div> 


            <div class="col-md-3">
                <label for="solde" class="control-label font-weight-bold">@lang('Solde')</label>
                <input id="solde" type="text" class="form-control {{ $errors->has('solde') ? 'is-invalid' : '' }} " name="solde" value="{{ (!empty($user->solde)) ? $user->solde : old('solde') }}" placeholder="solde" autofocus>
                @if ($errors->has('solde'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div> 
        </div>

          
      <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    @lang('Modifier informations utilisateur')
                </button>
                
            </div>
        </div>
    </form>
                    </div>
                </div>
    </div>
</div>
@include('layouts.partials._footer')
@endsection