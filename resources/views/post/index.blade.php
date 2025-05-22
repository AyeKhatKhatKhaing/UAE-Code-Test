@extends('layouts.master')
@section('title',  "Posts")
@section('breadcrumb',  "Posts")
@section('breadcrumb-info',  "Posts")
@section('post-active', 'active')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            Post
                        </h3>
                        <div class="card-toolbar">
                            <a href="{{ url('/posts/create') }}" class="btn btn-primary " >
                                <i class="bi bi-plus-lg"></i> Add New
                            </a>
                        </div>
                    </div>
                    <form method="get" action="{{ url('/posts') }}" id="post-form" class="filter-clear-form">
                        <div class="card-header border-0">
                            <div class="card-title filter-style">
                                <div class="filter-section d-flex align-items-center position-relative my-1 me-3">
                                    <div class="input-group input-group">
                                        <input type="text" id="search" class="search-box form-control form-control-solid" aria-label="Sizing example input" name="search"
                                            placeholder="Search ..." aria-describedby="inputGroup-sizing-sm"
                                            @isset(request()->search) value="{{ request()->search }}" @endisset style="background-color: #F3F6F9;">
                                            @if(request()->search)<i class="bi bi-x" onclick="clearSearch()" style="position: absolute; top: 11px; right: 70px; font-size: 22px"></i>@endif
                                        <button class="btn btn-sm btn-secondary input-group-text" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered fs-6 gy-5 dataTable no-footer">
                                <thead>
                                    <tr class="text-start text-gray-600 fw-boldest fs-7 text-uppercase gs-0">
                                        <th class="w-50px" style="padding-left: 10px;">#</th>
                                        <th class="min-w-250px">Title</th>
                                        <th class="min-w-150px">Content</th>
                                        <th class="min-w-100px">Media</th>
                                        <th class="min-w-150px">Created At</th>
                                        <th class="min-w-150px">Updated At</th>
                                        <th class="sticky text-center min-w-150px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                    @foreach($data as $item)
                                        <tr>
                                            <td style="padding-left: 10px;">{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $item?->title ?? '' }}
                                            </td>
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
                                            <td>
                                                {{ $item?->updated_at ?? '' }}
                                            </td>
                                            <td class="sticky text-center">
                                                <a href="{{ route('posts.edit', $item)}}" title="Edit Post">
                                                    <button class="btn btn-icon btn-active-light-primary btn btn-primary w-30px h-30px"><i class="bi bi-pencil-square" aria-hidden="true"></i></button></a>
                                                <form method="POST" action="{{ route('posts.destroy', $item)  }}" class="deleteForm" style="display: inline;">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-icon btn-active-light-danger btn btn-danger w-30px h-30px show_confirm_delete" title='Delete'><i class="bi bi-trash" aria-hidden="true"></i></button>

                                                </form>
                                                <a href="{{ route('comments.index', $item) }}" title="Comments">
                                                    <button class="btn btn-icon btn-active-light-primary btn btn-success w-30px h-30px"><i class="bi bi-card-list" aria-hidden="true"></i></button></a>
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
