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
                            <li class="breadcrumb-item active">section</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">section</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addsection">Add section Item</button>
                        </div>
                    </div><!-- end card header -->

                    @if(!empty($sections) && $sections->count() > 0)
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-xl-12">
                                
                                <table id="fixed-header" class="table table-borderedless dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Type</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sections as $section)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $section->title }} </td>
                                            <td>{!! $section->description !!}</td>
                                            <td><img class="rounded shadow" alt="{{ $section->image }}" width="30%" src="{{ asset($section->image) }}"></td>
                                            <td>{{ $section->type }}</td>
                                            <td>{{ date('F jS, Y \a\t g:i A', strtotime($section->created_at)) }}</td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete{{$section->id}}" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#edit{{$section->id}}" class="link-primary"><i class="ri-edit-circle-fill"></i></a>

                                                    <div id="delete{{$section->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center p-5">
                                                                    <div class="text-end">
                                                                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="mt-2">
                                                                        <lord-icon src="https://cdn.lordicon.com/wwneckwc.json" trigger="hover" style="width:150px;height:150px">
                                                                        </lord-icon>
                                                                        <h4 class="mb-3 mt-4">Are you sure you want to delete <br/> {{ $section->title }}?</h4>
                                                                        <form action="{{ url('/admin/deleteSectionItem') }}" method="POST">
                                                                            @csrf
                                                                            <input name="section_id" type="hidden" value="{{$section->id}}">
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

                                                    <div id="edit{{$section->id}}" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content border-0 overflow-hidden">
                                                                <div class="modal-header p-3">
                                                                    <h4 class="card-title mb-0">Edit section Item</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                        
                                                                <div class="modal-body">
                                                                    <form action="{{ url('/admin/updateSectionItem') }}" method="post" enctype="multipart/form-data">
                                                                        @csrf

                                                                        <input name="section_id" type="hidden" value="{{$section->id}}">
                                        
                                                                        <div class="mb-3">
                                                                            <label for="title" class="form-label">Title</label>
                                                                            <input type="text" class="form-control" name="title" id="title" value="{{ $section->title }}">
                                                                        </div>
                                            
                                                                        <div class="mbr-3">
                                                                            <label for="description" class="form-label">Description</label>
                                                                            <textarea class="form-control" name="description" id="description">{!! $section->description !!}</textarea>
                                                                        </div>
                                            
                                                                        <div class="mb-3">
                                                                            <label for="section" class="form-label">Type</label>
                                                                            <select class="form-select" aria-label="type" name="type">
                                                                                <option selected value= "{{ $section->type }}"> {{ $section->type }}</option>
                                                                                <option value="about">About</option>
                                                                                <option value="event">Event</option>
                                                                                <option value="team">Team</option>
                                                                                <option value="testimonial">Testimonial</option>
                                                                                <option value="blog">Blog</option>
                                                                                <option value="sponsor">Sponsor</option>
                                                                            </select>
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

        <div id="addsection" class="modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" style="display: none;">
            <!-- Fullscreen Modals -->
            <div class="modal-dialog modal-xl">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Add section Item</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('/admin/addSectionItem') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>

                            <div class="mbr-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="section" class="form-label">Type</label>
                                <select class="form-select" aria-label="type" name="type">
                                    <option selected value= "">Select type</option>
                                    <option value="about">About</option>
                                    <option value="event">Event</option>
                                    <option value="team">Team</option>
                                    <option value="testimonial">Testimonial</option>
                                    <option value="blog">Blog</option>
                                    <option value="sponsor">Sponsor</option>
                                </select>
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