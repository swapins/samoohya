@extends('adminlte::page')

@section('title', 'Package Config')
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Package Dashboard</h1>
@stop

@section('content')
@if($serv_all->count() == 0)
<div class="row">
    <div class="col-12">
        <x-adminlte-callout theme="warning" title="Warning! Service Not Enabled">
            Please Add Services before creating packages
        </x-adminlte-callout>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12">
        <x-adminlte-card title="Add New Service" theme="primary"  icon="fas fa-lg fa-plus"
        collapsible="collapsed">
        <form method="POST" action="/add_package" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <input name="name" type="text" class="form-control" placeholder="Package Name" required/>
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="price" placeholder="Price of the package" required/>
                </div>
                
            </div>
            <div class="row">
                <div class="col-8">
                    @php
                        $config = [
                            "placeholder" => "Select ...",
                            "allowClear" => true,
                        ];
                    @endphp
                    <x-adminlte-select2 id="sel2Category" name="service[]" label="Services"
                        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
                        </x-slot>
                        @foreach ($services as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-primary">Benefits</h4>
                    <hr>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="number" class="form-control" name="accounts_no" placeholder="No of Accounts Supported" required/>
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="no_of_users" placeholder="No of Profiles Supported" required/>
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="no_of_clients" placeholder="No of Groups Supported" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-primary">Features</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <input type="checkbox" name="White_Label" value="1" id="">
                    <label>White Label</label>
                </div>
                <div class="col-md-3">
                    
                    <input type="checkbox" name="Feeds" value="1"  id="">
                    <label>Feeds</label>
                </div>
                <div class="col-md-3">    
                    
                    <input type="checkbox" name="Analytics" value="1"  id="">
                    <label>Analytics</label>
                </div>
                <div class="col-md-3">
                    
                    <input type="checkbox" name="Inbox" value="1"  id="">
                    <label>Inbox</label>
                </div>
            </div>
            <div class="row">

                <div class="col-md-3">
                    <input type="checkbox" name="Content_Calendar" value="1"  id="">
                    <label>Content Calendar</label>
                </div>

                <div class="col-md-3">
                    <input type="checkbox" name="Bulk_Scheduling" value="1"  id="">
                    <label>Bulk Scheduling</label>
                </div>

                <div class="col-md-3">
                    <input type="checkbox" name="Curated_Content" value="1"  id="">
                    <label>Curated Content</label>
                </div>

                <div class="col-md-3">
                    <input type="checkbox" name="Facebook_Ads" value="1" id="">
                    <label>Facebook Ads</label>
                </div>

                <div class="col-md-3">
                    <input type="checkbox" name="Concierge_Setup" value="1" id="">
                    <label>Concierge Setup</label>
                </div>

            </div>
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
            'Services',
            'Price',
            'Limits',
            'Features',
            ['label' => 'Actions', 'no-export' => 1, 'width' => 5],
        ];


        @endphp
        <div class="card">

            <div class="card-body">
                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table1" :heads="$heads" compressed>
                    @foreach ($packages as $data)
                       
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>
                                {{$data->name}}
                            </td>
                            <td><nobr>
                                @foreach ($data->service_in_package as $item)
                                    <img src="{{$serv_all->find($item->service_name)->logo}}" width="20px" 
                                    @if(!$serv_all->find($item->service_name)->status) style="-webkit-filter: grayscale(1); filter: grayscale(1);" @endif/> &nbsp;
                                @endforeach
                                <nobr>
                            </td>  
                            
                            <td>
                                 {{$data->price}}
                            </td>
                            <td>
                                <small>
                                    A/c's : {{$data->accounts_no}}<br>
                                    Profiles : {{$data->no_of_users}}<br>
                                    Groups : {{$data->no_of_clients}}
                                </small>
                            </td>
                            <td>
                                <small>
                                    @if ($data->White_Label)
                                        White Label <i class="fa fa-check text-success"></i>
                                    @else
                                        White Label <i class="fa fa-ban text-danger"></i>
                                    @endif
                                    |
                                    @if ($data->Feeds)
                                        Feeds <i class="fa fa-check text-success"></i>
                                    @else
                                        Feeds <i class="fa fa-ban text-danger"></i>
                                    @endif
                                    |
                                    @if ($data->Analytics)
                                        Analytics <i class="fa fa-check text-success"></i>
                                    @else
                                        Analytics <i class="fa fa-ban text-danger"></i>
                                    @endif
                                    |
                                    @if ($data->Inbox)
                                        Inbox <i class="fa fa-check text-success"></i>
                                    @else
                                        Inbox <i class="fa fa-ban text-danger"></i>
                                    @endif
                                    |
                                    @if ($data->Content_Calendar)
                                        Content Calendar <i class="fa fa-check text-success"></i>
                                    @else
                                        Content Calendar <i class="fa fa-ban text-danger"></i>
                                    @endif
                                    |
                                    @if ($data->Bulk_Scheduling)
                                        Bulk Scheduling <i class="fa fa-check text-success"></i>
                                    @else
                                        Bulk Scheduling <i class="fa fa-ban text-danger"></i>
                                    @endif
                                    |
                                    @if ($data->Curated_Content)
                                        Curated Content <i class="fa fa-check text-success"></i>
                                    @else
                                        Curated Content <i class="fa fa-ban text-danger"></i>
                                    @endif
                                    |
                                    @if ($data->Facebook_Ads)
                                        Facebook Ads <i class="fa fa-check text-success"></i>
                                    @else
                                        Facebook Ads <i class="fa fa-ban text-danger"></i>
                                    @endif
                                    |
                                    @if ($data->Concierge_Setup)
                                        Concierge Setup <i class="fa fa-check text-success"></i>
                                    @else
                                        Concierge Setup <i class="fa fa-ban text-danger"></i>
                                    @endif
                                </small>
                            </td>
                           <!-- <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input togBtn" value="{{$data->id}}" @php if($data->status){echo'checked';} @endphp id="togBtn{{$data->id}}">
                                    <label class="custom-control-label" for="togBtn{{$data->id}}"></label>
                                </div>
                            </td> -->
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
                        <div class="modal fade" id="EditMdl{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="1">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="1">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/edit_package" enctype="multipart/form-data">
                                        @csrf
                                        <input value="{{$data->id}}" name="id" hidden>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label>Package Name</label>
                                                <input name="name" type="text" class="form-control" value="{{$data->name}}" required/>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Package Price</label>
                                                <input type="number" class="form-control" name="price" value="{{$data->price}}" required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 mb-2">
                                                <label>Package Services</label><br>
                                                @foreach ($data->service_in_package as $item)
                                                    <img src="{{$serv_all->find($item->service_name)->logo}}" width="15px"/> &nbsp;
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label>No of Accounts</label>
                                                <input type="number" class="form-control" name="accounts_no" value="{{$data->accounts_no}}" required/>
                                            </div>
                                            <div class="col-md-4">
                                                <label>No of Users</label>
                                                <input type="number" class="form-control" name="no_of_users" value="{{$data->no_of_users}}" required/>
                                            </div>
                                            <div class="col-md-4">
                                                <label>No of Clients</label>
                                                <input type="number" class="form-control" name="no_of_clients" value="{{$data->no_of_clients}}" required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Features</label>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="checkbox" name="White_Label" value="1" @if($data->White_Label) checked @endif id="">
                                                <label>White Label</label>
                                            </div>
                                            <div class="col-md-4">
                                                
                                                <input type="checkbox" name="Feeds" value="1" @if($data->Feeds) checked @endif  id="">
                                                <label>Feeds</label>
                                            </div>
                                            <div class="col-md-4">    
                                                
                                                <input type="checkbox" name="Analytics" value="1" @if($data->Analytics) checked @endif id="">
                                                <label>Analytics</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                
                                                <input type="checkbox" name="Inbox" value="1" @if($data->Inbox) checked @endif id="">
                                                <label>Inbox</label>
                                            </div>
                                        
                            
                                            <div class="col-md-4">
                                                <input type="checkbox" name="Content_Calendar" @if($data->Content_Calendar) checked @endif value="1"  id="">
                                                <label>Content Calendar</label>
                                            </div>
                            
                                            <div class="col-md-4">
                                                <input type="checkbox" name="Bulk_Scheduling" @if($data->Bulk_Scheduling) checked @endif value="1"  id="">
                                                <label>Bulk Scheduling</label>
                                            </div>

                                        </div>
                                        <div class="row">
                            
                                            <div class="col-md-4">
                                                <input type="checkbox" name="Curated_Content" @if($data->Curated_Content) checked @endif value="1"  id="">
                                                <label>Curated Content</label>
                                            </div>
                                        
                                        
                            
                                            <div class="col-md-4">
                                                <input type="checkbox" name="Facebook_Ads" @if($data->Facebook_Ads) checked @endif value="1" id="">
                                                <label>Facebook Ads</label>
                                            </div>
                            
                                            <div class="col-md-4">
                                                <input type="checkbox" name="Concierge_Setup" @if($data->Concierge_Setup) checked @endif value="1" id="">
                                                <label>Concierge Setup</label>
                                            </div>
                            
                                        </div>
                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Modal Delete-->
                        <div class="modal fade" id="DeleteMdl{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="1">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="1">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body text-center">
                                <strong class="text-danger">Warning : This Cannot be undone!</strong>
                                </div>
                                
                                <div class="modal-footer">
                                    <form action="/package_del" method="POST">
                                        @csrf
                                        <input name="id" value="{{$data->id}}" hidden>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!--
                        <div class="modal fade" id="ShowMdl{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="1">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$data->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="1">&times;</span>
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
                        </div> Modal Show-->
                       
                       
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
       
    </div>
</div>
@endif
@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop