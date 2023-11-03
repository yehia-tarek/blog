@extends('layouts.master')
@section('title')
    {{trans("pages.tags")}}
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
							<h4 class="content-title mb-0 my-auto">{{trans("pages.tags")}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans("pages.all tags")}}</span>
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
									<h4 class="card-title mg-b-0">{{trans("pages.all tags")}}</h4>
								</div>
                                <br>
                                @can('tag-create')
                                <a class="btn btn-sm ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href=""><i class="typcn typcn-document-add"></i></a>
                                @endcan
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap text-center" id="example1">
										<thead>
											<tr>
												<th class="">#</th>
												<th class="border-bottom-0">{{trans("pages.name")}}</th>
												<th class="border-bottom-0">{{trans("pages.action")}}</th>
											</tr>
										</thead>
										<tbody>
                                            @php
                                                $i = 1;
                                            @endphp
											@foreach ($tags as $tag)
                                            <tr>
												<td>{{$i++}}</td>
												<td>{{$tag->name}}</td>
                                                <td>
                                                    @can('tag-edit')
                                                    <a href="#"
                                                        data-toggle="modal"
                                                        data-target="#category_item_edit_modal"
                                                        class="btn btn-primary btn-sm mb-3 mr-1 category_edit_btn"
                                                        data-bs-placement="top"
                                                        title="{{__('Edit')}}"
                                                        data-id="{{$tag->id}}"
                                                        data-action="{{ route('tag.update',['id' => $tag->id]) }}"
                                                        data-name="{{$tag->getTranslation('name', 'ar')}}"
                                                        data-name_en="{{$tag->getTranslation('name', 'en')}}"
                                                    >
                                                            <i class="las la-edit"></i>
                                                    </a>
                                                    @endcan
                                                    @can('category-delete')
                                                    <form method="POST" action="{{ route('tag.destroy', ['id' => $tag->id]) }}" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm mb-3 mr-1 " ><i class="mdi mdi-delete mdi-36px"></i></button>
                                                    </form>
                                                    @endcan
                                                </td>
											</tr>
                                            @endforeach
										</tbody>
									</table>
                                    <!-- ADD modal -->
                                    <div class="modal" id="modaldemo1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">{{trans("pages.add new tag")}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                        <form action="{{ route('tag.store') }}" method="post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class=" p-4">
                                                                        <div class="form-group">
                                                                            <div class="main-content-label mg-b-5">
                                                                                {{trans("pages.name_ar")}}
                                                                            </div>
                                                                            <input class="form-control" name="name" placeholder="Enter Name"  type="text">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="main-content-label mg-b-5">
                                                                                {{trans("pages.name_en")}}
                                                                            </div>
                                                                            <input class="form-control" name="name_en" placeholder="Enter Name"  type="text">
                                                                        </div>
                                                                        <button class="btn btn-primary-gradient btn-block">{{trans("pages.create")}}</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- End ADD modal -->
                                    {{-- modal('category-edit') --}}
                                    <div class="modal fade" id="category_item_edit_modal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">{{trans("pages.edit tag")}}</h5>
                                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="#" id="category_edit_modal_form" method="post">

                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="hidden" name="id" class="id" value="">
                                                        <div class="form-group">
                                                            <div class="main-content-label mg-b-5">
                                                                {{trans("pages.name_ar")}}
                                                            </div>
                                                            <input class="name form-control" name="name" placeholder="Enter Name"  type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="main-content-label mg-b-5">
                                                                {{trans("pages.name_en")}}
                                                            </div>
                                                            <input class="form-control name_en" name="name_en" placeholder="Enter Name"  type="text">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('pages.close')}}</button>
                                                        <button type="submit" class="btn btn-primary">{{trans("pages.Update")}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal --}}
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
<script>
    $(document).ready(function($){
            "use strict";

            $(document).on('click', '.category_edit_btn', function () {
                var el = $(this);
                var id = el.data('id');
                var name = el.data('name');
                var name_en = el.data('name_en');
                var action = el.data('action');
                console.log(name , action , name_en);

                var form = $('#category_edit_modal_form');
                form.attr('action', action);
                form.find('.id').val(id);
                form.find('.name').val(name);
                form.find('.name_en').val(name_en);
            });

        });
</script>
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
{{-- <script src="{{URL::asset('assets/js/modal.js')}}"></script> --}}
@endsection
