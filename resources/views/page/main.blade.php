@extends('layouts.layout-master')
@section('content')
        @foreach($pages as $page)
            <div id="content-{{$page->getIdentifier()}}" class="{{ $page->getIdentifier() === $current ? "" : "hidden" }}">
                <h2>{{$page->getTitle()}}</h2>
                <p>
                    {!! $page->getBody() !!}
                </p>
            </div>
        @endforeach
@endsection
