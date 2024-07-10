@extends('layouts.app')
@section('title')
    Add Product
@endsection
@push('css')
    <link href="{{ URL::asset('build/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
@endpush
@section('content')
    

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="mb-3">Product Title</h5>
                        <input type="text" class="form-control" placeholder="write title here....">
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-3">Small Description</h5>
                        <textarea class="form-control" cols="4" rows="6" placeholder="write a description here.."></textarea>
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-3">Description</h5>
                        <textarea class="form-control" cols="4" rows="6" placeholder="write a description here.."></textarea>
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-3">Display images</h5>
                        <input id="fancy-file-upload" type="file" name="files"
                            accept=".jpg, .png, image/jpeg, image/png" multiple>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
           
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Organize</h5>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="AddCategory" class="form-label">Category</label>
                            <select class="form-select" id="AddCategory">
                                <option value="0">Topwear</option>
                                <option value="1">Bottomwear</option>
                                <option value="2">Casual Tshirt</option>
                                <option value="3">Electronic</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="Collection" class="form-label">Collection</label>
                            <input type="text" class="form-control" id="Collection" placeholder="Collection">
                        </div>
                        <div class="col-12">
                            <label for="Tags" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="Tags" placeholder="Tags">
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center gap-2">
                                <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm">Woman <i
                                        class="bi bi-x"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm">Fashion <i
                                        class="bi bi-x"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm">Furniture <i
                                        class="bi bi-x"></i></a>
                            </div>
                        </div>
                        <!-- <div class="col-12">
                            <label for="Vendor" class="form-label">Vendor</label>
                            <input type="text" class="form-control" id="Vendor" placeholder="Vendor">
                        </div> -->
                    </div><!--end row-->
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Variants</h5>
                    <div class="row g-3">
                       
                        <div class="col-12">
                            <label for="SKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="SKU" placeholder="SKU">
                        </div>
                        <div class="col-12">
                            <label for="Color" class="form-label">Color</label>
                            <input type="text" class="form-control" id="Color" placeholder="Color">
                        </div>
                        <div class="col-12">
                            <label for="Size" class="form-label">Size</label>
                            <input type="text" class="form-control" id="Size" placeholder="Size">
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="button" class="btn btn-primary">Add Variants</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
    
@endsection
@push('script')
    <!--bootstrap js-->
    <script src="{{ URL::asset('build/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ URL::asset('build/js/jquery.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
    <script>
        $('#fancy-file-upload').FancyFileUpload({
            params: {
                action: 'fileuploader'
            },
            maxfilesize: 1000000
        });
    </script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
