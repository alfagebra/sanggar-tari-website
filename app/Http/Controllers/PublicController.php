<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Schedule;
use App\Models\Profile;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $articles = Article::latest()->take(3)->get();
        $galleries = Gallery::latest()->take(6)->get();
        return view('public.index', compact('profile', 'articles', 'galleries'));
    }

    public function profile()
    {
        $profile = Profile::first();
        return view('public.profile', compact('profile'));
    }

    public function articles()
    {
        $articles = Article::latest()->paginate(6);
        return view('public.articles.index', compact('articles'));
    }

    public function articleDetail($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $recentArticles = Article::where('id', '!=', $article->id)->latest()->take(3)->get();
        return view('public.articles.show', compact('article', 'recentArticles'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('public.gallery', compact('galleries'));
    }

    public function schedule()
    {
        $schedules = Schedule::orderBy('day')->get();
        $profile = Profile::first();
        return view('public.schedule', compact('schedules', 'profile'));
    }
}
