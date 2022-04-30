@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Chartjs', true)
@section('title', 'AppName')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop


@section('content')
@can('isAdmin')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h6>Daily new registartions</h6>
                    <div>
                        <canvas id="user_reg" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>   
        </div>
        <div class="col-md-4">
           <div class="row">
                <div class="col-12">
                    <x-adminlte-small-box title="{{$user_count}}" text="User Reg" icon="fas fa-user-plus text-white"
                    theme="pink" url="#" url-text="View all users"/>
                </div>
           </div>
           <div class="row">
                <div class="col-12" style="padding-top: 10px">
                    <x-adminlte-small-box title="{{$totalActiveUsers}}" text="Online Users" icon="fas fa-user-plus text-white"
                        theme="teal" url="#" url-text="View all users"/>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                  <h4>User Registarions</h4>
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
                    'data' => [
                            [22, 'John Bender', '+02 (123) 123456789', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                            [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                            [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        ],
                      'order' => [[1, 'asc']],
                      'columns' => [null, null, null, ['orderable' => false]],
                  ];
                  @endphp
                  
                  {{-- Minimal example / fill data using the component slot --}}
                  <x-adminlte-datatable id="table1" :heads="$heads">
                      @foreach($users as $row)
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
    </div>

@endcan

@can('isClient')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
              <div class="card-body">
                  <h4>Weakly Usage Chart</h4>
                  <label>Select Time Zone</label>
                  <select name="timezone_offset" id="timezone-offset" class="form-control" >
                    <option value="-12:00">(GMT -12:00) Eniwetok, Kwajalein</option>
                    <option value="-11:00">(GMT -11:00) Midway Island, Samoa</option>
                    <option value="-10:00">(GMT -10:00) Hawaii</option>
                    <option value="-09:50">(GMT -9:30) Taiohae</option>
                    <option value="-09:00">(GMT -9:00) Alaska</option>
                    <option value="-08:00">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                    <option value="-07:00">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                    <option value="-06:00">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                    <option value="-05:00">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                    <option value="-04:50">(GMT -4:30) Caracas</option>
                    <option value="-04:00">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                    <option value="-03:50">(GMT -3:30) Newfoundland</option>
                    <option value="-03:00">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                    <option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
                    <option value="-01:00">(GMT -1:00) Azores, Cape Verde Islands</option>
                    <option value="+00:00">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                    <option value="+01:00">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                    <option value="+02:00">(GMT +2:00) Kaliningrad, South Africa</option>
                    <option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                    <option value="+03:50">(GMT +3:30) Tehran</option>
                    <option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                    <option value="+04:50">(GMT +4:30) Kabul</option>
                    <option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                    <option value="+05:50" selected="selected">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                    <option value="+05:75">(GMT +5:45) Kathmandu, Pokhara</option>
                    <option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                    <option value="+06:50">(GMT +6:30) Yangon, Mandalay</option>
                    <option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                    <option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                    <option value="+08:75">(GMT +8:45) Eucla</option>
                    <option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                    <option value="+09:50">(GMT +9:30) Adelaide, Darwin</option>
                    <option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                    <option value="+10:50">(GMT +10:30) Lord Howe Island</option>
                    <option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                    <option value="+11:50">(GMT +11:30) Norfolk Island</option>
                    <option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                    <option value="+12:75">(GMT +12:45) Chatham Islands</option>
                    <option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
                    <option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>
                  </select>
                  <div>
                      <canvas id="myChart" width="400" height="200"></canvas>
                  </div>    
              </div>
            </div>
        </div>
      <div class="col-md-5">
          <div class="card">
            <div class="card-body">
                <h4>Posting History</h4>
                @php
                $heads = [
                    'ID',
                    'Post',
                    'status',
                    'Action'
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
                    'data' => [
                        [22, 'John Bender', 0, 0],
                        [19, 'Sophia Clemens', 0, 0],
                        [3, 'Peter Sousa', 0, 0],
                    ],
                    'order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                ];
                @endphp
                
                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach($posts as $row)
                    @php
                        $json = $row->response;
                        $obj = json_decode($json);
                        $content = $obj->post;
                        $status = $obj->status;
                    @endphp
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>
                                <i class="fab fa-{{$row->provider}}-square" aria-hidden="true"></i>
                                {{$content}}
                            </td>
                            <td>{{$status}}</td>
                            <td>
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                                <button class="btn btn-xs btn-default text-teal mx-1 shadow" data-toggle="modal" data-target="#modalPurple{{$row->id}}" title="Details">
                                     <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button> 
                            </td>
                        </tr>
                        <x-adminlte-modal id="modalPurple{{$row->id}}" title="API Response" theme="purple"
                            icon="fas fa-code">
                            @isset($row->file)
                                <img src='{{$row->file}}' width="175px" class="text-center">
                            @endisset 
                                {{$row->response}}  
                        </x-adminlte-modal>
                    @endforeach
                </x-adminlte-datatable>         
            </div>
          </div>
      </div>
  </div>
@endcan

@can('isNopkg')
Please Purchase A Package or continue Demo
<div class="row">
@foreach ($packages as $item)
    <div class="col-md-4">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <img src="https://picsum.photos/200/200?random={{$item->id}}" width="100px" alt="Card image cap">
                            <h5 class="card-text">{{$item->name}}</h5>
                            <p class="card-text">
                                @php $service_ids = $item->service_in_package->pluck('service_name'); @endphp
                                @foreach($services->find($service_ids) as $l)
                                    <img src="{{$l->logo}}" width="20">&nbsp;&nbsp;
                                @endforeach
                            </p>
                        </div>
                        <div class="col-6">
                            <small>
                                @if ($item->White_Label)
                                    White Label <i class="fa fa-check text-success"></i>
                                @else
                                    White Label <i class="fa fa-ban text-danger"></i>
                                @endif
                                |
                                @if ($item->Feeds)
                                    Feeds <i class="fa fa-check text-success"></i>
                                @else
                                    Feeds <i class="fa fa-ban text-danger"></i>
                                @endif
                                |
                                @if ($item->Analytics)
                                    Analytics <i class="fa fa-check text-success"></i>
                                @else
                                    Analytics <i class="fa fa-ban text-danger"></i>
                                @endif
                                |
                                @if ($item->Inbox)
                                    Inbox <i class="fa fa-check text-success"></i>
                                @else
                                    Inbox <i class="fa fa-ban text-danger"></i>
                                @endif
                                |
                                @if ($item->Content_Calendar)
                                    Content Calendar <i class="fa fa-check text-success"></i>
                                @else
                                    Content Calendar <i class="fa fa-ban text-danger"></i>
                                @endif
                                |
                                @if ($item->Bulk_Scheduling)
                                    Bulk Scheduling <i class="fa fa-check text-success"></i>
                                @else
                                    Bulk Scheduling <i class="fa fa-ban text-danger"></i>
                                @endif
                                |
                                @if ($item->Curated_Content)
                                    Curated Content <i class="fa fa-check text-success"></i>
                                @else
                                    Curated Content <i class="fa fa-ban text-danger"></i>
                                @endif
                                |
                                @if ($item->Facebook_Ads)
                                    Facebook Ads <i class="fa fa-check text-success"></i>
                                @else
                                    Facebook Ads <i class="fa fa-ban text-danger"></i>
                                @endif
                                |
                                @if ($item->Concierge_Setup)
                                    Concierge Setup <i class="fa fa-check text-success"></i>
                                @else
                                    Concierge Setup <i class="fa fa-ban text-danger"></i>
                                @endif
                            </small>
                        </div>
                    </div>
                </div>            
            </div>
            <div class="card-footer">
                <button href="/package_buy?uid={{Auth::id()}}&price={{$item->price}}" class="btn btn-outline-success" disabled>INR {{$item->price}}</button>
                <a href="/package_buy?uid={{Auth::id()}}&price={{$item->price}}&pkg={{$item->id}}" class="btn btn-primary">Buy Now</a>
            </div>
        </div>
    </div>
@endforeach
</div>
<h5 class="text-center text-info">Or</h5>
<div class="row mt-5">
    <div class="col-2">

    </div>
    <div class="col-8">
        <form action="/continue_demo" method="POST">
        @csrf
        <input type="hidden" name="id" value = "{{Auth::id()}}"required>
        <button type="submit" class="btn btn-danger btn-block" ">Continue Demo </button>
        </form>
    </div>
    <div class="col-2">
        
    </div>
</div>
@endcan

@stop
@section('js')
   
   
<script>  
    $(document).ready(function() {
      var text_count = @json($text_count);
      var image_count = @json($image_count);
      var video_count = @json($video_count);
      var date_array = @json($date_array);

         
            
            const labels = date_array;

            const data = {
            labels: labels,
            datasets: [{
                label: 'Text',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: text_count,
            },{
                label: 'Image',
                backgroundColor: 'rgb(60, 50, 132)',
                borderColor: 'rgb(60, 50, 132)',
                data: image_count,
            },{
                label: 'Video',
                backgroundColor: 'rgb(30, 150, 72)',
                borderColor: 'rgb(30, 150, 72)',
                data: video_count,
            }]
            };
            const config = {
            type: 'bar',
            data: data,
            options: {}
            };
            

            var myChart = new Chart(
                          document.getElementById('myChart'),
                          config
                        );

            
            
            $("select").change(function(){
                if($(this).text() != "Chef")
                    {
                        alert('GMT '+$(this).val()+' time offset applied');
                        myChart.update();
                    }
                     
              });

              
        }); 
       
</script>  

<script>  
    $(document).ready(function() {
      var reg_count = @json($reg_count);
      var date_array = @json($date_array);
         
            
            const labels = date_array;

            const data = {
            labels: labels,
            datasets: [{
                label: 'Text',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: reg_count,
            }]
            };
            const config = {
            type: 'line',
            data: data,
            options: {}
            };
            var user_reg = new Chart(
                          document.getElementById('user_reg'),
                          config
                        );

              
        }); 
       
</script> 
@stop
