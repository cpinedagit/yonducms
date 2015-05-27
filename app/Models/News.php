<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class News extends Model {
	protected $table = "content_news";
	protected $primaryKey = "news_id";

    public static function show_news($id)
    {
        $result = DB::table('content_news')
            ->leftJoin('content_media', 'content_media.media_id', '=', 'content_news.photo_id')
            ->select('content_news.*', 'content_media.media_path')
            ->where(array('content_news.news_id'=>$id))
            ->get();
            return $result;
    }
    public static function all_news()
    {
        $result = DB::table('content_news')
            ->leftJoin('content_media', 'content_media.media_id', '=', 'content_news.photo_id')
            ->select('content_news.*', 'content_media.media_path')
            ->get();
            return $result;
    }
}

