@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.BsCustomFileInput', true)

@section('content_header')
    <h1>Dashboard | User</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-7">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <x-adminlte-profile-widget name="{{Auth::user()->name}}" desc="Administrator" theme="teal"
            img="{{Auth::User()->details->photo}}">
                <x-adminlte-profile-col-item title="Followers" text="125" url="#"/>
                <x-adminlte-profile-col-item title="Following" text="243" url="#"/>
                <x-adminlte-profile-col-item title="Posts" text="37" url="#"/>
        </x-adminlte-profile-widget>
    </div>
    <div class="col-md-6">
        <x-adminlte-card title="Edit Details" theme="teal" theme-mode="title" icon="fas fa-lg fa-thumbs-up"
            collapsible="collapsed">
            <form method="POST" action="/profile_update" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <x-adminlte-input-file name="photo" label="Upload file" placeholder="Choose a Photo..."
                    disable-feedback/>
                    </div>
                    <div class="col-md-6">
                        <x-adminlte-input name="disc" label="Description" placeholder="username" label-class="text-dark">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success float-right" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </x-adminlte-card>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop