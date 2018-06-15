@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
			<h4>Мои ссылки</h4>
		</div>
        <div class="panel-body">
			@forelse($links as $link)
				<div style="display: flex;justify-content: space-between;">
					<div>{{ $link->full }}</div>
					<div>{{ $link->short }}</div>
					<div>{{ $link->count }}</div>
					<div><a href="{{ route('link.stats', $link->id) }}">Статистика</a></div>
				</div>
			@empty
				<p>Пока ничего нет...</p>
			@endforelse
		</div>
	</div>
	<br>
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
        	<h4>Добавить ссылку</h4>
    	</div>
        <div class="panel-body">
			<form action="{{ URL::route('link.create') }}" method="POST" style="display: flex;justify-content: space-between;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div><input class="form-control" type="text" name="full" placeholder="ваша ссылка"></div>
				<div><input class="form-control" type="text" name="short" placeholder="имя ссылки"></div>
				<div><input class="form-control dateselect" type="text" id="date" name="stoped_at" placeholder="дата устаревания"></div>
				<div><button class="btn btn-sm btn-success" type="submit">Уменьшить</button></div>
			</form>
		</div>
	</div>
</div>
@endsection

@push('headcontent')
    <link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.css"/>
@endpush

@push('extscripts')
    <script src="/js/jquery.datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#date').datetimepicker({
                format:'d.m.Y H:i',
                step:15,
                minDate:0,
                dayOfWeekStart:1,
                disabledWeekDays:[0],
                // minTime:'07:00',
                // maxTime:'21:00',
            });
            $.datetimepicker.setLocale('ru');
        });
    </script>
@endpush