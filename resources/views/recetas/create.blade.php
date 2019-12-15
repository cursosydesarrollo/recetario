@extends('layouts.app')

@section('content')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            {{ $errors }}
        </div>
    </div>
    <div class="row">

        <div class="col-md">
            {{-- TODO: links --}}
            {!! Form::open(['url' => '/recetas', 'method' => 'POST' ,'files'=>'true']) !!}
            @include('recetas._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection