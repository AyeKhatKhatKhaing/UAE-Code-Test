@extends('layouts.master')
@section('title', "Comments")
@section('breadcrumb', "Comments")
@section('breadcrumb-info', "Comments")
@section('blog-active', 'active')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-admin.errors :errors="$errors" />
                    @endif
                </div>

                <form action="{{ route('comments.update',$post) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PATCH')
                    @include('comment.form', ['formMode' => 'edit'])
                </form>

            </div>
        </div>
    </div>
@endsection

