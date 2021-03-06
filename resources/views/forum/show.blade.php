@extends('layouts/basic')

@section('forumCss')
  <link rel="stylesheet" href="{{ config('app.fe') }}/zeze/v/{{ env('cssversion') }}/css/quanzi-debug.css">
@endsection

@section('contents')
<div class="qz-index-wrap">
  @include('forum/banner')
  <div class="qz-index-main content-grid">
    <div class="zhuti-list-box grid-7" id="J-tiezi-list">

      @include('forum/_show_typeBar')

      @foreach($threadList as $k => $thread)
        <div class="list-top-area">
          <div class="list-list">
            <div class="return-card">
              <span class="ie6transbg">433</span>
            </div>
            <div class="list-list-l">
              <h3>
                <a target="_blank" href="{{ action('ThreadController@show', ['tid' => $thread->tid, 'page' => 1]) }}">{{ $thread->subject }}</a>
              </h3>
              <div class="list-img-box">
                <ul class="list-img J-list-img">
                  @foreach($thread->thumb as $kk => $img)
                    <li><a class="mutual" href="thread-{{ $thread->tid }}-1-1.html" target="_blank"><img data-src="http://i.zeze.com/attachment/image/{{ $img->attachment }}" data-big="http://i.zeze.com/attachment/image/{{ $img->attachment }}" class="" src="http://i.zeze.com/attachment/image/{{ $img->attachment }}"></a><div class="shade"></div></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="list-list-r">
              <div class="list-list-rt">
                <div class="list-user">
                  <a href="{{ action('HispageController@index', ['uid' => $thread->authorid, 'page' => 1, 'typeid' => 0]) }}" title="{{ $thread->author }}">{{ $thread->author }}</a>
                </div>
                <div class="list-user-bottom">
                  <div class="list-user-lang">
                    <a href="{{ action('HispageController@index', ['uid' => $thread->authorid, 'page' => 1, 'typeid' => 0]) }}" target="_blank" title="{{ $thread->lastposter }}">{{ $thread->lastposter }}</a>
                  </div>
                  <div class="list-time-before">
                    <span title="{{ $thread->lastpostdate }}">{{ $thread->lastpostdate }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<div class="zeze-page page-left" id="fd_page_bottom">
  <div class="pg">
    {!! $threadList->render() !!}
  </div>
</div>
@endsection
