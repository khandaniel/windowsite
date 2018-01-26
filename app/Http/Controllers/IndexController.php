<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\CallbackNotification;
use App\Work;
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

    public function getArticleBySlug($slug)
    {
        return Article::where('slug', $slug)->first();
    }

    public function getWorkById($id) {
        return Work::where('id', $id)->first();
    }

    public function getFooterLinks()
    {
        return Article::orderBy('clicks', 'DESC')->simplePaginate(4);
    }

    private function prepareDataArray($type = null, $slug = null, $additionals = null)
    {
        $array = [
            'about' => $this->getPageBySlug('about'),
            'footerlinks' => $this->getFooterLinks(),
            'title' => 'Окна в Харькове'
        ];
        if ($type == 'index') {
            $array['main'] = $this->getPageBySlug('main');
            $array['title'] = $array['main']['title'] . ' :: ' . $array['title'];
        }
        if($type == 'about') {
            $array['important'] = $this->getPageBySlug('important');
            $array['title'] = $array['about']['title'] . ' :: ' . $array['title'];
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
        } elseif ($type == 'contact') {
            $array['contact'] = $this->getPageBySlug('contact');
            $array['title'] = $array['contact']['title'] . ' :: ' . $array['title'];
            $array['success'] = ($additionals == 'success') ? true : false;
        } elseif ($type == 'works') {
            $array['works'] = Work::get();
            $array['works_desc'] = $this->getPageBySlug('portfolio');
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
}
