extends('layouts.app')

@section('content')
	
	<h1>{{ $data->title }}</h1>
	@if($data->img !=null)
	<img src="images/asset/{!!$data->img!!}">
	@endif
	<p>
	{!! $data->content !!}

	@foreach ($attachdata as $item)
		<h2>{{ $item->title }} </h2>
	
	@if($item->img !=null)
		<img src="images/asset/{{$item->img}}">
	@endif
		<p>
			{{ $item->content }}			
		</p>
	@endforeach

@endsection