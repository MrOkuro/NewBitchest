@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('admin.partials.adminsidenav')

    <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <form class="form-horizontal" method="POST" action="{{ route('admin.users.store') }}">
                            {{ csrf_field() }}


                    <div class="form-row form-group">
         
            <div class="col-md-3">
                <label for="name" class="control-label font-weight-bold">@lang('Name')</label>
                <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} " name="name" value="{{ old('name') }}" placeholder="name" autofocus>
                @if ($errors->has('name'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div>

            <div class="col-md-3">
                <label for="email" class="control-label font-weight-bold">@lang('email')</label>
                <input id="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} " name="email" value="{{ old('email') }}" placeholder="email" autofocus>
                @if ($errors->has('email'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div>

            <div class="col-md-3">
                <label for="password" class="control-label font-weight-bold">@lang('password')</label>
                <input id="password" type="text" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} " name="password" value="{{ old('password') }}" placeholder="password" autofocus>
                @if ($errors->has('password'))
                    <div class="help-block text-danger font-italic"></div>
                @endif
            </div>

        </div>
            
      <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    @lang('Créer utilisateur')
                </button>
                <a class="btn btn-primary" href="{{ url()->previous()}}" role="button">@lang('Annuler')</a>
            </div>
        </div>
    </form>
                    </div>
                </div>

    </div>
</div>
@endsection