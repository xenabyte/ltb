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
                            <li class="breadcrumb-item active">Site General Settings</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Site Information</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSiteInfo">{{ empty($siteInfo) ? 'Add Site Information' : 'Update Site Information' }}</button>
                        </div>
                    </div><!-- end card header -->
                    @if(!empty($siteInfo))
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-xl-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img class="rounded shadow" width="100%" src="{{asset($siteInfo->logo)}}" alt="Card image cap"> 
                                        <p>Logo</p>
                                    </div>
                                    <div class="col-md-6">
                                        <img class="rounded shadow" src="{{asset($siteInfo->footer_logo)}}" width="100%" alt="Card image cap">
                                        <p>Footer Logo</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img class="rounded shadow" width="100%" src="{{asset($siteInfo->banner)}}" alt="Card image cap"> 
                                        <p>Banner</p>
                                    </div>
                                </div>
                                <!-- Simple card -->
                                <p class="card-text"><strong>Description: </strong><?php echo $siteInfo->description ?></p>
                                <hr>
                                <p class="card-text"><strong>Tagline: </strong><?php echo $siteInfo->slogan ?></p>
                                <hr>
                                <p class="card-text"><strong>Keywords: </strong><?php echo $siteInfo->keyword ?></p>
                                <hr>
                                <p class="card-text"><strong>Address: </strong><?php echo $siteInfo->address ?></p>
                                <hr>
                                <p class="card-text"><strong>Phone Number(s): </strong><?php echo $siteInfo->phone ?></p>
                                <hr>
                                <p class="card-text"><strong>Email(s): </strong><?php echo $siteInfo->email ?></p>
                                <hr>
                                <p class="card-text"><strong>Start Year: </strong><?php echo $siteInfo->start_year ?></p>
                                <div class="text-end">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editSiteInfo" class="btn btn-primary">Edit Site Information</a>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                    @endif
                </div><!-- end card -->
            </div>
            <!-- end col -->
        
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Social Accounts</h4>
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSocial">{{ empty($social) ? 'Add Social Accounts' : 'Update Social Accounts' }}</button>
                        </div>
                    </div><!-- end card header -->
                    @if(!empty($social))
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-xl-12">
                                <!-- Simple card -->
                                <p class="card-text"><strong>Youtube Link:</strong> <a href="https://www.youtube.com/{{ $social->youtube }}" target="blank">https://www.youtube.com/{{ $social->youtube }}</a></p>
                                <p class="card-text"><strong>Facebook Link:</strong> <a href="https://www.facebook.com/{{ $social->facebook }}" target="blank">https://www.facebook.com/{{ $social->facebook }}</a></p>
                                <p class="card-text"><strong>Twitter Link:</strong> <a href="https://www.twitter.com/{{ $social->twitter }}" target="blank">https://www.twitter.com/{{ $social->twitter }}</a></p>
                                <p class="card-text"><strong>Instagram Link:</strong> <a href="https://www.instagram.com/{{ $social->instagram }}" target="blank">https://www.instagram.com/{{ $social->instagram }}</a></p>
                                <p class="card-text"><strong>LinkedIn Link:</strong> <a href="https://www.linkedin.com/{{ $social->linkedin }}" target="blank">https://www.linkedin.com/{{ $social->linkedin }}</a></p>
                                <div class="text-end">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editSocial" class="btn btn-primary">Edit Social</a>
                                </div>
                            </div><!-- end col -->
                        </div>
                    </div>
                    @endif
                </div><!-- end card -->
            </div>
        </div>
        <!-- end row -->
        
        <div id="editSiteInfo" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Update Site Informations</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
        
                    <div class="modal-body">
                        <form action="{{ url('updateSiteInfo') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name='siteinfo_id' value="{{ !empty($siteInfo) ? $siteInfo->id : '' }}">
        
                            <div class="mb-3">
                                <label for="logo" class="form-label">Institution Logo <code>Dimension: 168px by 41px</code></label>
                                <input type="file" class="form-control" name='logo' id="logo">
                            </div>
        
                            <div class="mb-3">
                                <label for="footerLogo" class="form-label">Footer Logo <code>Dimension: 168px by 41px</code></label>
                                <input type="file" class="form-control" name='footer_logo' id="footerLogo">
                            </div>
        
                            <div class="mb-3">
                                <label for="banner" class="form-label">Site Default Banner </label>
                                <input type="file" class="form-control" name='banner' id="banner">
                            </div>
        
                            <div class="mb-3">
                                <label for="keywords" class="form-label">Keywords</label>
                                <input type="text" class="form-control" name="keywords" id="keywords" value="{{ !empty($siteInfo) ? $siteInfo->keyword : '' }}">
                            </div>
        
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" ><?php echo !empty($siteInfo) ?   $siteInfo->description : '' ?></textarea>
                            </div>
        
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="address" ><?php echo !empty($siteInfo) ?   $siteInfo->address : '' ?></textarea>
                            </div>
        
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number(s)</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo !empty($siteInfo) ?   $siteInfo->phone : '' ?>" />
                            </div>
        
                            <div class="mb-3">
                                <label for="email" class="form-label">Email(s)</label>
                                <input type="text" class="form-control" name="email" id="email"  value="<?php echo !empty($siteInfo) ?   $siteInfo->email : '' ?>" />
                            </div>
        
                            <div class="mb-3">
                                <label for="start_year" class="form-label">Stary Year</label>
                                <input type="text" class="form-control" name="start_year" id="start_year" value="{{ !empty($siteInfo) ? $siteInfo->start_year : '' }}">
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
        
        
        <div id="editSocial" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 overflow-hidden">
                    <div class="modal-header p-3">
                        <h4 class="card-title mb-0">Update Social Informations</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
        
                    <div class="modal-body">
                        <form action="{{ url('updateSocialAccounts') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name='social_id' value="{{ !empty($social) ? $social->id : '' }}">
        
                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook Username</label>
                                <input type="text" class="form-control" name="facebook" id="facebook" value="{{ !empty($social) ? $social->facebook : '' }}">
                            </div>
        
                            <div class="mb-3">
                                <label for="twitter" class="form-label">Twitter Username</label>
                                <input type="text" class="form-control" name="twitter" id="twitter" value="{{ !empty($social) ? $social->twitter : '' }}">
                            </div>
        
                            <div class="mb-3">
                                <label for="linkedIn" class="form-label">LinkedIn Username</label>
                                <input type="text" class="form-control" name="linkedIn" id="linkedIn" value="{{ !empty($social) ? $social->linkedIn : '' }}">
                            </div>
        
                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram Username</label>
                                <input type="text" class="form-control" name="instagram" id="instagram" value="{{ !empty($social) ? $social->instagram : '' }}">
                            </div>
        
                            <div class="mb-3">
                                <label for="youtube" class="form-label">Youtube Username</label>
                                <input type="text" class="form-control" name="youtube" id="youtube" value="{{ !empty($social) ? $social->youtube : '' }}">
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
</div>

@include('includes.footer')