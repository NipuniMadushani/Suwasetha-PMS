@extends('layouts.app')
@section('title', "Admin")
@section('content')
<section class="index">
    <div class="card border-0">
    <div class="card-header bg-transparent">
        <div class="">
            <h3>{{ translate('Role List') }}</h3>
            <p style="color: #000"><a href="{{url('dashboard')}}" >Dashboard</a> / Role</p>
        </div>
        <a class="btn btn-primary" href="{{ route('role.create') }}"><i class="fa fa-plus"></i> Add New</a>
    </div>
    <div class="card-body">
        <div class="card-datatable table-responsive pt-0">
            <table class="user-list-table table table-bordered border-dark">
                <thead class="table-light">
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->status }}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('role.edit',$role->id ) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete')" href="{{ route('role.delete',$role->id ) }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>         
        </div>
    </div>
</section>
@endsection