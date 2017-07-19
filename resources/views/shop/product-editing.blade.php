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
        <form action="{{ route('adm.prod.save') }}" method="post" class="form-inline">
            {{ csrf_field() }}
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Товар</th>
                    <th>Количество</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prod as $pr)
                    <tr>
                        <input type="hidden" name="id_prod[]" value="{{ $pr->id }}">
                        <td>{{ $pr->title or ''}}</td>
                        <td><input class="input-sm form-control text-center" type="text" name="count_prod[]" value="{{ $pr->count or '' }}"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-default pull-right">Сохранить</button>
        </form>

    </div>

@endsection