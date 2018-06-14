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
			<form action="{{ URL::route('link.create') }}" method="POST" style="display: flex;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
				<input class="form-control" type="text" name="full" placeholder="ваша ссылка">
				<input class="form-control" type="text" name="short" placeholder="имя ссылки">
				<input class="btn btn-sm btn-success" type="submit" name="">
			</form>
		</div>
	</div>
</div>
@endsection
