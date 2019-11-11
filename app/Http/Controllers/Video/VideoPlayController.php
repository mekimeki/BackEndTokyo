<?php

namespace App\Http\Controllers\Video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Video;
use App\Http\Controllers\Word\VideoWordController;
use App\Http\Controllers\Voca\VocabularyController;
use App\Http\Controllers\Subtitle\SubtitleController;


class VideoPlayController extends Controller
{
  //
  public function addressInfo($video_pk)
  {
    \Log::debug("addressInfo in VideoPlayController");
    $video = Video::find($video_pk);
    return response()->json([
      'video' => asset('storage/video/' . $video_pk . '.mp4'),
    ]);
  }

  public function contentInfo($video_pk)
  {
    $video_pk = 1;
    $voca = new VocabularyController;
    $voca = $voca->loadVoca($video_pk);
    $word = new VideoWordController;
    $word = $word->loadWord($video_pk);
    return response()->json([
      'voca' => $voca,
      'word' => $word
    ]);
  }

  public function explain($video_pk)
  {
    $video = Video::find(1);
    return response()->json([
      'title' => $video->v_tt,
      'explain' => $video->explain,
    ]);
  }
}
