@extends('layouts.master')
@section('title',  "Comments")
@section('breadcrumb',  "Comments")
@section('breadcrumb-info',  "Comments")
@section('comment-active', 'active')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-12">
                    <div class="row mx-1">
                        @if ($errors->any())
                            <x-errors :errors="$errors" />
                        @endif
                    </div>
                    <form action="{{ route('comments.store',$post) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @include('comment.form', ['formMode' => 'create'])
                    </form>
                </div>
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-bordered fs-6 gy-5 dataTable no-footer">
                                        <thead>
                                            <tr class="text-start text-gray-600 fw-boldest fs-7 text-uppercase gs-0">
                                                <th class="w-50px" style="padding-left: 10px;">#</th>
                                                <th class="min-w-150px">Content</th>
                                                <th class="min-w-100px">Media</th>
                                                <th class="min-w-150px">Created At</th>
                                                <th class="sticky text-center min-w-150px">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-bold text-gray-600">
                                            @foreach($data as $item)
                                                <tr>
                                                    <td style="padding-left: 10px;">{{ $loop->iteration }}</td>
                                                    <td>
                                                        {!! $item?->content ?? '' !!}
                                                    </td>
                                                    
                                                    <td>
                                                        @if ($item?->media?->url && $item?->media?->type == 'image')
                                                            <img src="{{ asset($item?->media?->url ?? '') }}" alt="" width="100" height="100">
                                                        @elseif ($item?->media?->url && $item?->media?->type == 'video')
                                                            <video width="150" height="150" controls>
                                                                <source src="{{ asset($item?->media?->url ?? '') }}" type="video/mp4">
                                                            </video>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $item?->created_at ?? '' }}
                                                    </td>
                                                    <td class="sticky text-center">
                                                        <form method="POST" action="{{ route('comments.destroy', $item) }}" class="deleteForm" style="display: inline;">
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                            <button type="submit" class="btn btn-icon btn-active-light-danger btn btn-danger w-30px h-30px show_confirm_delete" title='Delete'><i class="bi bi-trash" aria-hidden="true"></i></button>
        
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row my-3">
                                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                        <span class='text-gray-600 fw-bold'> Displaying items from {{ $data->currentPage() }} to {{ $data->perPage() }} of total {{ $data->total() }} items</span>
                                    </div>
                                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                        <div class="pagination-wrapper"> {!! $data->appends([
                                            'search'  => Request::get('search'),
                                            'page'    => Request::get('page'),
                                            'display' => Request::get('display'),
                                        ])->links('pagination::bootstrap-4')->render() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            
            $('#display').on('change', function () {
                $('#blog-form').submit();
            })
        })
    </script>
@endpush
