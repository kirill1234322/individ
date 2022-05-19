<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    // обработчик http://muzei-mira/
	public function acMain () {
		// формируем данные для представления main.blade.php
		// выполняем запрос к базе данных установленной по умолчанию

                $data = DB::table("posts")->where(["name" => "novosti"])->orderBy("id", "desc")->limit(3)->get()->reverse(); 		
                $data2 = DB::table("posts")->where(["name" => "blog"])->orderBy("id", "desc")->limit(3)->get()->reverse();
		$menu_data = DB::table("posts")->get();                    
	        return view("main", ["data" => $data, "data2" => $data2, "menu_data"=> $menu_data]);

                                       
	}
	
	public function acblog () {
		// формируем данные для представления velikie-muzei.blade.php
		// выполняем запрос к базе данных установленной по умолчанию
		$data = DB::table("posts")->where("name", "blog")->first();
		// по идентификатору главной получим прикрепленные записи 
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		
		
		// отдадим полученные данные в представление 
		return view("blog")->with(["data" => $data, "attachdata" => $attachdata]);
	}
	
	
	public function acNovosti () {
		// формируем данные для представления novosti.blade.php
		// выполняем запрос к базе данных установленной по умолчанию
		$datas = DB::table("posts")->where(["name" => "novosti"])->first();
		// по идентификатору главной получим прикрепленные записи 
		$attachdatas = DB::table("posts")->where("parent", "=", $datas->id)->get(); 
		// отдадим полученные данные в представление
		
		return view("novosti", ["data" => $datas,  "attachdata" => $attachdatas]);
	}
	
	
	public function acHistory () {
		// формируем данные для представления zhivopis.blade.php
		// выполняем запрос к базе данных установленной по умолчанию
		$data = DB::table("posts")->where(["name" => "history"])->first();
		// отдадим полученные данные в представление
		return view ("history")->with(["data" => $data]);
	}

	// обработчик http://muzei-mira/zhivopis/{параметр}
	public function acSubhistory ($subzhivopis) {
		// формируем данные для представления по переданному параметру
		// выполняем запрос к базе данных установленной по умолчанию
		$data = DB::table("posts")->where("name", "=", $subzhivopis)->first();
		// по идентификатору главной получим прикрепленные записи 
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		// отдадим полученные данные в представление
		return view ("history")->with(["data" => $data,  "attachdata" => $attachdata]);
	}
	
	// обработчик http://muzei-mira/skulptura
	public function acOpportunities () {
		// формируем данные для представления skulptura.blade.php
		// выполняем запрос к базе данных установленной по умолчанию
		$data = DB::table("posts")->where("name", "opportunities")->first();
		// по идентификатору главной получим прикрепленные записи 
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		// отдадим полученные данные в представление
		return view("opportunities")->with(["data" => $data, "attachdata" => $attachdata]);
	}
	
	
	public function acBrowser () {
		// формируем данные для представления goroda.blade.php
		// выполняем запрос к базе данных установленной по умолчанию
		$data = DB::table("posts")->where("name", "browser")->first();
		// по идентификатору главной получим прикрепленные записи 
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		// отдадим полученные данные в представление
		return view("browser")->with(["data" => $data, "attachdata" => $attachdata]);
	}

	// обработчик http://muzei-mira/goroda/{параметр}
	public function acSubGoroda ($subgorod) {
		// формируем данные для представления по переданному параметру
		// выполняем запрос к базе данных установленной по умолчанию
		$data = DB::table("posts")->where("name", "=", $subgorod)->first();
		// по идентификатору главной получим прикрепленные записи 
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		// отдадим полученные данные в представление
		return view ("goroda")->with(["data" => $data,  "attachdata" => $attachdata]);
	}	
	

	public function acNeobychnyeMuzei () {
		// формируем данные для представления neobychnye-muzei.blade.php
		// выполняем запрос к базе данных `neobychnye-muzei-mira`
		$data = DB::connection("stud20_student_2")->table("posts")->where("name", "=", "neobychnye-muzei-mira")->first();
		// по идентификатору главной получим прикрепленные записи 
		$attachdata = DB::connection("stud20_student_2")->table("posts")->where("parent", "=", $data->id)->get(); 
		// отдадим полученные данные в представление
		return view ("neobychnye-muzei-mira")->with(["data" => $data,  "attachdata" => $attachdata]);	}
	
	           public function acNewFile($pages) {
		// формируем данные для представления custom.blade.php
		// выполняем запрос к базе данных установленной по умолчанию
		$data = DB::table("posts")->where("name", "=", $pages)->first();
                $menu_data = DB::table("posts")->get();
		
		// по идентификатору главной получим прикрепленные записи 
		$attachdata = DB::table("posts")->where("parent", "=", $data->id)->get(); 
		// отдадим полученные данные в представление
		
		return view("newfile")->with(["menu_data" => $menu_data, "data" => $data, "attachdata" => $attachdata]);
	}
	
}