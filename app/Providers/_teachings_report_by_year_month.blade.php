<section class="content">
    <div class="row">
        <div class="col-xs-12 text-right">
            <div class="form-group">
                <!--a class="btn btn-primary" href="#"><i class="fa fa-plus"></i> Add New</a-->
            </div>
        </div>
    </div>
    <div class="row">
        <form action="{{ route("reports.export") }}" method="GET">
            <input type="hidden" name="report-type" value="{{$requestType}}" />
            <input type="hidden" name="from-date" value="{{$start ?? ''}}" />
            <input type="hidden" name="end" value="{{date('Y-m-d')}}" />
            
            <button class="btn btn-primary" type="submit">Print Report</button>
        </form>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Teachings History By Community</h3>
                    <div class="box-tools">
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        

                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-right">
                        {{-- <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Year/Month</th>
                                    <th>Community</th>
                                    <th>Schools In Community</th>
                                    <th>Teachers In Community</th>
                                    <th>Teachers That Synch</th>
                                    <th>% Teachers That Synch</th>
                                    <!-- <th class="text-center">Actions</th> -->
                                </tr>
                            </thead>
                                <tbody id="myTable">
                                    @php
                                    $index = 0;
                                    @endphp
                                    @foreach($teachings as $teaching)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        {{-- <th>{{ $teaching->month }}</th> --}}
                                        {{-- <td>{{$teaching['community_name']}}</td>
                                        <td>{{$teaching['schools']}}</td>
                                        <td>{{$teaching['teachers_in_community']}}</td>
                                        <td>{{$teaching['teachers_that_sync']}}</td>
                                        <td>{{$teaching['percent_sync']}}</td>
                                        <td>{{$from}}</td>
                                        <td>{{$to}}</td>
                                        <!-- <td>test</td> -->
        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> --}} 



                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Year/Month</th>
                                    <th>Community</th>
                                    <th>School In Community</th>
                                    <th>Teacher In Community</th>
                                    <th>Sync By Community</th>
                                    <th> Name of Teacher</th>
                                    <th>% Sync per Teacher</th>
                                    
                                    {{-- <th>To</th> --}}
                                    <!-- <th class="text-center">Actions</th> -->
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @php
                                $index = 0;
                                @endphp
                                @foreach($teachings as $teaching)
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td>{{$teaching->sync_date}}</td>
                                    <td>{{$teaching->community}}</td>
                                    <td>{{$teaching->school_name}}</td>
                                    
                                    @php
                                    $school_id = $teaching->school_id;
                                    $community_id = $teaching->community_id;
                                    // $teachers_in_school_count = App\Teacher::with('school')->where('school_id', $teaching->community_id)->count(); //App\Teacher::where('school_id', $teaching->school_id)->count();

                                    $teacher_id = $teaching->teacher_id;
                                    $community_id = $teaching->community_id;
                                    // $teacher = App\Teacher::where('school_id', $teaching->school_id);
                                    $teachers_in_community_count = App\Teacher::whereHas('school',function ($q) use ($community_id){
                                        $q->whereHas('community', function ($q) use ($community_id){
                                            $q->where('id','=', $community_id);
                                            });
                                        })->count(); //App\Teacher::where('school_id', $teaching->school_id)->count()
                                
                                    $teachers_that_synced_in_community = $teaching_report->filter(function ($item) use ($community_id) { return $item->community_id == $community_id; });
                                    $teachers_that_synced_count = $teaching_report->filter(function ($item) use ($teacher_id) { return $item->teacher_id == $teacher_id; });
                                    // dd(count($teachers_that_synced_count));

                                    @endphp
                                    <td>{{$teachers_in_community_count}}</td>
    
                                    <td>{{count($teachers_that_synced_in_community)}}</td>
                                    <td>{{ $teaching->teacher_name }}</td>

                                   
                                    {{-- <td>{{round((count($teachers_that_synced_in_community)/$teachers_in_community_count) * 100, 2)}}</td> --}}
                                    
    
                                </tr>
                                @endforeach

                            </tbody>
                        </table> 

                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section>