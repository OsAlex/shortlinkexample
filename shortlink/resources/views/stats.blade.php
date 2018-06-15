@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
			<h4>Статистика для {{ $link->full }} ({{ $link->short }}):</h4>
		</div>
        <div class="panel-body">
			<div style="display: flex;justify-content: space-around;">
				<div>Страна</div>
				<div>Переходов</div>
			</div>
			@forelse($stats as $stat)
				<div style="display: flex;justify-content: space-around;">
					<div>{{ $stat->country }}</div>
					<div>{{ $stat->count }}</div>
				</div>
			@empty
				<p>Пока ничего нет...</p>
			@endforelse
		</div>
	</div>
</div>
@endsection
