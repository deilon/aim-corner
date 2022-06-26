@include('top')

@if (session('status'))
<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-success"> {{ session('status') }}</div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Add a Post</h1>
            </div>
        </div>
    </div>
</section>

<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="single-post-tab" data-bs-toggle="tab" data-bs-target="#singlepost" type="button" role="tab" aria-controls="singlepost" aria-selected="true">Post</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-post-tab" data-bs-toggle="tab" data-bs-target="#imagepost" type="button" role="tab" aria-controls="imagepost" aria-selected="false">Images & Video</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="link-post-tab" data-bs-toggle="tab" data-bs-target="#linkpost" type="button" role="tab" aria-controls="linkpost" aria-selected="false">Link</button>
                    </li>
                </ul>
            

                <div class="tab-content" id="myTabContent">
                    
                    <div class="tab-pane fade show active" id="singlepost" role="tabpanel" aria-labelledby="single-post-tab">
                        <div class="post-form-content p-4"> <!-- Style/ChildrenStyle field value temporary (for wysiwyg reasons) -->
                            <form method="POST" action="/add/post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" required name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title (Required)">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="6" placeholder="Text (Optional)"></textarea>
                                    @error('text')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tags temporary -->
                                <!-- <div class="post-form-tags d-flex mt-4">
                                    <span>All</span>
                                    <span>Computer Programming</span>
                                    <span>Information Management</span>
                                    <button><i class="bi bi-plus-lg"></i></button>
                                </div> -->

                                <div class="post-form-cp d-flex mt-5 justify-content-end">
                                    <!-- <button class="post-form-cancel">CANCEL</button> -->
                                    <button type="submit" class="post-form-submit">POST</button>
                                </div>
                            </form>
                        </div>
                    </div>




                    <div class="tab-pane fade" id="imagepost" role="tabpanel" aria-labelledby="image-post-tab">
                        <div class="post-form-content p-4"> <!-- Style/ChildrenStyle field value temporary (for wysiwyg reasons) -->
                            <form method="POST" action="/add/post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" required name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title (Required)">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tags temporary -->
                                <!-- <div class="post-form-tags d-flex mt-4">
                                    <span>All</span>
                                    <span>Computer Programming</span>
                                    <span>Information Management</span>
                                    <button><i class="bi bi-plus-lg"></i></button>
                                </div> -->

                                <div class="post-form-cp d-flex mt-5 justify-content-end">
                                    <!-- <button class="post-form-cancel">CANCEL</button> -->
                                    <button type="submit" class="post-form-submit">POST</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    


                    <div class="tab-pane fade" id="linkpost" role="tabpanel" aria-labelledby="link-post-tab">
                        <div class="post-form-content p-4"> <!-- Style/ChildrenStyle field value temporary (for wysiwyg reasons) -->
                            <form method="POST" action="/add/post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" name="title" required class="form-control" placeholder="Title (Required)">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="url" name="link" class="form-control" id="exampleFormControlInput1" placeholder="Url">
                                    @error('link')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tags temporary -->
                                <!-- <div class="post-form-tags d-flex mt-4">
                                    <span>All</span>
                                    <span>Computer Programming</span>
                                    <span>Information Management</span>
                                    <button><i class="bi bi-plus-lg"></i></button>
                                </div> -->

                                <div class="post-form-cp d-flex mt-5 justify-content-end">
                                    <!-- <button class="post-form-cancel">CANCEL</button> -->
                                    <button type="submit" class="post-form-submit">POST</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</section>

@if (session('post_upload'))
<!-- User photo upload info -->
<div class="modal" id="user-post-upload" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Post photo upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>{{ session('post_upload') }}</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        </div>
    </div>
    </div>
</div>
@endif

@include('scripts')
<script>
    $(window).on('load', function() {
      $('#user-post-upload').modal('show');
    });
</script>

@include('bottom')