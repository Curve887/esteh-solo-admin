@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar User</h3>   
            <div class="card-tools">
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Tambah User</a>
            </div>
        </div>
        <div class="card-body">
            @include('admin.user.index')
        </div>
    </div>
@endsection
@section('js')
@endsection
