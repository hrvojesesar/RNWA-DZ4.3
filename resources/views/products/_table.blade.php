@foreach ($products as $product)
    <tr>
        <td>{{ $product->ProductID }}</td>
        <td>{{ $product->ProductName }}</td>
        <td>{{ $product->SupplierID }}</td>
        <td>{{ $product->CategoryID }}</td>
        <td>{{ $product->QuantityPerUnit }}</td>
        <td>{{ $product->UnitPrice }}</td>
        <td>{{ $product->UnitsInStock }}</td>
        <td>{{ $product->UnitsOnOrder }}</td>
        <td>{{ $product->ReorderLevel }}</td>
        <td>{{ $product->Discontinued }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->ProductID) }}" method="Post">
                <a class="btn btn-primary"href="{{ route('products.edit',$product->ProductID) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
