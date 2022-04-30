@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Connect Accounts</h1>
@stop

@section('content')
    <p>Connect your social media Accounts.</p>
    @php
        try {
        // Try something
            $ap = $packages->find(Auth::user()->package_type)->name;
        } catch (\Exception $e) {
            // Do something exceptional
            $ap = "Invalid package";
        }  
        
       // print_r ($fb_id);
    @endphp
<h4 class="text-success">Active Package : {{$ap}}</h4>

@if($ap !== "Invalid package" )   
    <div class="row">
        @foreach ($services as $data)
        @php
            switch ($data->id) {
            case 1:
                $fa_fa = "fab fa-facebook-square";
                break;
            case 2:
                $fa_fa = "fab fa-facebook-square";
                break;
            case 3:
                $fa_fa = "fab fa-instagram";
                break;
            case 4:
                $fa_fa = "fab fa-twitter";
                break;
            case 5:
                $fa_fa = "fab fa-pinterest";
                break;

            case 6:
                $fa_fa = "fab fa-linkedin";
                break;
            
            case 7:
                $fa_fa = "fab fa-google";
                break;

            default:
                $fa_fa = "fa fa-question-circle";
            }

        @endphp
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow mb-3" >
                <div class="card-header d-flex align-items-center" style="height: 2.5rem"><i class="{{$fa_fa}}"></i>&nbsp;{{$data->name}}</div>
                <div class="card-body bg-white text-center">
                    <img src="{{$data->logo}}" class="img-round mb-2" width="75px"><br>
                    <!-- Facebook Page and Group -->
                    @if ($data->id == 1 or $data->id ==2)
                        @foreach ($fb_id as $key => $fb)
                            <a  href = "./fbp_refresh?id={{$fb}}" class="btn btn-outline-info btn-sm mb-1 " style = "width:100%"><i class="fas fa-undo"></i> &nbsp; {{"$key"}}</a>
                        @endforeach
                        <a  href="./auth/facebook" class="btn btn-outline-primary btn-sm mb-1 " style = "width:100%" ><i class="fas fa-plug"></i>  &nbsp; Connect New</a>
                    @endif
                    
                    <!--Instagram-->
                    @if ($data->id == 3)
                        @isset($instagrams)
                            @foreach ($instagrams as $instagram)
                            <div class="d-flex row mb-1">
                                <div class="col-2">
                                    <img src="{{$instagram->profile_picture_url}}" class="img-thumbnail"/>
                                </div>
                                <div class="col-10">
                                    <form method="POST" action="/instagram_account">
                                        @csrf
                                        <input value="{{$instagram->id}}" name="id" hidden>
                                        @if ($instagram->connected)
                                        <button type="submit" class="btn btn-success btn-sm" width="100%" disabled><i class="fas fa-check"></i> &nbsp; {{$instagram->instagram_name}}</button>    
                                        @else
                                        <button type="submit" class="btn btn-outline-info btn-sm" width="100%"><i class="fas fa-undo"></i> &nbsp; {{$instagram->instagram_name}}</button>
                                        @endif
                                        
                                    </form>    
                                </div>
                            </div>    
                            @endforeach    
                        @endisset
                        <a  href="./instagram_connect" class="btn btn-outline-primary btn-sm mb-1 " style = "width:100%" ><i class="fas fa-plug"></i>  &nbsp; Connect New</a>
                    @endif
                    <!-- Pinterest -->
                    @if ($data->id == 5)
                        @isset($pinterests)
                            @foreach ($pinterests as $pin)
                                @if ($pin->connected)
                                    <a  href = "#" class="btn btn-info btn-sm mb-1 " style = "width:100%" disabled><i class="fas fa-check"></i> &nbsp; {{$pin->Pinterest_id}}</a>
                                @else
                                    <form action="/connect_pinterest" method="POST">
                                    @csrf
                                        <input type="text" value="{{$pin->id}}" name="id" id="pin_id" hidden>
                                        <button  type="submit" class="btn btn-outline-info btn-sm mb-1 " style = "width:100%"><i class="fas fa-undo"></i> &nbsp; {{$pin->Pinterest_id}}</button>
                                    </form>
                                @endif
                            @endforeach    
                        @endisset
                        <a  href="./login/pinterest" class="btn btn-outline-primary btn-sm mb-1 " style = "width:100%" ><i class="fas fa-plug"></i>  &nbsp; Connect New</a>
                    @endif
                    <!--LinkedIn -->
                    @if ($data->id == 6)
                        @isset($linkedins)
                            @foreach ($linkedins as $lin)
                                @if ($lin->connected)
                                    <a  href = "#" class="btn btn-info btn-sm mb-1 " style = "width:100%" disabled><i class="fas fa-check"></i> &nbsp; {{$lin->name}}</a>
                                @else
                                    <form action="/connect_linkedin" method="POST">
                                    @csrf
                                        <input type="text" value="{{$lin->id}}" name="id" id="pin_id" hidden>
                                        <button  type="submit" class="btn btn-outline-info btn-sm mb-1 " style = "width:100%"><i class="fas fa-undo"></i> &nbsp; {{$lin->name}}</button>
                                    </form>
                                @endif
                            @endforeach    
                        @endisset
                    <a  href="./auth/linkedin" class="btn btn-outline-primary btn-sm mb-1 " style = "width:100%" ><i class="fas fa-plug"></i>  &nbsp; Connect New</a>
                    @endif
                    <!--Twitter -->
                    @if ($data->id == 4)
                        @isset($twitter_all)
                            @foreach ($twitter_all as $tw)
                                @if ($tw->connected)
                                    <a  href = "#" class="btn btn-info btn-sm mb-1 " style = "width:100%" disabled><i class="fas fa-check"></i> &nbsp; {{$tw->screen_name}}</a>
                                @else
                                    <form action="/connect_twitter" method="POST">
                                    @csrf
                                        <input type="text" value="{{$tw->id}}" name="id" id="pin_id" hidden>
                                        <button  type="submit" class="btn btn-outline-info btn-sm mb-1 " style = "width:100%"><i class="fas fa-undo"></i> &nbsp; {{$tw->screen_name}}</button>
                                    </form>
                                @endif
                            @endforeach    
                        @endisset
                        <a  href="./twitter/login" class="btn btn-outline-primary btn-sm mb-1 " style = "width:100%" ><i class="fas fa-plug"></i>  &nbsp; Connect New</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif  
@stop

@section('css')
   
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop