@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(isset($products) && !empty($products))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{ $product['qty'] }}</span>
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="label label-success">{{ $product['price'] }}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Действия<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('cart.reduce.one', ['id' => $product['item']['id']]) }}">Уменьшить на 1</a></li>
                                    <li><a href="{{ route('cart.increase.one', ['id' => $product['item']['id']]) }}">Увеличить на 1</a></li>
                                    <li><a href="{{ route('cart.reduce.all', ['id' => $product['item']['id']]) }}">Убрать</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 ">
                <a href="{{ route('cart.buy') }}" type="button" class="btn btn-success">Buy</a>
            </div>
            <div class="col-sm-6 col-md-6 ">
                <a href="{{ route('cart.destroy') }}" type="button" class="btn btn-danger">Clear</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection