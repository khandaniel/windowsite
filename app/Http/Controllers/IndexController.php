<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\CallbackNotification;
use App\Work;
use Illuminate\Support\Str;
use Mail;
use App\Article;
use App\Callback;
use App\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', $this->prepareDataArray('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPageBySlug($slug)
    {
        return Page::where('slug', $slug)->first();
    }

    private function getCategoryId($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return $category->id;
    }

    public function getArticleBySlug($slug)
    {
        return Article::where('slug', $slug)->first();
    }

    public function getWorkById($id)
    {
        return Work::where('id', $id)->first();
    }

    public function getFooterLinks($number)
    {
        return Article::orderBy('clicks', 'DESC')->take($number)->get();
    }

    private function prepareDataArray($type = null, $slug = null, $additionals = null)
    {
        $array = [
            'about' => $this->getPageBySlug('about'),
            'footerlinks' => $this->getFooterLinks(4),
            'title' => 'Окна в Харькове',
            'description' => 'Окна в Харькове от компании Имя. Окна на века.',
            'keywords' => 'окна, Харьков, установка, замер, под ключ, отзывы'
        ];
        if ($type == 'index') {
            $array['main'] = $this->getPageBySlug('main');
            $array['title'] = $array['main']['title'] . ' :: ' . $array['title'];
            $array['important'] = $this->getPageBySlug('important');
            $array['footerArticles'] = $this->getFooterLinks(3);
            $array['description'] = $array['main']['meta_description'];
            $array['keywords'] = $array['main']['meta_keywords'];
        }
        if ($type == 'about') {
            $array['important'] = $this->getPageBySlug('important');
            $array['title'] = $array['about']['title'] . ' :: ' . $array['title'];
            $array['bestWorks'] = Work::orderBy('rate', 'ASC')->take(4)->get();
            $array['description'] = $array['about']['meta_description'];
            $array['keywords'] = $array['about']['meta_keywords'];
        }
        if ($type == 'article') {
            if ($slug) {
                $array['article'] = $this->getArticleBySlug($slug);
                $array['title'] = $array['article']['title'] . ' :: ' . $array['title'];
            } else {
                $array['categories'] = Category::get();
                $array['important'] = $this->getPageBySlug('important');
            }
            $array['articles_desc'] = $this->getPageBySlug('articles');
            $array['description'] = $array['articles_desc']['meta_description'];
            $array['keywords'] = $array['articles_desc']['meta_keywords'];
        } elseif ($type == 'category') {
            $array['articles'] = Article::where('category_id', $this->getCategoryId($slug))->get();
            $array['works'] = Work::where('category_id', $this->getCategoryId($slug))->get();
            $array['category_alias'] = Category::where('slug', $slug)->first()->alias;
            $array['title'] = 'Все в категории &laquo;' . Str::lower($array['category_alias']) . ' :: ' . $array['title'];
        } elseif ($type == 'contact') {
            $array['contact'] = $this->getPageBySlug('contact');
            $array['title'] = $array['contact']['title'] . ' :: ' . $array['title'];
            $array['success'] = ($additionals == 'success') ? true : false;
            $array['description'] = $array['contact']['meta_description'];
            $array['keywords'] = $array['contact']['meta_keywords'];
        } elseif ($type == 'works') {
            $array['works'] = Work::get();
            $array['works_desc'] = $this->getPageBySlug('portfolio');
            $array['description'] = $array['works_desc']['meta_description'];
            $array['keywords'] = $array['works_desc']['meta_keywords'];
            if ($slug) {
                $array['work'] = $this->getWorkById($slug);
            } else {
                $array['title'] = $array['works_desc']['title'] . ' :: ' . $array['title'];
            }
        }
        return $array;
    }

    public function contact($status = null)
    {
        if ($status) {
            $status = 'success';
        }
        return view('contact', $this->prepareDataArray('contact', null, $status));
    }

    public function about()
    {
        return view('about', $this->prepareDataArray('about'));
    }

    public function article($slug = null)
    {
        if ($slug) {
            $this->articleClicksUpdate($slug);
            return view('article', $this->prepareDataArray('article', $slug));
        } else return view('articles', $this->prepareDataArray('article', $slug));
    }

    private function articleClicksUpdate($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $article->clicks++;
        $article->save();
    }

    public function addCallback(Request $data)
    {
        $data->validate([
            'name' => 'required|min:2|max:60',
            'number' => 'required_without_all:email|max:15',
            'email' => 'nullable|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/|required_without_all:number',
            'message' => 'max:1000'
        ]);
        $callback = new Callback();
        $callback->name = $data->input('name');
        $callback->phone_number = $data->input('number');
        $callback->email = $data->input('email');
        $callback->message = $data->input('message');
        $callback->processed = 'NO';
        $callback->textorcall = $data->input('textorcall');
        $callback->save();
        Mail::to('samir.khan.w@gmail.com')->send(new CallbackNotification($callback));
        return redirect(route('contact', ['success']));
    }

    public function processCallback($id)
    {
        $callback = Callback::where('id', $id)->first();
        $callback->processed = "YES";
        $callback->save();
        return redirect(route('voyager.callbacks.index'));
    }

    public function portfolio($id = null)
    {
        if ($id) {
            Work::where('id', $id)->first();
            return view('partials.work', $this->prepareDataArray('works', $id));
        } else {
            return view('works', $this->prepareDataArray('works'));
        }
    }

    public function category($slug)
    {
        return view('category', $this->prepareDataArray('category', $slug));
    }
}
