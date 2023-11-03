@extends('layouts.master')
@section('title')
    {{trans("pages.add new post")}}
@endsection
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Quill css -->
<link href="{{URL::asset('assets/plugins/quill/quill.snow.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/quill/quill.bubble.css')}}" rel="stylesheet">
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!---Internal Fancy uploader css-->
<link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
<style>
    .ar, .en {
        display: none;
    }
</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans("pages.Posts")}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans("pages.add new post")}}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">

                        <div class="col-lg-12 col-md-12 ">
                            {{-- <div class="d-flex my-xl-auto pg- right-content">
                                <a href="{{route('posts.index')}}"> <button class="btn btn-info btn-block">back</button></a>
                             </div> --}}
                            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">

                                    <div class="main-content-label mg-b-5">
                                        <h1>{{trans("pages.add new post")}}</h1>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="bg-gray-200 p-4">

                                                <div class="ar_button form-control btn btn-info text-left">{{trans("pages.add content in arabic")}} <span class="mdi mdi-arrow-down-drop-circle mdi-36px"></span></div><br>
                                                <div class="ar">
                                                    <div class="form-group">
                                                        <div class="main-content-label mg-b-5">
                                                            {{trans("pages.title_ar")}}
                                                        </div>
                                                        <input class="form-control" name="title" placeholder="Enter Title"  type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="main-content-label mg-b-5">
                                                            {{trans("pages.summary_ar")}}
                                                        </div>
                                                        <textarea class="form-control" name="summary"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="main-content-label mg-b-5">
                                                            {{trans("pages.body_ar")}}
                                                        </div>
                                                        <textarea id="editor" name="body"></textarea>
                                                    </div>
                                                </div>

                                                <div class="en_button form-control btn btn-info text-left">{{trans("pages.add content in english")}} <span class="mdi mdi-arrow-down-drop-circle mdi-36px"></span></div><br>
                                                <div class="en">
                                                    <div class="form-group">
                                                        <div class="main-content-label mg-b-5">
                                                            {{trans("pages.title_en")}}
                                                        </div>
                                                        <input class="form-control" name="title_en" placeholder="Enter Title"  type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="main-content-label mg-b-5">
                                                            {{trans("pages.summary_en")}}
                                                        </div>
                                                        <textarea class="form-control" name="summary_en"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="main-content-label mg-b-5">
                                                            {{trans("pages.body_en")}}
                                                        </div>
                                                        <textarea id="editor" name="body_en"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="main-content-label mg-b-5">
                                                        {{trans("pages.categories")}}
                                                    </div>
                                                    <select class="form-control" name="category_id[]" multiple>
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="main-content-label mg-b-5">
                                                        {{trans("pages.tags")}}
                                                    </div>
                                                    <select class="form-control"  name="tag_id[]" multiple>
                                                        @foreach ($tags as $tag)
                                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <div class="main-content-label mg-b-5">
                                                        {{trans("pages.image of post")}}
                                                    </div>
                                                    <input type="file" class="form-control" name="image"/>
                                                </div>
                                                <br>
                                                <div class="row row-xs wd-xl-80p">
                                                    <div class="col-sm-6 col-md-3">
                                                        <button class="btn btn-primary-gradient btn-block">{{trans("pages.create")}}</button>
                                                    </div>
                                                </div>
                                                {{-- <button class="btn btn-main-primary pd-x-20"></button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    {{-- <script type="text/javascript" src='https://cdn.tiny.cloud/1/zgksdkfku2xzbs381p5z1aipjab7m0fb8w1v8fkkxaw4z1lq/tinymce/6/tinymce.min.js'></script> --}}
    <script src="{{URL::asset('assets/js/tinymce.min.js')}}"></script>
    <script>
    tinymce.init({
        selector: "#editor"
    });
    </script>
    <!--Internal  Select2 js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal quill js -->
    <script src="{{URL::asset('assets/plugins/quill/quill.min.js')}}"></script>
    <!-- Internal Form-editor js -->
    <script src="{{URL::asset('assets/js/form-editor.js')}}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <!-- Form-layouts js -->
    <script src="{{URL::asset('assets/js/form-layouts.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".ar_button").click(function(){
                $(".ar").toggle();
            });
            $(".en_button").click(function(){
                $(".en").toggle();
            });


            $('#multiple-checkboxes').select2();
        });
    </script>
@endsection
