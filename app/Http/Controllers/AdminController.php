<?php

namespace App\Http\Controllers;

use App\Models\ApprovalYayasan;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome(Request $request)
    {
        return view('adminHome');
    }

    public function adminArticleHome(Request $request)
    {
        return view('adminArtikelList');
    }

    public function adminArticleNew(Request $request)
    {
        return view('adminArtikelNew');
    }

    public function adminArticleDetail(Request $request)
    {
        $id = $request->id;
        $article = Article::find($id);
        if($article === null) abort(404);

        return view('adminArtikelDetail', [
            'article' => $article
        ]);
    }

    public function indexYayasan(Request $request)
    {
        if($request->ajax()) {
            $approvalYayasan = ApprovalYayasan::with(['user'])->filter($request->only(['status']))->get();
            $data = [];
            foreach($approvalYayasan as $obj) {
                array_push($data, array(
                    'id' => $obj->id,
                    'user_name' => $obj->user->name,
                    'yayasan_name' => $obj->name,
                    'kota' => $obj->city,
                    'alamat' => $obj->address
                ));
            }

            return response()->json([
                'data' => $data
            ]);
        }

        return abort(404);
    }

    public function indexArticle(Request $request)
    {
        if($request->ajax()) {
            $article = Article::get();
            $data = [];
            foreach($article as $obj) {
                array_push($data, array(
                    'id' => $obj->id,
                    'title' => $obj->title,
                    'description' => $obj->description,
                    'created_at' => $obj->created_at
                ));
            }

            return response()->json([
                'data' => $data
            ]);
        }

        return abort(404);
    }

    public function storeArikel(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'image' => ['required', 'mimetypes:image/jpeg,image/png', 'max:4096'],
        ]);

        $validatedData['user_id'] = $request->user()->id;
        $validatedData['image'] = $request->file('image')->store('images/article');

        Article::create($validatedData);
        return redirect()->route('adminArticleHome');
    }
}
