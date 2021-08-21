@extends('layouts.master')
@section('title', __('layout.name_of_website') . ' | ' . __('layout.add artical'))
@section('css')
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

@endsection
@section('page-header')

    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('layout.dashboard') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('layout.posts') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" method="POST" action="{{ route('articals.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>
                                                {{ __('layout.artical info') }} </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">
                                                            {{ __('layout.artical head') }} </label>
                                                        <input type="text" value="{{ old('name') }}" id="name"
                                                            class="form-control" placeholder="  " name="name">
                                                        @error('categpry.name')
                                                            <span class="text-danger"> {{ __('layout.req') }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">
                                                            {{ __('layout.description') }} </label>
                                                        <input type="text" value="{{ old('description') }}"
                                                            class="form-control" placeholder="" name="description">
                                                        @error('categpry.description')
                                                            <span class="text-danger"> {{ __('layout.req') }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">
                                                            {{ __('layout.desc word') }} </label>
                                                        <input type="text" value="{{ old('tag') }}" class="form-control"
                                                            placeholder="" name="tag">
                                                        @error('tag')
                                                            <span class="text-danger">{{ __('layout.req') }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">
                                                            {{ __('layout.short desc') }} </label>
                                                        <input type="text" value="{{ old('short_des') }}"
                                                            class="form-control" placeholder="  " name="short_des">
                                                        @error('short_desc')
                                                            <span class="text-danger">{{ __('layout.req') }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2"> أختر القسم </label>
                                                        <select name="category_id" class="select2 form-control">
                                                            <optgroup label="من فضلك أختر القسم ">
                                                                @if ($categories && $categories->count() > 0)
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger"> {{ __('layout.req') }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">
                                                        {{ __('layout.artical') }} </label>
                                                    <textarea name="content" id="content" class='form-control' cols="30"
                                                        rows="10" placeholder="type content ..">
                                                                                                                                                    {{ old('content') }}
                                                                                                                                                    </textarea>
                                                    @error('content')
                                                        <span class="text-danger">{{ __('layout.req') }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">
                                                        {{ __('layout.artical photo') }} </label>
                                                    <input type="file" class="dropify"
                                                        data-default-file="{{ URL::asset('assets/img/photos/1.jpg') }}"
                                                        data-height="200" placeholder=" {{ old('photo') }} "
                                                        name="photo">
                                                    @error('photo')
                                                        <span class="text-danger">{{ __('layout.req') }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> حفظ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- row closed -->

    <div class="modal" id="Delete model">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('layout.add category') }}</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.update', 1) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row p-3">
                            <input type="hidden" name='id' id='edit_id'>
                            <div class="form-group col-md-12">
                                <label>{{ __('layout.name') }}</label> <input class="form-control"
                                    placeholder="Enter your email" type="text" name='name' id='edit_name'>
                            </div>
                        </div>
                        <div class="m-3">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">{{ __('layout.edit category') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{ __('layout.cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>		
@endsection
