@extends('layouts.app')

@section('title')
    Add Product
@endsection

@push('css')
    <link href="{{ URL::asset('build/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
    <style>
        .card-body h5 {
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: 600;
        }
        .form-control {
            margin-bottom: 15px;
        }
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <h5 class="mb-3">Product Title</h5>
                        <input type="text" class="form-control" name="title" placeholder="Write title here..." required>
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-3">Small Description</h5>
                        <textarea class="form-control" name="small_description" cols="4" rows="6" placeholder="Write a small description here..."></textarea>
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-3">Description</h5>
                        <textarea class="form-control" name="description" cols="4" rows="6" placeholder="Write a description here..."></textarea>
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-3">Display Images</h5>
                        <input id="fancy-file-upload" type="file" name="images" accept=".jpg, .png, image/jpeg, image/png">
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
                        <select class="form-select" id="AddCategory" name="category">
                            <option value="Topwear">Topwear</option>
                            <option value="Bottomwear">Bottomwear</option>
                            <option value="Casual Tshirt">Casual Tshirt</option>
                            <option value="Electronic">Electronic</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="Collection" class="form-label">Collection</label>
                        <input type="text" class="form-control" id="Collection" name="collection" placeholder="Collection">
                    </div>
                    <div class="col-12">
                        <label for="Tags" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="Tags" name="tags" placeholder="Tags">
                    </div>
                </div><!--end row-->
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="mb-3">Variants</h5>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="SKU" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="SKU" name="sku" placeholder="SKU">
                    </div>
                    <div class="col-12">
                        <label for="Color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="Color" name="color" placeholder="Color">
                    </div>
                    <div class="col-12">
                        <label for="Size" class="form-label">Size</label>
                        <input type="text" class="form-control" id="Size" name="size" placeholder="Size">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                    </form>
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
