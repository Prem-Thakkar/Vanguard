@extends('layouts.app')

@section('page-title', __('courses.page_name'))
@section('page-heading', __('courses.page_name'))

@section('breadcrumbs')
<li class="breadcrumb-item active">
    @lang('courses.page_name')
</li>
@stop

@section('content')

@include('partials.messages')

<div class="row">
    <div class="float-right mb-2 col-md-12">
        <a href="{{ route('manage_courses.create') }}" class="btn btn-primary btn-rounded float-right">
            <i class="fas fa-plus mr-2"></i>
            @lang('courses.table.add_course')
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
       <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless course-table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10%;">id</th>
                        <th style="width: 30%;">@lang('courses.table.title')</th>
                        <th style="width: 50%;">@lang('courses.table.description')</th>
                        <th style="width: 10%;">@lang('courses.table.action')</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>



@stop

@section('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    var table = $('.course-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('manage_courses.index') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        "order": [
            [0, "desc"]
        ],
        "columnDefs": [{
            "targets": [0],
            "visible": false,
            "searchable": false
        }]
    });
    
</script>
@stop