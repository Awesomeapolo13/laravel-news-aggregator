<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use App\Models\News;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsList =News::select('id', 'title');
        $downloads = Download::select('id', 'name', 'phone', 'email', 'info', 'created_at')
            ->with('news')
            ->paginate(7);

//       $downloads = \DB::table('downloads')
//            ->leftjoin('news', 'news.id', '=', 'downloads.news_id')
//            ->select('downloads.id', 'downloads.name', 'downloads.phone', 'downloads.email', 'downloads.info', 'downloads.created_at', 'news.id as newsId', 'news.title as newsTitle')
//            ->get();

//        dd($downloads);

        return view('admin.news.download.index', ['downloads' => $downloads, 'newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.download.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'info' => 'required',
        ])) {
            foreach ($_POST as $key => $field) {
                file_put_contents(base_path() . '/storage/logs/download_log.txt', "$key: $field \r\n", FILE_APPEND);
            }
            return redirect()->route('admin.download.create', ['success' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
