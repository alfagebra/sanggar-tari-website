<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Schedule;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    // ==========================================
    // OVERVIEW
    // ==========================================
    public function index()
    {
        $articlesCount = Article::count();
        $galleriesCount = Gallery::count();
        $schedulesCount = Schedule::count();
        $recentArticles = Article::latest()->take(5)->get();

        return view('admin.dashboard', compact('articlesCount', 'galleriesCount', 'schedulesCount', 'recentArticles'));
    }

    // ==========================================
    // PROFILE MANAGEMENT
    // ==========================================
    public function profileEdit()
    {
        $profile = Profile::firstOrCreate([], [
            'name' => 'GSBK Candi',
            'history' => 'Sejarah sanggar belum diisi.',
            'vision' => 'Visi belum diisi.',
            'mission' => 'Misi belum diisi.',
        ]);
        return view('admin.profile', compact('profile'));
    }

    public function profileUpdate(Request $request)
    {
        $profile = Profile::first();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'history' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'instagram' => 'nullable|string|max:100',
            'facebook' => 'nullable|string|max:100',
            'tiktok' => 'nullable|string|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($profile->logo_url) {
                Storage::disk(config('filesystems.default'))->delete($profile->logo_url);
            }
            $data['logo_url'] = $request->file('logo')->store('sanggar', config('filesystems.default'));
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil sanggar seni berhasil diperbarui.');
    }

    // ==========================================
    // ARTICLES CRUD
    // ==========================================
    public function articles()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function articleCreate()
    {
        return view('admin.articles.create');
    }

    public function articleStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . time();

        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('sanggar', config('filesystems.default'));
        }

        Article::create($data);

        return redirect()->route('admin.articles')->with('success', 'Artikel berhasil diterbitkan.');
    }

    public function articleEdit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function articleUpdate(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        // Only regenerate slug if title changes
        if ($article->title !== $data['title']) {
            $data['slug'] = Str::slug($data['title']) . '-' . time();
        }

        if ($request->hasFile('image')) {
            // Delete old image
            if ($article->image_url) {
                Storage::disk(config('filesystems.default'))->delete($article->image_url);
            }
            $data['image_url'] = $request->file('image')->store('sanggar', config('filesystems.default'));
        }

        $article->update($data);

        return redirect()->route('admin.articles')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function articleDestroy($id)
    {
        $article = Article::findOrFail($id);

        if ($article->image_url) {
            Storage::disk(config('filesystems.default'))->delete($article->image_url);
        }

        $article->delete();

        return redirect()->route('admin.articles')->with('success', 'Artikel berhasil dihapus.');
    }

    // ==========================================
    // GALLERY CRUD
    // ==========================================
    public function galleries()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function galleryCreate()
    {
        return view('admin.galleries.create');
    }

    public function galleryStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $data['image_url'] = $request->file('image')->store('sanggar', config('filesystems.default'));

        Gallery::create($data);

        return redirect()->route('admin.galleries')->with('success', 'Foto baru berhasil ditambahkan ke galeri.');
    }

    public function galleryDestroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image_url) {
            Storage::disk(config('filesystems.default'))->delete($gallery->image_url);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries')->with('success', 'Foto galeri berhasil dihapus.');
    }

    // ==========================================
    // SCHEDULES CRUD
    // ==========================================
    public function schedules()
    {
        $schedules = Schedule::orderBy('day')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function scheduleCreate()
    {
        return view('admin.schedules.create');
    }

    public function scheduleStore(Request $request)
    {
        $data = $request->validate([
            'class_name' => 'required|string|max:255',
            'day' => 'required|string|max:50',
            'time' => 'required|string|max:50',
            'instructor' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        Schedule::create($data);

        return redirect()->route('admin.schedules')->with('success', 'Jadwal latihan berhasil ditambahkan.');
    }

    public function scheduleEdit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedules.edit', compact('schedule'));
    }

    public function scheduleUpdate(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $data = $request->validate([
            'class_name' => 'required|string|max:255',
            'day' => 'required|string|max:50',
            'time' => 'required|string|max:50',
            'instructor' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        $schedule->update($data);

        return redirect()->route('admin.schedules')->with('success', 'Jadwal latihan berhasil diperbarui.');
    }

    public function scheduleDestroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('admin.schedules')->with('success', 'Jadwal latihan berhasil dihapus.');
    }
}
