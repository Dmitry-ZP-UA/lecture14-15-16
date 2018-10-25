@extends('layouts.front.app')


@section('content')
    <div class="container product">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Cart</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container cart">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total by product</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($cart->isNotEmpty())
                            @foreach($cart as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{$item->count }}</td>
                                    <td>$ {{ number_format($item->price, 2, ',', '.')  }}</td>
                                    <td>$ {{ number_format($item->total, 2, ',', '.')  }}</td>
                                    <td>
                                        <a class="btn btn-danger"
                                           href="{{ route('cart.delete',['id' => $item->id]) }}">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td >Total in cart:</td>
                                <td colspan="5">$ {{ number_format($sum, 2, ',', '.')  }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5">Cart is empty</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
