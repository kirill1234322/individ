@extends('layouts.app')

@section('content')
	
	<h1>{{ $data->title }}</h1>
	<p>
	{!! $data->content !!}

	@foreach ($attachdata as $item)
		<h2>{{ $item->title }} </h2>
		<img src="/images/neobychnye-muzei/{{ $item->img }}">
		<p>{{ $item->content }}</p>
		<a href="{{ $item->guid }}" target="_blank">{{ $item->title }}</a>
	@endforeach	

@endsection