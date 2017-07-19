@extends('layouts.master')

@section('title')
    Чек
@endsection
<script type="text/javascript">
    function selectCity(){
        var select = document.getElementById('city-sel'),
            val_sel = select.options[select.selectedIndex].value;
        window.location.href = '/'+val_sel;
    }
</script>
@section('content')

    <div class="row">
        <div class="col-md-12 text-center">
            <p>Куплено: {{ $total_qty or '' }} шт.</p>
            <p>На сумму: {{ $total_price or '' }}руб.</p>
            <p>произведите оплату на кошелек QIWI : 48988885718</p>
        </div>
    </div>

@endsection