<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Northwind</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Početna <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('region.index') }}">Region</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('territory.index') }}">Territory</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shipper.index') }}">Shippers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('order.index') }}">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customerdemographic.index') }}">Customers Demographic</a>
            </li>
            <li class="new-item">
                <a class="nav-link" href="{{ route('customers.index') }}">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('suppliers.index') }}">Suppliers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orderDetails.index') }}">Order Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.index') }}">Employees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer_customer_demos.index') }}">Customer Customer Demo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee_territories.index') }}">Employee Territories</a>
            </li>
    </div>
</nav>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Regions List</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('region.create') }}">Add new Region</a>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-6">
                 <input type="text" name="searchInput" id="searchInput" class="form-control" placeholder="Search by Region Description">
            </div>
    </div>  
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Region ID</th>
            <th>Region Description</th>
            <th width="230px">Action</th>
        </tr>
        </thead>
        <tbody id="searchResults">
            @foreach ($regions as $region)
                <tr>
                    <td>{{ $region->RegionID }}</td>
                    <td>{{ $region->RegionDescription }}</td>
                    <td>
                        <form action="{{ route('region.destroy',$region->RegionID) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('region.edit',$region->RegionID) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var searchInput = document.getElementById('searchInput');
    var searchResults = document.getElementById('searchResults');
    searchInput.addEventListener('keyup', function () {
        var query = this.value;
        axios.get('{{ route('search') }}', {
            params: {
                query: query
            }
        })
        .then(function (response) {
            var results = response.data;
            var output = '';
            if (results.length === 0) {
                output = '<tr><td colspan="6">No regions found with that name.</td></tr>';
            } else {
                results.forEach(function (result) {
                    output += '<tr>';
                    output += '<td>' + result.RegionID + '</td>';
                    output += '<td>' + result.RegionDescription + '</td>';
                    output += '<td>';
                    output += '<form action="' + result.delete_route + '" method="Post">';
                    /*output += '<a class="btn btn-primary" href="' + result.edit_route + '">Edit</a>';*/
                    output += '@csrf';
                    /*output += '@method('DELETE')';
                    output += '<button type="submit" class="btn btn-danger">Delete</button>';*/
                    output += '</form>';
                    output += '</td>';
                    output += '</tr>';
                });
            }
            searchResults.innerHTML = output;
        })
        .catch(function (error) {
            console.log(error);
        });
    });
</script>
</body>
</html>
