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
    <h5 class="mb-3">Price</h5>
    <input type="text" class="form-control" name="price" placeholder="Enter price here..." required>
</div>
<div class="mb-4">
    <h5 class="mb-3">Stocks</h5>
    <input type="number" class="form-control" name="stocks" placeholder="Enter stock quantity..." required>
</div>
                    <div class="mb-4">
                        <h5 class="mb-3">Display Images</h5>
                        <div id="image-upload-wrapper">
                            <input type="file" name="images[]" accept=".jpg, .png, image/jpeg, image/png" multiple>
                        </div>
                        <button type="button" id="add-more-images" class="btn btn-secondary mt-2">Add More Images</button>
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
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                <label for="Collection" class="form-label">Collection</label>
                <select class="form-select" id="Collection" name="collection">
                    @foreach ($collections as $collection)
                        <option value="{{ $collection->name }}">{{ $collection->name }}</option>
                    @endforeach
                </select>
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
                        <select class="form-select" id="Color" name="color">
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                            <option value="RoseGold">RoseGold</option>
                        </select>
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
        $(document).ready(function() {
            $('#add-more-images').click(function() {
                $('#image-upload-wrapper').append('<input type="file" name="images[]" accept=".jpg, .png, image/jpeg, image/png" multiple class="mt-2">');
            });
        });
    </script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
@endpush
