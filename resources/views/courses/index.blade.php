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
<style type="text/css">
.dataTables_filter {
    display: none;
}
select[name="DataTables_Table_0_length"] {
    background-color:#f8f9fa;
    display: block;
    width: 100%;
    height: calc(1.6em + 1rem + 2px);
    padding: 0.5rem 0.75rem;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #495057;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
<div class="card">
    <div class="card-body">
        <div class="row my-3 flex-md-row flex-column-reverse">
            <div class="col-md-4 mt-md-0 mt-2">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control input-solid" name="search" placeholder="@lang('Search for courses...')" id="searchbox">
                    <span class="input-group-append">
                        <button class="btn btn-light" type="submit" id="search-courses-btn">
                            <i class="fas fa-search text-muted"></i>
                        </button>
                    </span>
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="{{ route('manage_courses.create') }}" class="btn btn-primary btn-rounded float-right">
                    <i class="fas fa-plus mr-2"></i>
                    @lang('courses.table.add_course')
                </a>
            </div>
        </div>
       <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless course-table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10%;">id</th>
                        <th style="width: 10%;">@lang('courses.table.image')</th>
                        <th style="width: 70%;">@lang('courses.table.title')</th>
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
    var table;
    table = $('.course-table').DataTable({
        processing: true,
        serverSide: true,
        "language": {
            processing: "<div class=spinner-border role=status><span class=sr-only>Loading...</span></div>"
        },
        ajax: "{{ route('manage_courses.index') }}",
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'image',
                name: 'image',
                orderable: false,
            },
            {
                data: 'title',
                name: 'title',
                className: "text-center"
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
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false,
                "width": '10%'
            },
            {
                "targets": [1],
                "width": '10%'
            },
            {
                "targets": [2],
                "width": '70%'
            },
            {
                "targets": [3],
                "width": '10%'
            }
        ]
    });
    jQuery(document).ready(function($) {
        $('body').on('click', '#search-courses-btn', function(event) {
            event.preventDefault();
            table.search($("#searchbox").val()).draw();
        });
    }); 
</script>
@stop