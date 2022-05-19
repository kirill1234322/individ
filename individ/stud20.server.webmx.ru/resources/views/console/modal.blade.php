@extends('layouts.app')

@section('content')

	<h1>Форма</h1>

	
<form class="console" action="/admin/add2" method="post" enctype="multipart/form-data">
	
	<input type="text" placeholder="Название" name="title" value=""><p>	
	<textarea name="content"></textarea><p>
	<input type="text" placeholder="Имя" name="name" value="{{ isset($data->name)? $data->name : '' }}"><p>
	<input type="text" placeholder="Дата" name="" value="" readonly><p>
	<input type="text" placeholder="Ссылка" name="guid" value="" readonly><p>	
	<input type="text" placeholder="Изображение" name="path" value="" readonly><p>	
	<input type="file" name="image" /><p>
	
    <input type="submit" value="Создать"><p>	
	@csrf
	
</form>


@endsection