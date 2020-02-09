@extends('layouts.app')

@section('content')
    <div class="container pt-5">
    <div class="mb-4">
    <a href="{{ route('posts.create') }}" class="btn btn-success">
        忘れる前に書き込み
    </a>
</div>
        <div class="row">
        @foreach ($posts as $post)
        <div class="card border-success col-md-6 cpl-sm-12 bg-light mb-3 mr-2" style="max-width: 20rem;">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body text-success">
                    <div>
                        <p>お名前</p>
                    </div>
                    <span class="mr-2">
                        {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                    <button class="btn btn-primary text-white">詳細</button>
                    </a>
                    <form style="display: inline-block;" method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger text-white">✖️</button>
                    </form>
                </div>
        </div>
        @endforeach
        </div>
        <div class="d-flex justify-content-center mb-5">
    {{ $posts->links() }}
        </div>
    </div>
@endsection