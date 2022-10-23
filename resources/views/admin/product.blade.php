<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.pages.head-script')
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.pages.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.pages.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper p-5">
                    <div class="row ">

                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add Product</h4>
                                        <form action="{{ route('add-product') }}" method="POST"
                                            enctype="multipart/form-data" class="forms-sample">
                                            @csrf
                                            @method('post')
                                            @if (Session::has('success'))
                                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                            @endif
                                            @if (Session::has('fail'))
                                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                            @endif
                                            <div class="row">
                                                <div class="form-group ">
                                                    <label for="exampleInputUsername1">Product name</label>
                                                    <input style="background-color: white; color:black" type="text"
                                                        class="form-control" id="exampleInputUsername1"
                                                        placeholder="Product name" name="name">
                                                    <div class="text-danger"> @error('name')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>File upload</label>
                                                    <input style="background-color: white; color:black" type="file"
                                                        name="image" class="file-upload-default">
                                                    <div class="input-group col-xs-12">
                                                        <input style="background-color: white; color:black"
                                                            type="text" class="form-control file-upload-info"
                                                            disabled placeholder="UploadImage">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary"
                                                                type="button">Upload</button>
                                                        </span>
                                                    </div>
                                                    <div class="text-danger"> @error('image')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-6 ">
                                                    <label class="">Prodcut Category</label>
                                                    <div class="">
                                                        <select style="background-color: white; color:black"
                                                            class="form-control" name="category_id">
                                                            @foreach ($category as $catitem)
                                                                <option value="{{ $catitem->id }}">{{ $catitem->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="text-danger"> @error('category_id')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputUsername1">Price</label>
                                                    <input style="background-color: white; color:black" type="number"
                                                        class="form-control" id="exampleInputUsername1"
                                                        placeholder="Price" name="price">
                                                    <div class="text-danger"> @error('price')
                                                            {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">All Products</h4>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                @if (Session::has('delete'))
                                                    <div class="alert alert-success">{{ Session::get('delete') }}</div>
                                                @endif
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Product name</th>
                                                        <th>Category name</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($product as $product_item)
                                                        <tr>
                                                            <td> <img src="/book/{{ $product_item->image }}"> </td>
                                                            <td>{{ $product_item->name }}</td>
                                                            <td>{{ $product_item->category->name }}</td>
                                                            <td>{{ $product_item->price }}</td>
                                                            <td> <a class="badge badge-danger"
                                                                    href="{{ route('category.delete', $product_item->id) }}">
                                                                    Delete
                                                                </a> </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            fpi-ecommerce 2022</span>

                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('admin.pages.script')
</body>

</html>
