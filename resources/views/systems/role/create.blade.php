@extends('layouts.app')
@section('title', "Dashboard || Add New Admin")
@section('content')
<section class="index">
    <div class="card border-0">
    <div class="card-header bg-transparent">
        <div class="">
            <h3 style="color: #000">{{ translate('Add New Role') }}</h3>
            <p style="color: #000"><a href="{{url('dashboard')}}">Dashboard</a> / Role Create</p>
        </div>
        <a class="btn btn-primary" href="{{ route('role.index') }}"><i class="fa fa-arrow-left"></i> Back to list</a>
    </div>
    <div class="card-body">
        <form action="{{route('role.store')}}" method="post" class="row">
            @csrf
            <div class="form-group col-lg-4"> 
                <label class="req" style="color: #000">Name</label>
                <input type="text" name="name" placeholder="Enter role name" class="form-control" />
                @error('name')
                    <span class="text-danger" style="color: #000">Name field is required!</span>
                @enderror
            </div>
            <div class="form-group col-lg-4"> 
                <label class="req" style="color: #000">Status</label>
                <div class="d-block mt-1">
                    <label class="req me-2" for="active" style="color: #000">
                        <input type="radio" name="status" value="active" id="active" />
                        Active
                    </label>
                    <label class="req" for="inactive" style="color: #000">
                        <input type="radio" name="status" value="inactive" id="inactive" />
                        Inactive
                    </label>
                </div>
                @error('status')
                    <span class="text-danger">Status field is required!</span>
                @enderror
            </div>
            
            <div class="row my-2">
                @foreach($modules as $key => $module)
                <div class="col-lg-3 p-1">
                    <label for="{{$key}}" class="text-capitalize" style="color: #000">
                        <input type="checkbox" value="1" name="permissions[{{$key}}]" id="{{$key}}" />
                        {{ str_replace('_',' ',$key) }}
                    </label>
                </div>
                @endforeach
            </div>
            
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</section>
@endsection