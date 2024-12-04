@extends('base')
@section('title', 'List of Stocks')
@section('content')
@php( $sum=0 )
  <div>
    <a href="/stocks/create" class="btn btn-primary mb-3">Add Stock</a>
  </div>     

  <table class="table">
    <thead class="thead-light">
        <tr>
          <th>ID</th>
          <th>Stock Name</th>
          <th>Stock Ticket</th>
          <th>Stock Value</th>
          <th>Updated at</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
        @php( $sum+=$stock->value )
        <tr>
            <td>{{$stock->id}}</td>
            <td>{{$stock->stock_name}} </td>
            <td>{{$stock->ticket}}</td>
            <td>€{{ number_format($stock->value, 2, ',', '.')}}</td>
            <td>{{$stock->updated_at}}</td>
            <td><a href="/stocks/edit/{{$stock->id}}" class="btn btn-primary">Edit</a></td>
            <td>
              <form action="/stocks/destroy/{{$stock->id}}" method="post">
                @csrf
                <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Delete</button>
              </form>
          </td>
        </tr>
        @endforeach
        <td></td>
        <td></td>
        <td></td>
        <td>€{{ number_format($sum, 2, ',', '.')}}</td>
        <td></td>
        <td></td>
        <td></td>
    </tbody>
  </table>
@endsection