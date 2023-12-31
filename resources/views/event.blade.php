@include('includes.header')

<div class="page-content">
    <div class="container-fluid">

        <!-- start Event title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">{{ Auth::user()->name }}'s Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Event</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row project-wrapper">
            <div class="col-xxl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-height-100">
                            <div class="card-header border-0 align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Event Overview - {{ $event->title }}</h4>
                                <div class="flex-shrink-0">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editEvent{{$event->id}}" style="margin: 5px" class="btn btn-success">Edit Event</a>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-header p-0 border-0 bg-soft-light">
                                <div class="row g-0 text-center">
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">

                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">

                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">

                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0 border-end-0">

                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <hr>
                                {!! $event->description !!}
                                <hr>
                                {!! $event->about !!}
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-xxl-8 col-lg-6">
                <div class="card card-height-100">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Features</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFeature">Add Features</button>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-nowrap align-middle mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <td scope="col">S/N</td>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">LinkedIn</th>
                                        <th scope="col">Instagram</th>
                                        <th scope="col">Facebook</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($event->features))
                                    @foreach($event->features as $feature)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="d-flex">
                                                <div>
                                                    <p class="fs-12 mb-0 text-muted">{{ $feature->name }}</p>
                                                </div>
                                            </td>

                                            <td><img class="rounded shadow" src="{{asset($feature->image)}}" width="100%" alt="Card image cap"></td>

                                            <td>{{ $feature->position }}</td>

                                            <td>{{ $feature->type }}</td>

                                            <td>{!! $feature->description !!}</td>

                                            <td>{{ $feature->linkedin }}</td>

                                            <td>{{ $feature->instagram }}</td>

                                            <td>{{ $feature->facebook }}</td>

                                            <td style="width:5%;">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editFeature{{$feature->id}}" style="margin: 5px" class="link-primary"><i class="ri-edit-circle-fill"></i></a>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteFeature{{$feature->id}}" style="margin: 5px" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                            </td>
                                        </tr>
                                        <div id="deleteFeature{{$feature->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <div class="text-end">
                                                            <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="mt-2">
                                                            <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="hover" style="width:150px;height:150px">
                                                            </lord-icon>
                                                            <h4 class="mb-3 mt-4">Are you sure you want to delete <br>{{ $feature->name }}?</h4>
                                                            <form action="{{ url('/deleteFeature') }}" method="POST">
                                                                @csrf
                                                                <input name="feature_id" type="hidden" value="{{$feature->id}}">
    
                                                                <hr>
                                                                <button type="submit" class="btn btn-danger w-100">Yes, Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light p-3 justify-content-center">
    
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal --><!-- end tr -->
                                        <div id="editFeature{{$feature->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-body p-5">
                                                        <div class="text-end">
                                                            <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="mt-2">
                                                            <form action="{{ url('/updateFeature') }}" method="POST">
                                                                @csrf
                                                                <input name="feature_id" type="hidden" value="{{$feature->id}}">
    
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" name="name" id="name" value="{{ $feature->name }}">
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="position" class="form-label">Position</label>
                                                                    <input type="text" class="form-control" name="position" id="position" value="{{ $feature->position }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="description" class="form-label">A little description of the person</label>
                                                                    <textarea class="form-control" name="description" id="description">{{ $feature->description }}</textarea>
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="linkedin" class="form-label">LinkedIn Link</label>
                                                                    <input type="url" class="form-control" name="linkedin" id="linkedin" value="{{ $feature->linkedin }}">
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="instagram" class="form-label">Instagram Link</label>
                                                                    <input type="url" class="form-control" name="instagram" id="instagram" value="{{ $feature->instagram }}">
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="facebook" class="form-label">Facebook Link</label>
                                                                    <input type="url" class="form-control" name="facebook" id="facebook" value="{{ $feature->facebook }}">
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="section" class="form-label">Type</label>
                                                                    <select class="form-select" aria-label="type" name="type">
                                                                        <option selected value= "">Select type</option>
                                                                        <option value="Speaker">Speaker</option>
                                                                        <option value="Panelist">Panelist</option>
                                                                        <option value="Artist">Artist</option>
                                                                        <option value="Exhibitor">Exhibitor</option>
                                                                        <option value="Team">Organizer</option>
                                                                        <option value="Special Guest of Honor">Special Guest of Honor</option>
                                                                    </select>
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" name='image' id="image">
                                                                </div>
                                    
                                                                <hr>
                                                                <button type="submit" class="btn btn-info w-100">Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light p-3 justify-content-center">
    
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal --><!-- end tr -->
                                    @endforeach
                                @endif
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                            
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xxl-4 col-lg-6">
                <div class="card card-height-100">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Sponsor</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSponsor">Add Sponsor</button>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-nowrap align-middle mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Link</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($event->sponsors))
                                    @foreach($event->sponsors as $sponsor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                        
                                            <td><img class="rounded shadow" src="{{asset($sponsor->image)}}" width="100%" alt="Card image cap"></td>

                                            <td>{{ $sponsor->link }}</td>

                                            <td style="width:5%;">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editSponsor{{$feature->id}}" style="margin: 5px" class="link-primary"><i class="ri-edit-circle-fill"></i></a>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteSponsor{{$feature->id}}" style="margin: 5px" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                            </td>
                                        </tr>
                                        <div id="deleteSponsor{{$sponsor->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <div class="text-end">
                                                            <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="mt-2">
                                                            <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="hover" style="width:150px;height:150px">
                                                            </lord-icon>
                                                            <h4 class="mb-3 mt-4">Are you sure you want to delete <br>{{ $feature->name }}?</h4>
                                                            <form action="{{ url('/deleteSponsor') }}" method="POST">
                                                                @csrf
                                                                <input name="sponsor_id" type="hidden" value="{{$sponsor->id}}">
    
                                                                <hr>
                                                                <button type="submit" class="btn btn-danger w-100">Yes, Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light p-3 justify-content-center">
    
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal --><!-- end tr -->

                                        <div id="editSponsor{{$sponsor->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-body p-5">
                                                        <div class="text-end">
                                                            <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="mt-2">
                                                            <form action="{{ url('/updateSponsor') }}" method="POST">
                                                                @csrf
                                                                <input name="sponsor_id" type="hidden" value="{{$sponsor->id}}">
                                    
                                                                <div class="mb-3">
                                                                    <label for="link" class="form-label">Link</label>
                                                                    <input type="url" class="form-control" name="link" id="link" value="{{ $sponsor->link }}">
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" name='image' id="image">
                                                                </div>
                                    
                                                                <hr>
                                                                <button type="submit" class="btn btn-info w-100">Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light p-3 justify-content-center">
    
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal --><!-- end tr -->
                                    @endforeach
                                @endif
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                            
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xxl-4 col-lg-6">
                <div class="card card-height-100">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Schedules</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSchedule">Add Schedule</button>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-nowrap align-middle mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">End Time</th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($event->schedules))
                                    @foreach($event->schedules as $schedule)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $schedule->title }}</td>
                                            <td>{{ $schedule->day }}</td>
                                            <td>{{ $schedule->location }}</td>
                                            <td>{{ $schedule->start_time }}</td>
                                            <td>{{ $schedule->end_time }}</td>
                                            <td>{{ $schedule->date }}</td>
                                            <td style="width:5%;">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editSchedule{{$feature->id}}" style="margin: 5px" class="link-primary"><i class="ri-edit-circle-fill"></i></a>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteSchedule{{$feature->id}}" style="margin: 5px" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                            </td>
                                        </tr>
                                        <div id="deleteSchedule{{$feature->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center p-5">
                                                        <div class="text-end">
                                                            <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="mt-2">
                                                            <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="hover" style="width:150px;height:150px">
                                                            </lord-icon>
                                                            <h4 class="mb-3 mt-4">Are you sure you want to delete <br>{{ $feature->title }}?</h4>
                                                            <form action="{{ url('/deleteSchedule') }}" method="POST">
                                                                @csrf
                                                                <input name="schedule_id" type="hidden" value="{{$schedule->id}}">
    
                                                                <hr>
                                                                <button type="submit" class="btn btn-danger w-100">Yes, Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light p-3 justify-content-center">
    
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal --><!-- end tr -->

                                        <div id="editSchedule{{$feature->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-body p-5">
                                                        <div class="text-end">
                                                            <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="mt-2">
                                                            <form action="{{ url('/updateSchedule') }}" method="POST">
                                                                @csrf
                                                                <input name="schedule_id" type="hidden" value="{{$schedule->id}}">
                                    
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" class="form-control" name="title" id="title" value="{{$schedule->title}}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="day" class="form-label">Day</label>
                                                                    <input type="number" class="form-control" name="day" id="day" value="{{$schedule->day}}">
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="location" class="form-label">Location</label>
                                                                    <input type="text" class="form-control" name="location" id="location" value="{{$schedule->location}}">
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="start_time" class="form-label">Start Time</label>
                                                                    <input type="time" class="form-control" name="start_time" id="start_time" value="{{$schedule->start_time}}">
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="end_time" class="form-label">End Time</label>
                                                                    <input type="time" class="form-control" name="end_time" id="end_time" value="{{$schedule->end_time}}">
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="date" class="form-label">Date</label>
                                                                    <input type="date" class="form-control" name="date" id="date" value="{{$schedule->date}}">
                                                                </div>
                                    
                                                                <hr>
                                                                <button type="submit" class="btn btn-info w-100">Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer bg-light p-3 justify-content-center">
    
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal --><!-- end tr -->
                                    @endforeach
                                @endif
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                            
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xxl-8 col-lg-6">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">section</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addsection">Add section Item</button>
                        </div>
                    </div><!-- end card header -->

                    @if(!empty($event->highlight))
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-xl-12">
                                
                                <table id="fixed-header" class="table table-borderedless dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Link</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $event->highlight->title }} </td>
                                            <td>{!! $event->highlight->description !!}</td>
                                            <td><img class="rounded shadow" alt="{{ $event->highlight->image }}" width="50%" src="{{ asset($event->highlight->image) }}"></td>
                                            <td>{{ $event->highlight->link }}</td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteHighlight" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editHighlight" class="link-primary"><i class="ri-edit-circle-fill"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- end col -->
                        </div>
                    </div>
                    @endif
                </div><!-- end card -->
            </div><!-- end col -->
        </div>


        <div id="editEvent{{$event->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Update Event</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('/updateEvent') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name='event_id' value="{{ $event->id }}">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Event Name</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $event->title }}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">A little description of the event</label>
                                <textarea class="form-control" name="description" id="description">{{ $event->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="about" class="form-label">A detail description of the event</label>
                                <textarea class="form-control" name="about" id="about">{{ $event->about }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Starting date of event</label>
                                <input type="date" class="form-control" name="date" id="date" value="{{ $event->date }}">
                            </div>

                            <div class="mb-3">
                                <label for="days" class="form-label">How many day(s) will the event last</label>
                                <input type="number" class="form-control" name="days" id="days" value="{{ $event->days }}">
                            </div>

                            <div class="mb-3">
                                <label for="ticket_amount" class="form-label">How much is the ticket(₦)</label>
                                <input type="number" min="2000" class="form-control" name="ticket_amount" id="ticket_amount" value="{{ $event->ticket_amount }}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="exhibition_amount" class="form-label">How much is exhibitors to pay(₦)</label>
                                <input type="number" min="5000" class="form-control" name="exhibition_amount" id="exhibition_amount" value="{{ $event->exhibition_amount }}">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image <code>Dimension: 870px by 413px</code></label>
                                <input type="file" class="form-control" name='image' id="image">
                            </div>

                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="addFeature" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Add Feature</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('/addFeature') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" name="position" id="position" placeholder="Enter Position">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">A little description of the person</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="linkedin" class="form-label">LinkedIn Link</label>
                                <input type="url" class="form-control" name="linkedin" id="linkedin">
                            </div>

                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram Link</label>
                                <input type="url" class="form-control" name="instagram" id="instagram">
                            </div>

                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook Link</label>
                                <input type="url" class="form-control" name="facebook" id="facebook">
                            </div>

                            <div class="mb-3">
                                <label for="section" class="form-label">Type</label>
                                <select class="form-select" aria-label="type" name="type">
                                    <option selected value= "">Select type</option>
                                    <option value="Speaker">Speaker</option>
                                    <option value="Panelist">Panelist</option>
                                    <option value="Artist">Artist</option>
                                    <option value="Exhibitor">Exhibitor</option>
                                    <option value="Team">Organizer</option>
                                    <option value="Special Guest of Honor">Special Guest of Honor</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name='image' id="image">
                            </div>

                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Feature</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="addSponsor" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Add Feature</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('/addSponsor') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                            <div class="mb-3">
                                <label for="link" class="form-label">Page Link</label>
                                <input type="url" class="form-control" name="link" id="link">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name='image' id="image">
                            </div>

                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Sponsor</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="addSchedule" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Add Schedule</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('/addSchedule') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>

                            <div class="mb-3">
                                <label for="day" class="form-label">Day</label>
                                <input type="number" class="form-control" min="1" max="{{$event->day}}" name="day" id="day">
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" id="location">
                            </div>

                            <div class="mb-3">
                                <label for="start_time" class="form-label">Start Time</label>
                                <input type="time" class="form-control" name="start_time" id="start_time">
                            </div>

                            <div class="mb-3">
                                <label for="end_time" class="form-label">End Time</label>
                                <input type="time" class="form-control" name="end_time" id="end_time">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>

                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Schedule</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        @if(!empty($event->highlight))
        <div id="deleteHighlight" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center p-5">
                        <div class="text-end">
                            <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mt-2">
                            <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="hover" style="width:150px;height:150px">
                            </lord-icon>
                            <h4 class="mb-3 mt-4">Are you sure you want to delete <br/> {{ $event->highlight->title }}?</h4>
                            <form action="{{ url('/deleteSectionItem') }}" method="POST">
                                @csrf
                                <input name="section_id" type="hidden" value="{{$event->highlight->id}}">
                                <hr>
                                <button type="submit" class="btn btn-danger w-100">Yes, Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer bg-light p-3 justify-content-center">

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="editHighlight" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Edit section Item</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('/updateSectionItem') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input name="section_id" type="hidden" value="{{$event->highlight->id}}">
                            <input type="hidden" name="type" value="youtube">
                            <input type="hidden" name="location" value="event-details">


                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $event->highlight->title }}">
                            </div>

                            <div class="mbr-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description">{!! $event->highlight->description !!}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="link" class="form-label">Youtube Embed Code</label>
                                <input type="text" class="form-control" name="link" id="link" value="{{ $event->highlight->link }}">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name='image' id="image">
                            </div>
                                        
                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        @endif

        <div id="addsection" class="modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" style="display: none;">
            <!-- Fullscreen Modals -->
            <div class="modal-dialog modal-xl">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Add section Item</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('/addSectionItem') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="hidden" name="type" value="youtube">
                            <input type="hidden" name="location" value="event-details">


                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>

                            <div class="mbr-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="link" class="form-label">Youtube Embed Code</label>
                                <input type="text" class="form-control" name="link" id="link">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name='image' id="image">
                            </div>
                                      

                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Create a section Item</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div>
</div>

@include('includes.footer')