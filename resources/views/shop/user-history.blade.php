@extends('layouts.master')

@section('title')
    История
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
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Название</th>
                <th>Количество</th>
                <th>Цена</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hist as $his)
            <tr>
                <td>{{ $his->prod_name }}</td>
                <td>{{ $his->prod_qty }}</td>
                <td>{{ $his->prod_price }}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection