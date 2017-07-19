@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection
<script type="text/javascript">
    function selectCity(){
        var select = document.getElementById('city-sel'),
            val_sel = select.options[select.selectedIndex].value;
        window.location.href = '/'+val_sel;
    }
</script>
@section('content')
    <div class="row form-group">
        <div class="col-md-12">
            <div class="pull-right form-inline"><label for="">Город</label>
                <select name="" id="city-sel" class="form-control" onchange="selectCity()">
                    @foreach($city as $ct)
                    <option value="{{ $ct->id }}" @if($city_id == $ct->id) selected @endif>{{ $ct->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="row">
        @foreach($products as $key=>$product)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                    <div class="caption">
                        <h3>{{ $product->title }}</h3>
                        <p class="description">{{ $product->description }}</p>
                        <div class="clearfix">
                            <div class="pull-left price">${{ $product->price }}</div>
                            <div class="pull-left price" style="margin-left: 10px">  Qty. {{ $product->count or 0 }} pcs.</div>
                            <a href="{{ route('product.addToCart',[$product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection