@extends('layouts.main')
@section('content')

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Posts</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('posts/create')}}" class="btn btn-success">Add</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>Image</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach($posts as $post)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$post['title']}}</td>
                        <td><a href="{{url('posts/'.$post['id'].'/edit')}}" class="btn btn-primary">Edit</a></td>
                        <td><img src="{{url('storage/'.$post['image'])}}" height="200" width="200" /></td>
                        <td>
                            <form method="POST" action="{{url('posts/'.$post['id'])}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure ?')" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection