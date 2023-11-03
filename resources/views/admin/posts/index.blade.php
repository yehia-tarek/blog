@extends('layouts.master')
@section('title')
    {{trans('pages.all posts')}}
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('pages.Posts')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('pages.all posts')}}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">

                    <div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">{{trans('pages.all posts')}}</h4>

									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
                                @can('post-create')
                                <a href="{{route('posts.create')}}"><button class="btn btn-sm ripple btn-primary"><i class="typcn typcn-document-add"></i></button></a>
                                @endcan
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap table-hover" id="example1">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">{{trans('pages.title')}}</th>
												<th scope="col">{{trans('pages.summary')}}</th>
												{{-- <th scope="col">Body</th> --}}
												<th scope="col">{{trans('pages.image')}}</th>
												<th scope="col">{{trans('pages.categories')}}</th>
												<th scope="col">{{trans('pages.tags')}}</th>
												<th scope="col">{{trans('pages.author')}}</th>
												<th scope="col">{{trans('pages.action')}}</th>
											</tr>
										</thead>
										<tbody>
                                            @php
                                                $i = 1;
                                            @endphp
											@foreach ($posts as $post)
                                            <tr>
												<td scope="row">{{$i++}}</td>
												<td scope="row">{{$post->title}}</td>
												<td scope="row">{{$post->summary}}</td>
												{{-- <td scope="row">{!! html_entity_decode($post->body) !!}</td> --}}
												<td scope="row"><img src="/images/{{$post->image}}" alt="" width="100px" height="100px"></td>
												<td scope="row">
                                                    @foreach ($post->categories as $category)
                                                        {{ $category->name }}<br>
                                                    @endforeach
                                                </td>
												<td scope="row">
                                                    @foreach ($post->tags as $tag)
                                                        {{ $tag->name }}<br>
                                                    @endforeach
                                                </td>
												<td scope="row">{{$post->author}}</td>
                                                <td scope="row">
                                                    @can('post-edit')
                                                    <form method="get" action="{{ route('posts.edit', ['id' => $post->id]) }}" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary btn-sm mb-3 mr-1 " ><i class="las la-edit"></i></button>
                                                    </form>
                                                    @endcan
                                                    @can('post-delete')
                                                    <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm mb-3 mr-1 " ><i class="mdi mdi-delete mdi-36px"></i></button>
                                                    </form>
                                                    @endcan
                                                </td>
											</tr>
                                            @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
