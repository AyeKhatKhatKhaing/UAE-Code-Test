@extends('layouts.master')
@section('title', 'Comments')
@section('breadcrumb', 'Comments')
@section('breadcrumb-info', 'Comments')
@section('post-active', 'active')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div>
                <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @include('comment.form', ['formMode' => 'create'])
                </form>

            </div>
        </div>
    </div>
@endsection

