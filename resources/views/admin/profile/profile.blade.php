@extends('layouts.master')
@section('title')
    {{trans("pages.add new post")}}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <form enctype="multipart/form-data" action="{{('/profile/update')}}">
                    <div class="form-group">
                        <label for="name">{{trans("pages.name")}}</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div>
                        <label for="">{{trans("pages.current image")}} :</label>
                        <img src="/images/{{$user->image}}" alt="" width="100px" height="100px"><br>
                    </div>
                    <div class="form-group">
                        <label for="image">{{trans("pages.image")}}</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">{{trans("pages.update")}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
