@extends('layouts.app')
@section('title')
   Owner Dashboard
@endsection

@section('content')
<div class="container product">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="download-btn">
                <a href="#">
                    <button class="btn btn-success">Import</button>
                </a>
                <a href="#">
                    <button class="btn btn-danger" id="exportCsvBtn">Export</button>
                </a>
                <a href="#">
                    <button class="btn btn-primary" id="downloadPdfBtn">Download as pdf</button>
                </a>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 search">
            <form action="{{ route('products.index') }}" method="GET" class="search-input">
                <i class="bi bi-search"></i>
                <input type="search" id="searchInput" class="search-field" name="searchInput" placeholder="Search Here..." value="{{ request()->input('searchInput') }}">
            </form>
        </div>
    </div>
    <h2 class="mt-5">Product List</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table id="productTable" class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Small Description</th>
                <th>Description</th>
                <th>Category</th>
                <th>Images</th>
                <th>Collection</th>
                <th>Tags</th>
                <th>SKU</th>
                <th>Color</th>
                <th>Size</th>
                <th>Price</th>
                <th>Stocks</th> <!-- Add Stocks Column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td>{{ ($products->currentPage()-1) * $products->perPage() + $index + 1 }}</td>
                    <td>{{ $product->title }}</td>
                    <td class="s-desc"><p>{{ $product->small_description }}</p></td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category }}</td>
                    <td>
                        @if(is_array($product->images))
                            @foreach ($product->images as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Product Image" style="width: 50px;">
                            @endforeach
                        @else
                            <img src="{{ asset('storage/' . $product->images) }}" alt="Product Image" style="width: 50px;">
                        @endif
                    </td>
                    <td>{{ $product->collection }}</td>
                    <td>{{ $product->tags }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stocks }}</td> <!-- Display Stocks -->
                    <td class="d-flex">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm me-2"><i class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>

@endsection

@push('script')
    <!--plugins-->
    <script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ URL::asset('build/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.17/jspdf.plugin.autotable.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const { jsPDF } = window.jspdf;

            document.getElementById("downloadPdfBtn").addEventListener("click", function () {
                const doc = new jsPDF();

                const tableElement = document.getElementById('productTable');
                if (!tableElement) {
                    console.error("Table element not found");
                    return;
                }

                const rows = [];
                tableElement.querySelectorAll("tbody tr").forEach(row => {
                    const rowData = [];
                    row.querySelectorAll("td").forEach(cell => {
                        rowData.push(cell.innerText.trim());
                    });
                    rows.push(rowData);
                });

                if (rows.length === 0) {
                    console.error("No rows found in the table");
                    return;
                }

                doc.autoTable({
                    head: [['S.No', 'Title', 'Small Description', 'Description', 'Category', 'Images', 'Collection', 'Tags', 'SKU', 'Color', 'Size', 'Price', 'Stocks', 'Actions']],
                    body: rows,
                    styles: { cellPadding: 0.5, fontSize: 8 },
                });

                doc.save("product-list.pdf");
            });

            document.getElementById("exportCsvBtn").addEventListener("click", function () {
                const tableElement = document.getElementById('productTable');
                if (!tableElement) {
                    console.error("Table element not found");
                    return;
                }

                const rows = [];
                tableElement.querySelectorAll("thead tr").forEach(row => {
                    const rowData = [];
                    row.querySelectorAll("th").forEach(cell => {
                        rowData.push(cell.innerText.trim());
                    });
                    rows.push(rowData);
                });

                tableElement.querySelectorAll("tbody tr").forEach(row => {
                    const rowData = [];
                    row.querySelectorAll("td").forEach(cell => {
                        rowData.push(cell.innerText.trim());
                    });
                    rows.push(rowData);
                });

                if (rows.length === 0) {
                    console.error("No rows found in the table");
                    return;
                }

                let csvContent = "data:text/csv;charset=utf-8,";
                rows.forEach(rowArray => {
                    let row = rowArray.join(",");
                    csvContent += row + "\r\n";
                });

                const encodedUri = encodeURI(csvContent);
                const link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "product-list.csv");
                document.body.appendChild(link);

                link.click();
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/dashboard2.js') }}"></script>
    <script src="{{ URL::asset('build/js/main.js') }}"></script>
    <script src="{{ URL::asset('asstes/js/shopus.js') }}"></script>
@endpush
