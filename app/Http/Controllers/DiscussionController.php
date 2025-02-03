<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\DiscussionDetail;
use App\Utils\PeduliDonasiConstants;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $discussions = Discussion::with(['user', 'discussionDetail'])
            ->orderByDesc('created_at')
            ->get();

        return view('forum', [
            'discussions' => $discussions
        ]);
    }

    public function show(Request $request)
    {
        $discussion = Discussion::with(['user', 'discussionDetail', 'discussionDetail.user'])->find($request->get('id'));

        if($discussion === null) abort(404);

        return view('forumDetail', [
            'discussion' => $discussion
        ]);
    }

    public function store(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::FORUM_INPUT_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'discussion_text' => ['required', 'string', 'max:255']
            ]);
            $validatedData['user_id'] = $request->user()->id;

            try {
                $discussion = Discussion::create($validatedData);
                if($discussion) {
                    $retSuccess = true;
                    $retMessage = PeduliDonasiConstants::FORUM_INPUT_BERHASIL;
                }
            } catch (\Exception $e) {
                $retMessage = PeduliDonasiConstants::FORUM_INPUT_GAGAL_INSERT;
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function storeDetail(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::FORUM_DETAIL_INPUT_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'discussion_id' => ['required'],
                'discussion_text' => ['required', 'string', 'max:255']
            ]);
            $validatedData['user_id'] = $request->user()->id;

            try {
                $discussionDetail = DiscussionDetail::create($validatedData);
                if($discussionDetail) {
                    $retSuccess = true;
                    $retMessage = PeduliDonasiConstants::FORUM_DETAIL_INPUT_BERHASIL;
                }
            } catch (\Exception $e) {
                $retMessage = PeduliDonasiConstants::FORUM_DETAIL_INPUT_GAGAL_INSERT;
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }
}
