@include('includes.header')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Event</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEvent">Add Event</button>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            @foreach($events as $event)
                            <div class="col-sm-6 col-xl-3">
                                <!-- Simple card -->
                                <div class="card">
                                    <div class="card-body">
                                        <img class="rounded shadow" alt="{{ $event->image }}" width="100%" src="{{ asset($event->image) }}">
                                        <hr>
                                        <h4 class="card-title mb-2">{{ $event->title }}</h4>
                                        <div class="text-start">
                                            <a href="{{url('/event/'.$event->slug)}}" class="btn btn-info">View</a>
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editEvent{{$event->id}}" style="margin: 5px" class="btn btn-primary">Edit Event</a>
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteEvent{{$event->id}}" style="margin: 5px" class="btn btn-danger">Delete Event</a>
                                        </div>
                                    </div>
                                </div><!-- end card -->

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

                                <div id="deleteEvent{{$event->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center p-5">
                                                <div class="text-end">
                                                    <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="mt-2">
                                                    <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="hover" style="width:150px;height:150px">
                                                    </lord-icon>
                                                    <h4 class="mb-3 mt-4">Are you sure you want to delete <br>{{ $event->title }}?</h4>
                                                    <form action="{{ url('/deleteEvent') }}" method="POST">
                                                        @csrf
                                                        <input name="event_id" type="hidden" value="{{$event->id}}">

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
                            </div><!-- end col -->
                        @endforeach
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div id="addEvent" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Add Event</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('/addEvent') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Event Name</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">A little description of the event</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="about" class="form-label">A detail description of the event</label>
                                <textarea class="form-control" name="about" id="about"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Starting date of event</label>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>

                            <div class="mb-3">
                                <label for="days" class="form-label">How many days will the event last</label>
                                <input type="number" class="form-control" name="days" id="days">
                            </div>

                            <div class="mb-3">
                                <label for="ticket_amount" class="form-label">How much is the ticket(₦)</label>
                                <input type="number" min="2000" class="form-control" name="ticket_amount" id="ticket_amount">
                            </div>
                            
                            <div class="mb-3">
                                <label for="exhibition_amount" class="form-label">How much is exhibitors to pay(₦)</label>
                                <input type="number" min="5000" class="form-control" name="exhibition_amount" id="exhibition_amount">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name='image' id="image">
                            </div>

                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Create Event</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->




    </div>
</div>

@include('includes.footer')