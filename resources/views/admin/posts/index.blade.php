@extends('layouts.admin')

@section('content')
    <h1 class="page-header">Posts Dashboard!</h1>

      <table class="table table-striped">
          <thead>
            <tr>
                <th>#ID</th>
                <th>Photo</th>
                <th>title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
          </thead>
          <tbody>
          @if(!$posts)
              <h4>There are no Posts!</h4>
          @endif
          @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}"><img height="50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></a></td>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'No category'}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
          @endforeach

          </tbody>
        </table>


@endsection