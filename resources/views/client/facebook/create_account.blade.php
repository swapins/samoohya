@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Account</h1>
@stop

@section('content')
   

    <div class="row">
        <div class="col-12">
            <div class="callout callout-info">
                <h5>Facebook Account connection status</h5>

                <p>Dear {{Auth::user()->name}},<br>
                You have sucessfully connected to {{count($fb_id)}} profiles. which are as follows Please select
                 respective facbook accounts to map its pages and groups.
                    <div class="form-group">
                        <label for="#sel_acc">Profiles</label>
                        <select class="form-control" name="" id="sel_acc">
                                <option value="0">------Select Fb Profile------</option>
                            @foreach ($fb_id as $key => $fb)
                                <option value="{{$fb}}">{{$fb}}, {{$key}}</option>
                            @endforeach
                        </select>
                    </div>

                    <h5>Create Account from Page</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pages</label>
                                <select class="form-control" name="" id="sel">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" id="divfbp" style="display: none">
                            <div class="row">
                                <div class="col-4">
                                    <img src="" id = "page_img" width="100px"/>
                                </div>
                                <div class="col-8">
                                    <form action="/save_account" method="POST">
                                        @csrf
                                        <div class="hidden">
                                            <input value="" id = "page_id" name="page_id" hidden>
                                            <input value="" id = "provider" name="provider" hidden>
                                            <input value="page" id = "type" name="type" hidden>
                                        </div>    
                                        <div class="row">
                                            <div class="form-group">
                                            <label for="">Account Name</label>
                                            <input type="text"
                                                class="form-control" name="name" id="ac_name" aria-describedby="helpId" value="" placeholder="" >
                                            <small id="helpId" class="form-text text-muted">Please eneter a unique account name</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <h5>Create Account from Groups</h5>
                    <small>Please refresh this page an reselect the profile if your group is not properly maped</small>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Groups</label>
                                <select class="form-control" name="" id="sel_g">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" id="divfbg" style="display: none">
                            
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{env('BRAND_LOGO')}}" width="75px"/>
                                </div>
                                <div class="col-8">
                                    <form action="/save_account" method="POST">
                                        @csrf
                                        <div class="hidden">
                                            <input value="" id = "group_id" name="group_id" hidden>
                                            <input value="" id = "g_provider" name="provider" hidden>
                                            <input value="group" id = "g_type" name="type" hidden>
                                        </div>    
                                        <div class="row">
                                            <div class="form-group">
                                            <label for="">Account Name</label>
                                            <input type="text"
                                                class="form-control" name="name" id="g_ac_name" aria-describedby="helpId" value="" placeholder="" >
                                            <small id="helpId2" class="form-text text-muted">Please eneter a unique account name</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Accounts
                </div>
                @php
                $heads = [
                              'ID',
                              'Name',
                              ['label' => 'Status', 'width' => 40],
                              ['label' => 'Actions', 'no-export' => true, 'width' => 5],
                          ];
                
                $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                  <i class="fa fa-lg fa-fw fa-trash"></i>
                              </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                   <i class="fa fa-lg fa-fw fa-eye"></i>
                               </button>';
                
                $config = [
                  'data' => [],
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
                @endphp
                <div class="card-body">
                    {{-- Minimal example / fill data using the component slot --}}
                    <x-adminlte-datatable id="table1" :heads="$heads">
                        @foreach($Account as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>
                                    @if(Cache::has('user-is-online-' . $row->id))
                                        <span class="text-success">Online</span>
                                    @else
                                        <span class="text-secondary">Offline</span>
                                    @endif
                                </td>
                                <td>@php echo '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'; @endphp</td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>   
                </div>
                
            </div>
        </div>
    </div> -->
    <div class="modal"><!-- Place at bottom of page --></div>
@stop

@section('css')
    <style>
            /* Start by setting display:none to make this hidden.
        Then we position it in relation to the viewport window
        with position:fixed. Width, height, top and left speak
        for themselves. Background we set to 80% white with
        our animation centered, and no-repeating */
                .modal {
                    display:    none;
                    position:   fixed;
                    z-index:    1000;
                    top:        0;
                    left:       0;
                    height:     100%;
                    width:      100%;
                    background: rgba( 255, 255, 255, .8 ) 
                                url('http://i.stack.imgur.com/FhHRx.gif') 
                                50% 50% 
                                no-repeat;
                }

        /* When the body has the loading class, we turn
        the scrollbar off with overflow:hidden */
        body.loading .modal {
            overflow: hidden;   
        }

        /* Anytime the body has the loading class, our
        modal element will be visible */
        body.loading .modal {
            display: block;
        }
    </style>    
@stop

@section('js')
<script>
    $body = $("body");
    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }    
    });
</script>    
<script>
    $(document).ready(function(){
        $("#sel_acc").change(function(){
            var id = $("#sel_acc").val();
            $.ajax({
                    url: '/fb_pages/get?id='+id,
                    type: 'get',
                    dataType: 'json',
                   
                    success:function(response){

                        var len = response.length;

                        $("#sel").empty();
                        $("#sel").append("<option value='0'>----- Select Page ------</option>");
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name'];
                            $("#sel").append("<option value='"+id+"'>"+name+"</option>");

                        }
                       
                    }
                })
            $.ajax({
                url: '/fb_groups/get?id='+id,
                type: 'get',
                dataType: 'json',
                success:function(response){

                    var len = response.length;

                    $("#sel_g").empty();
                    $("#sel_g").append("<option value='0'>----- Select Group ------</option>");
                    for( var i = 0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                        $("#sel_g").append("<option value='"+id+"'>"+name+"</option>");
                    }
                }
            })
        });
        
        $("#sel").change(function(){
            //alert ("Create account with"+$("#sel_acc").val());
            var pid = $("#sel").val();
            
            $.ajax({
                url: '/fb_page/get?id='+pid,
                type: 'get',
                dataType: 'json',
                success:function(response){

                    //alert(response['name']);
                    $("#divfbp").show();
                    $("#page_img").attr("src",response['image']);
                    $('#ac_name').attr("value",response['name']);

                    $('#page_id').attr("value",response['id']);
                    $('#provider').attr("value",response['provider']);
                }
            })
            
        });

        $("#sel_g").change(function(){
            var gid = $("#sel_g").val();
            $.ajax({
                url: '/fb_group/get?id='+gid,
                type: 'get',
                dataType: 'json',
                success:function(response){
                    //alert(response['name']);
                    $("#divfbg").show();
                    //$("#my_image").attr("src","second.jpg");
                    $('#g_ac_name').attr("value",response['name']);

                    $('#group_id').attr("value",response['id']);
                    $('#g_provider').attr("value",response['provider']);
                    
                }
            })
        });
    });

</script>   
@stop