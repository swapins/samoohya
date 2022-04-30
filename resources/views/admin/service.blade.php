@extends('adminlte::page')

@section('title', 'Service Config')
@section('plugins.BsCustomFileInput', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Service Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <x-adminlte-card title="Add New Service" theme="primary"  icon="fas fa-lg fa-plus"
        collapsible="collapsed">
        <form method="POST" action="/add_service" enctype="multipart/form-data">
            @csrf
            <x-adminlte-input name="name" igroup-size="sm" placeholder="Service Name" required/>
            <x-adminlte-input name="api_key" igroup-size="sm" placeholder="API Key" required/>
            <x-adminlte-input-file name="logo" igroup-size="sm" placeholder="Logo in png" required>
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file>
            <x-adminlte-button type="submit" class="d-flex ml-auto" theme="primary" label="submit" icon="fas fa-sign-in"/>
        </form>
        </x-adminlte-card>
    </div>
</div>
<div class="row">
    <div class="col-12">
            {{-- Setup data for datatables --}}
        @php
        $heads = [
            'ID',
            'Name',
            'Satus',
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];


        @endphp
        <div class="card">

            <div class="card-body">
                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach ($service as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>
                                <img src="{{$data->logo}}" width="30px"/> &nbsp;&nbsp;
                                {{$data->name}}
                            </td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input togBtn" value="{{$data->id}}" @php if($data->status){echo'checked';} @endphp id="togBtn{{$data->id}}">
                                    <label class="custom-control-label" for="togBtn{{$data->id}}"></label>
                                </div>
                            </td>
                            <td>
                                <nobr><button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" data-toggle="modal" data-target="#EditMdl{{$data->id}}" type="button">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button><button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#DeleteMdl{{$data->id}}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button><button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" data-toggle="modal" data-target="#ShowMdl{{$data->id}}">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button><nobr>
                            </td>
                        </tr>
                        <!-- Modal Edit-->
                        <div class="modal fade" id="EditMdl{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    {{$data->id}}
                                    
                                    
                                    {{$data->note}}
                                    {{$data->api_key}}
                                    <form method="POST" action="/edit_service" enctype="multipart/form-data">
                                        @csrf
                                        <input value="{{$data->id}}" name="id" hidden>
                                        <div class="form-group">
                                        <label for="InputName">Name</label>
                                        <input type="text" name="name" class="form-control" id="InputName" value="{{$data->name}}">
                                        <small id="nameHelp" class="form-text text-muted">This will appare on welcome page avoid spelling mistakes</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputName">Logo</label>
                                            <x-adminlte-input-file name="logo" igroup-size="sm" placeholder="Change Logo Image">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <img src="{{$data->logo}}" width="22px" >
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input-file>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputName">API Key</label>
                                            <input type="text"  name="api_key" class="form-control" id="InputName" value="{{$data->api_key}}">
                                            <small id="nameHelp"  class="form-text text-muted">Please crossvarify before updating</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputName">Notes</label>
                                            <input type="text" name="note" class="form-control" id="InputName" value="{{$data->note}}">
                                            <small id="nameHelp"  class="form-text text-muted">This will appare on welcome page avoid spelling mistakes</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Modal Delete-->
                        <div class="modal fade" id="DeleteMdl{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <strong class="text-danger">Warning : This Cannot be undone!</strong><br>
                                <div class="text-center">
                                    <img src="{{$data->logo}}" width="150px">
                                </div>
                                <strong>{{$data->name}}</strong><br>
                                <p class="text-dange">All the Packages with {{$data->name}} will be deleted and users will be downgraded! Following users / packages would be affected</p>
                                <p>
                                    <ol>
                                        @foreach ($pkg->where('service_name',$data->id) as $list)
                                            @if ($list->service_to_package != null)
                                                <li>Name : {{$list->service_to_package->name}} | Users Enrolled : NA</li>
                                            @endif
                                        @endforeach
                                    </ol>    
                                </p>
                                </div>
                                
                                <div class="modal-footer">
                                    <form action="/service_del" method="POST">
                                        @csrf
                                        <input name="id" value="{{$data->id}}" hidden>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Modal Show-->
                        <div class="modal fade" id="ShowMdl{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$data->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body "> 
                                    <div class="text-center">
                                        <img src="{{$data->logo}}" width="100px"><br>
                                    </div>
                                    <ol>
                                        <li>API KEY : {{$data->api_key}}</li>
                                        <li>NOTE : {{$data->note}}</li>
                                        <li>STATUS : {{$data->status}}</li>
                                    </ol>    
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                                </div>
                            </div>
                            </div>
                        </div>

                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
       
    </div>
</div>


   


@stop

@section('css')

@stop

@section('js')
<script>
    $( document ).ready(function() {
        console.log( "ready!" );

        var switchStatus = false;
        $(".togBtn").on('change', function() {
            if ($(this).is(':checked')) {
                //alert($(this).val());// To verify
                $.ajax({
                    type:'POST',
                    url:'/mod_save/'+$(this).val()+'?pr=en',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                            "Status": 'Enable',
                            },
                    success:function(data){
                        console.log(data);
                    }
                });
            }
            else {
                $.ajax({
                    type:'POST',
                    url:'/mod_save/'+$(this).val()+'?pr=dn',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                            "Status": 'Disable',
                            },
                    success:function(data){
                        console.log(data);
                    }
                });
            }
        });
    });
</script>
@stop