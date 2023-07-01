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
                            <li class="breadcrumb-item active">Gallery</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Gallery</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Add Gallery</button>
                        </div>
                    </div><!-- end card header -->
                    @if(!empty($gallerys))
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-xl-12">
                                
                                <table id="fixed-header" class="table table-borderedless dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Link</th>
                                            <th scope="col">Image</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gallerys as $gallery)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $gallery->title }} </td>
                                            <td>{{ asset($gallery->image) }}</td>
                                            <td><img class="rounded shadow" alt="{{ $gallery->image }}" width="30%" src="{{ asset($gallery->image) }}"></td>
                                            <td>{{ date('F jS, Y \a\t g:i A', strtotime($gallery->created_at)) }}</td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete{{$gallery->id}}" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit{{$gallery->id}}" class="link-primary"><i class="ri-edit-circle-fill"></i></a>

                                                    <div id="delete{{$gallery->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center p-5">
                                                                    <div class="text-end">
                                                                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="hover" style="width:150px;height:150px">
                                                                        </lord-icon>
                                                                        <h4 class="mb-3 mt-4">Are you sure you want to delete <br/> {{ $gallery->title }}?</h4>
                                                                        <form action="{{ url('deleteGallery') }}" method="POST">
                                                                            @csrf
                                                                            <input name="gallery_id" type="hidden" value="{{$gallery->id}}">
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

                                                    <div id="edit{{$gallery->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content border-0 overflow-hidden">
                                                                <div class="modal-header p-3">
                                                                    <h4 class="card-title mb-0">Edit Gallery</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                        
                                                                <div class="modal-body">
                                                                    <form action="{{ url('updateGallery') }}" method="post" enctype="multipart/form-data">
                                                                        @csrf

                                                                        <input name="gallery_id" type="hidden" value="{{$gallery->id}}">
                                        
                                                                        <div class="mb-3">
                                                                            <label for="title" class="form-label">Name</label>
                                                                            <input type="text" class="form-control" name="title" id="title" value="{{ $gallery->title }}">
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
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- end col -->
                        </div>
                    </div>
                    @endif
                </div><!-- end card -->
            </div>
        </div>
        <!-- end row -->

        <div id="add" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Add Gallery</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('addGallery') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Name</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" name='image' id="image">
                            </div>
                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add to gallery</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>

@include('includes.footer')