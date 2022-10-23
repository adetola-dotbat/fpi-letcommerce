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
                                        <h4 class="card-title">Add Category</h4>
                                        <form action="{{ route('add-category') }}" method="POST" class="forms-sample">
                                            @csrf
                                            @method('post')
                                            @if (Session::has('success'))
                                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                            @endif
                                            @if (Session::has('fail'))
                                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                            @endif
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Category name</label>
                                                <input style="background-color: white; color:black" type="text"
                                                    class="form-control" id="exampleInputUsername1"
                                                    placeholder="Category name" name="name">
                                                <div class="text-danger"> @error('name')
                                                        {{ $message }}
                                                    @enderror
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
                                        <h4 class="card-title">All Categories</h4>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                @if (Session::has('delete'))
                                                    <div class="alert alert-success">{{ Session::get('delete') }}</div>
                                                @endif

                                                <thead>
                                                    <tr>
                                                        <th>Category name</th>
                                                        <th>Created</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($category as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td> <a class="badge badge-danger"
                                                                    href="{{ route('category.delete', $item->id) }}">
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
