@extends('layouts.app')

@section('content')
<h1>Latest news</h1>
	@foreach($data as $a)

	<h1>{{ $a->title }}</h1>
	<img src="/images/asset/{{ $a->img }}">
	<p>
	{!! $a->content !!}
@endforeach
<h1>Recent blog articles</h1>
@foreach($data2 as $b)
 <h1>{{ $b->title }}</h1>
	<img src="/images/asset/{{ $b->img }}">
	<p>
	{!! $b->content !!}
@endforeach
      

	
@endsection

