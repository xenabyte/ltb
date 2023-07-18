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
                        <h4 class="card-title mb-0 flex-grow-1">Slider</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSlider">Add Slider</button>
                        </div>
                    </div><!-- end card header -->
                    @if(!empty($sliders))
                    <div class="card-body">
                        <div class="row">
                            @foreach($sliders as $slider)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img class="rounded shadow" alt="{{ $slider->image }}" width="100%" src="{{ asset($slider->image) }}">
                                        <hr>
                                        <h4 class="card-title mb-0 flex-grow-1">{{ $slider->title }}</h4>
                                        <hr>
                                        <h4 class="card-title mb-0 flex-grow-1"> Button Text: {{ $slider->button_text }}</h4>
                                        <h4 class="card-title mb-0 flex-grow-1"> Button Link: {{ $slider->button_link }}</h4>
                                        <hr>
                                        {!! $slider->description !!}
                                        <hr>
                                        <div class="text-center">
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editSlider{{$slider->id}}" style="margin: 5px" class="btn btn-info">Edit Slider</a>
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deletSlider{{$slider->id}}" style="margin: 5px" class="btn btn-danger">Delete Slider</a>
                                        </div>
                                    </div>
                                </div><!-- end card -->

                                <div id="deletSlider{{$slider->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body text-center p-5">
                                                <div class="text-end">
                                                    <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="mt-2">
                                                    <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="hover" style="width:150px;height:150px">
                                                    </lord-icon>
                                                    <h4 class="mb-3 mt-4">Are you sure you want to delete <br>{{ $slider->title  }}?</h4>
                                                    <form action="{{ url('deleteSlider') }}" method="POST">
                                                        @csrf
                                                        <input name="slider_id" type="hidden" value="{{ $slider->id }}">
                        
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

                                <div id="editSlider{{$slider->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content border-0 overflow-hidden">
                                            <div class="modal-header p-3">
                                                <h4 class="card-title mb-0">Update Slider Card</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                        
                                            <div class="modal-body">
                                                <form action="{{ url('updateSlider') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="slider_id" value="{{ $slider->id }}">
                        
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" class="form-control" name="title" id="title" value="{{ $slider->title }}">
                                                    </div>
                        
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea class="form-control" name="description" id="description">{!! $slider->description  !!}</textarea>
                                                    </div>

                                                    <hr>
                                                    <div class="mb-3">
                                                        <label for="text" class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" name="button_1_text" id="text" value="{{ $slider->button_text }}">
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="link" class="form-label">Button Link</label>
                                                        <input type="text" class="form-control" name="button_link" id="link" value="{{ $slider->button_link }}">
                                                    </div>

                                                    <hr>
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Image <code>Dimension: 1920px by 780px</code></label>
                                                        <input type="file" class="form-control" name='image' id="image">
                                                    </div>
                                                    
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </div>
                            @endforeach
                        </div>

                    </div><!-- end cardbody -->
                    @endif
                </div><!-- end card -->
            </div>
        </div>
        <!-- end row -->

        <div id="addSlider" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Add Slider</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('addSlider') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="name" placeholder="Enter Title">
                            </div>

                            <div class="mb-3">
                                <label for="Description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                            </div>

                            <hr>
                            <div class="mb-3">
                                <label for="text" class="form-label">Button Text</label>
                                <input type="text" class="form-control" name="button_text" id="text">
                            </div>
                            
                            <div class="mb-3">
                                <label for="link" class="form-label">Button Link</label>
                                <input type="text" class="form-control" name="button_link" id="link">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image <code>Dimension: 1920px by 780px</code></label>
                                <input type="file" class="form-control" name='image' id="image">
                            </div>

                            <hr>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Add Slider</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>

@include('includes.footer')