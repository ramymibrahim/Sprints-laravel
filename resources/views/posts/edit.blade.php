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
                        <h4>Edit Post</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('posts/'.$post['id'])}}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{$post['id']}}" />
                <input class="form-control" name="title" placeholder="Title" value="{{old('title',$post['title'])}}">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Content">{{old('content',$post['content'])}}</textarea>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input class="form-control" name="publish_date" type="date" value="{{old('publish_date',date('Y-m-d',strtotime($post['publish_date'])))}}">
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                    <option {{old('category_id',$post['category_id'])==$category['id']?'selected':''}} value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
                <button class="btn btn-success">Save</button>
                <a class="btn btn-danger" href="{{url('posts')}}">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection