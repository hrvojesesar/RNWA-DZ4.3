<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
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
            <li class="nav-item">
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
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('customerdemographic.index') }}">Customers Demographic</a>
            </li>
            <li class="nav-item">
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
    </div>
</nav>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customer Customer Demos List</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-primary" href="{{ route('customer_customer_demos.create') }}">Add new Category</a>
            </div>
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
            <th width="80px">CustomerID</th>
            <th width="230px">CustomerTypeID</th>
            <th width="230px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customerCustomerDemos as $customerCustomerDemo)
            <tr>
                <td>{{$customerCustomerDemo->CustomerID }}</td>
                <td>{{ $customerCustomerDemo->CustomerTypeID }}</td>
                <td>
                    <form action="{{ route('customer_customer_demos.destroy',$customerCustomerDemo->CustomerID) }}" method="Post">
                        <a class="btn btn-primary"href="{{ route('customer_customer_demos.edit',$customerCustomerDemo->CustomerID) }}">Edit</a>
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
</body>
</html>
