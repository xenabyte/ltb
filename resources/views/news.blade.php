@include('includes.header')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
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
                            <li class="breadcrumb-item active">Slider</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">News</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNews">Add News</button>
                        </div>
                    </div><!-- end card header -->
                    @if(!empty($news))
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-xl-12">
                                
                                <table id="fixed-header" class="table table-borderedless dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Posted Date</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($news as $singleNews)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $singleNews->title }} </td>
                                            <td><img class="rounded shadow" alt="{{ $singleNews->image }}" width="30%" src="{{ asset($singleNews->image) }}"></td>
                                            <td>{{ !empty($singleNews->event)? $singleNews->event->title : null }}</td>
                                            <td><span class="badge badge-soft-primary">{{ $singleNews->status == 'unpublish' ? 'Draft' : 'Published' }}</span></td>
                                            <td>{{ date('F jS, Y \a\t g:i A', strtotime($singleNews->created_at)) }}</td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#viewNews{{$singleNews->id}}" class="link-info"><i class="ri-eye-fill"></i></a>
                                                    @if($singleNews->status == 'unpublish')
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#publishNews{{$singleNews->id}}" class="link-success"><i class="ri-checkbox-circle-line"></i></a>
                                                    @else
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#unPublishNews{{$singleNews->id}}" class="link-warning"><i class="ri-close-circle-fill"></i></a>
                                                    @endif
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteNews{{$singleNews->id}}" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editNews{{$singleNews->id}}" class="link-primary"><i class="ri-edit-circle-fill"></i></a>

                                                    <div id="publishNews{{$singleNews->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center p-5">
                                                                    <div class="text-end">
                                                                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <lord-icon src="https://cdn.lordicon.com/wloilxuq.json" trigger="hover" style="width:150px;height:150px">
                                                                        </lord-icon>
                                                                        <h4 class="mb-3 mt-4">Are you sure you want to publish news?</h4>
                                                                        <form action="{{ url('/managePost') }}" method="POST">
                                                                            @csrf
                                                                            <input name="news_id" type="hidden" value="{{$singleNews->id}}">
                                                                            <input name="action" type="hidden" value="publish">
                                                                            <hr>
                                                                            <button type="submit" class="btn btn-warning w-100">Yes, publish</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer bg-light p-3 justify-content-center">
    
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->

                                                    <div id="unPublishNews{{$singleNews->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center p-5">
                                                                    <div class="text-end">
                                                                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <lord-icon src="https://cdn.lordicon.com/wloilxuq.json" trigger="hover" style="width:150px;height:150px">
                                                                        </lord-icon>
                                                                        <h4 class="mb-3 mt-4">Are you sure you want to unpublish news?</h4>
                                                                        <form action="{{ url('/managePost') }}" method="POST">
                                                                            @csrf
                                                                            <input name="news_id" type="hidden" value="{{$singleNews->id}}">
                                                                            <input name="action" type="hidden" value="unpublish">
                                                                            <hr>
                                                                            <button type="submit" class="btn btn-success w-100">Yes, unpublish</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer bg-light p-3 justify-content-center">
    
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
    
                                                    <div id="deleteNews{{$singleNews->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center p-5">
                                                                    <div class="text-end">
                                                                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="hover" style="width:150px;height:150px">
                                                                        </lord-icon>
                                                                        <h4 class="mb-3 mt-4">Are you sure you want to delete <br/> {{ $singleNews->title }}?</h4>
                                                                        <form action="{{ url('/managePost') }}" method="POST">
                                                                            @csrf
                                                                            <input name="news_id" type="hidden" value="{{$singleNews->id}}">
                                                                            <input name="action" type="hidden" value="delete">
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

                                                    <div id="editNews{{$singleNews->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                                            <div class="modal-content border-0 overflow-hidden">
                                                                <div class="modal-header p-3">
                                                                    <h4 class="card-title mb-0">Edit News</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                        
                                                                <div class="modal-body">
                                                                    <form action="{{ url('/updateNews') }}" method="post" enctype="multipart/form-data">
                                                                        @csrf

                                                                        <input name="news_id" type="hidden" value="{{$singleNews->id}}">
                                        
                                                                        <div class="mb-3">
                                                                            <label for="newsTitle" class="form-label">Title</label>
                                                                            <input type="text" class="form-control" name="title" id="newsTitle" value="{{ $singleNews->title }}">
                                                                        </div>
                                        
                                                                        <div class="mb-3">
                                                                            <label for="description" class="form-label">New Details</label>
                                                                            <textarea class="form-control" name="description" id="description" >{!! $singleNews->description !!}</textarea>
                                                                        </div>
                                        
                                                                        <div class="mb-3">
                                                                            <label for="image" class="form-label">Image</label>
                                                                            <input type="file" class="form-control" name='image' id="image">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="section" class="form-label">Event</label>
                                                                            <select class="form-select" aria-label="location" name="location">
                                                                                <option selected value= "">Select Event</option>
                                                                                <option value="">General</option>
                                                                                @foreach($events as $event)
                                                                                <option value="{{$event->id}}">{{ $event->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                        
                                                                        <div class="mb-3">
                                                                            <label for="created_at" class="form-label">Created At</label>
                                                                            <input type="date" class="form-control" name="created_at" id="created_at">
                                                                        </div>
                                        
                                        
                                                                        <hr>
                                                                        <div class="text-end">
                                                                            <button type="submit" class="btn btn-primary">Edit News</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->

                                                    <div id="viewNews{{$singleNews->id}}" class="modal fade" tabindex="-1" aria-labelledby="viewNews" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="viewNews">News Details</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5 class="fs-15">
                                                                        {{ $singleNews->title }}
                                                                    </h5>
                                                                    <p class="card-text">{!! $singleNews->description !!}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary ">Save Changes</button>
                                                                </div>

                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <hr>

                                <div class="text-end">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addNews" class="btn btn-primary">Add News</a>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                    @endif
                </div><!-- end card -->
            </div>
        </div>
        <!-- end row -->

        <div id="addNews" class="modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" style="display: none;">
            <!-- Fullscreen Modals -->
            <div class="modal-dialog modal-xl">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Add News</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('/addNews') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="newsTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="newsTitle">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">New Details</label>
                                <textarea class="form-control" name="description" id="description" ></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name='image' id="image">
                            </div>

                            <div class="mb-3">
                                <label for="section" class="form-label">Event</label>
                                <select class="form-select" aria-label="location" name="location">
                                    <option selected value= "">Select Event</option>
                                    <option value="">General</option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{ $event->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="created_at" class="form-label">Created At</label>
                                <input type="date" class="form-control" name="created_at" id="created_at">
                            </div>

                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Create a News</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>

@include('includes.footer')
