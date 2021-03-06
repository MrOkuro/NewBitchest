@extends('layouts.default',['title'=>'Dashbord Admin'])

@section('content')


<div class="container">
    <div class="row">
    @include('admin.partials.adminsidenav')



        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="col-auto small">@lang('Nom')</th>
                                    <th scope="col" class="col-auto small">@lang('Email')</th> 
                                    <th scope="col" class="col-auto small">@lang('Statut')</th> 
                                    <th scope="col" class="col-auto small">@lang('Actions')</th>       
                                </tr>
                            <tbody>
                                @foreach ($users as $user)  

                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if($user->admin > 0)
                                            <td>Admin</td>
                                    @else
                                            <td>Client</td>
                                    @endif
                                    <td> 
                                       <a href=" {{ route('admin.users.edit', $user->id) }}"> <button type="button" class="btn btn-primary"  onclick="">
                                                    @lang('Modifier informations clients')
                                        </button></a>
                                    
                                    
                                        <form method="POST" action="{{ route('admin.users.delete', $user->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger"> supprimer </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>                
                        </thead>
                    </table> 

                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@include('layouts.partials._footer')
@endsection