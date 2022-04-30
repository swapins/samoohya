@php
                $json = $data->response;
                $obj = json_decode($json);
                $content = $obj->post;
                $status = $obj->status;

                
            @endphp

                <div class="time-label">
                    @if ($status == 'success')
                        <span class="bg-green">{{$data->updated_at->format('d-m-Y')}}</span>
                    @else
                        <span class="bg-red">{{$data->updated_at->format('d-m-Y')}}</span>
                    @endif
                
                </div>
                <div>
                <!-- Before each timeline item corresponds to one icon on the left scale -->
                <i class="fas fa-envelope bg-blue"></i>
                <!-- Timeline item -->
                <div class="timeline-item">
                <!-- Time -->
                    <span class="time"><i class="fas fa-clock"></i>{{$data->updated_at->format('g:i A')}}</span>
                    <!-- Header. Optional -->
                    <h3 class="timeline-header"><a href="#">New Post</a>
                        @if ($status == 'success')
                        Was Sucessfull
                        @else
                        Was Not Sucessfull
                        @endif
                    </h3>
                    <!-- Body -->
                    <div class="timeline-body">
                        @if ($status == 'success')
                            {{$content}}
                        @else
                            {{$content}}<br>
                            @php
                                print_r($obj->reason)
                            @endphp
                        @endif

                        @isset($data->file)
                            <div class="text-center">
                                <img src="{{$data->file}}" width="200px">
                            </div>
                        @endisset
                    </div>
                    <!-- Placement of additional controls. Optional -->
                    <div class="timeline-footer">
                    <small class="text-info">{{$data->updated_at->diffForHumans()}}</small><br>    
                    <a class="btn btn-primary btn-sm">Read more</a>
                        <form method="POST" enctype="multipart/form-data" action="/fbp_del">
                            @csrf
                                <input type="text" value="{{$data->id}}" name="id" hidden>
                                <input type="text" value="{{$data->post}}" name="postIDtoDelete" hidden>
                                <input type="text" value="{{$data->media_url}}" name="pageAccessToken" hidden>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
                </div>