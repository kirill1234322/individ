<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	
	// обработчик http://muzei-mira/console
	public function acConsole () {
		// получим записи верхнего уровня (parent = 0)
		$data = DB::table("posts")->where("parent", "=", 0)->get();
                $menu_data = DB::table("posts")->get();
		// отдадим полученные данные в представление
		return view("console.index")->with(["data"=>$data, "menu_data"=>$menu_data]);
	}
	
	// обработчик http://muzei-mira/console/update/{параметр}
	public function acConsoleFormUpdate ($id) {
		// получим запись по переданному в параметре идентификатору ($id)
		$data = DB::table("posts")->where("id", "=", $id)->first();
		// у записи в базе данных могут быть подчиненные 
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		// откроем форму на обновление данных редактируемой записи
		// выведем прикрепленные записи если они есть
		// отдадим полученные данные в представление
                $menu_data = DB::table("posts")->get();
		return view("console.modification")->with(["menu_data"=>$menu_data, "data" => $data,  "attachdata" => $attachdata]);	}


public function acConsoleFormGO ($id) {
		// получим запись по переданному в параметре идентификатору ($id)
		$data = DB::table("posts")->where("id", "=", $id)->first();
		// у записи в базе данных могут быть подчиненные 
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		// откроем форму на обновление данных редактируемой записи
		// выведем прикрепленные записи если они есть
		// отдадим полученные данные в представление
                $menu_data = DB::table("posts")->where("name", "=", $data->id)->get();
		return view("$menu_data")->with(["menu_data"=>$menu_data, "data" => $data,  "attachdata" => $attachdata]);	}



	// обработчик http://muzei-mira/console/add
	public function acConsoleFormAdd (Request $request) {
		// откроем форму на добавление данных
		// при этом отдаем представлению идентификатор родительской записи, для вывода в скрытое поле формы
		$menu_data = DB::table("posts")->get();
return view("console.modification")->with(["parent"=>$request->input("parent"), "menu_data"=>$menu_data, "data" => $request]);
	}
	
	// обработчик http://muzei-mira/admin/modification
	// вставляем / редактируем данные базы 
	public function acDataModification (Request $request) {
		// если передаем данные родительского блока значит выполняется вставка новой записи БД
		if ($request->input("parent") != null) {
			
			// если передается изображение 
			if ($request->hasFile('image')) {
				// получим оригинальное имя файла для записи в базу
				$image = $request->file('image')->getClientOriginalName();
				// переместим файл в директорию хранения
				$request->file('image')->move("images/asset/", $image);
			} else $image = '';	
			
			// выполним запрос на вставку с сохранением идентификатора вставленной записи
			$id = DB::table("posts")->insertGetId(
				[
					'title' => $request->input('title'),
					'content' => $request->input('content'),
					'name' => $request->input('name'),
					'img' => $image,
					'guid' => $request->input('guid'),
					'parent' => $request->input('parent')
				]
			);
		
			// если передается идентификатор записи значит выполняется обновление записи БД	
		} elseif ($request->input("id") != null) {
			
			// если передается изображение 
			if ($request->hasFile('image')) {
				// получим новое имя файла
				$image = $request->file('image')->getClientOriginalName();
				// переместим файл в директорию хранения
				$request->file('image')->move("images/asset/", $image);
			} else $image = $request->input('path');	
			
			// получим идентификатор обновляемой записи
			$id = $request->input("id");
			// выполним запрос на обновление записи
			DB::table("posts")->where("id", $id)->update(
				[
					'title' => $request->input('title'),
					'content' => $request->input('content'),
					'name' => $request->input('name'),
					'img' => $image,
					'guid' => $request->input('guid')
				]
			);
			
		}
		// выполним редирект к вставленной / обновленной записи 
		return redirect ('/console/update/' . $id);
	}	

	// сработает на http://muzei-mira/admin/delete/{параметр}
	function acDataDelete ($id) {
		// выполним запрос на удаление записи
		DB::table("posts")->where("id", $id)->delete();
		
		// выполним редирект на страницу из которой удалялась запись
		return back();
	}
	
	public function acAdminConsole(Request $request) {
		// если передаем данные родительского блока значит выполняется вставка новой записи БД
		// if ($request->input("parent") != null) {
		
		// если передается изображение
		if ($request->hasFile('image')) 
		{
		// получим оригинальное имя файла для записи в базу
		$image = $request->file('image')->getClientOriginalName();
		// переместим файл в директорию хранения
		$request->file('image')->move("images/asset/", $image);
		} 
		else $image = '';
		
		// выполним запрос на вставку с сохранением идентификатора вставленной записи
		$id = DB::table("posts")->insertGetId(
		[
		'title' => $request->input('title'),
		'content' => $request->input('content'),
		'name' => $request->input('name'),
		'img' => $image,
		'guid' => $request->input('guid'),
		'allowed' => 1,
		'parent' => 0//$request->input('parent')
		]
		);
		
		// выполним редирект к вставленной / обновленной записи
		return redirect ('/console/update/' . $id);
		}
		
		
		
		
		//////// открываем форму
		public function acAddConsole() {
			// откроем форму на добавление данных
			$data = DB::table("posts")->where("parent", "=", 0)->get();
				// отдадим полученные данные в представление
				$menu_data = DB::table("posts")->get();
				return view("console.modal")->with(["data"=>$data, "menu_data"=>$menu_data]);
			
			
		}
		
		
		
		
			
		
}