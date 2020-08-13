@extends('admin.layout.admin')

@section('content')
  <style media="screen">
    th{
       margin:auto;text-align:center;
    }
  </style>
  <h3>Products</h3>
  <br>
  <table class="table table-striped" style="width:70%;margin:auto;text-align:center;">
    <thead>
      <tr style="margin:auto;text-align:center;">
        <th>S/N</th>
        <th>Category</th>
        <th>Products</th>
        <th></th>
        <th scope="col" col-span="5">Action</th>
      </tr>
    </thead>
    <tbody>
          @forelse ($products as $product)<!-- you can use foreach -->
      <tr>
        <th>1</th>
        <td>{{ !empty($product->category)?$product->category->name: "N/A"}}</td>
        <td>{{ $product->name }}</td>
        <td>
        <td style="width:100px;">
          <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
        </td>
        <td style="width:100px;">
          <form action="{{ route('product.destroy', $product->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" value="Delete">
          </form>
          </td>
      </tr>
    @empty
      <h3>No Items available</h3>
    @endforelse
    </tbody>
  </table>

@endsection
