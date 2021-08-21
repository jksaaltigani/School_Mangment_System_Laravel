@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('layout.users') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('layout.add users') }}</span>
            </div>
        </div>

    </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form"> {{ __('layout.add new user') }} </h4>
                    <div class="heading-elements">
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form class="form" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-home"></i>
                                    {{ __('layout.user data') }} </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> الاسم </label>
                                            <input type="text" value="{{ old('name') }}" id="name" class="form-control"
                                                placeholder="  " name="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> لوجو التجار </label>
                                            <br>
                                            <label id="" class="file center-block">
                                                <input type="file" id="file" value="{{ old('logo') }}" name="logo"
                                                    class='form-control'>
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="projectinput1"> رقم الهاتف </label>
                                            <input type="text" id="mobile" class="form-control" placeholder="  "
                                                value='{{ old('mobile') }}' name="mobile">

                                            @error('mobile')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="projectinput1"> ألبريد الالكتروني </label>
                                            <input type="text" id="email" class="form-control" placeholder="  "
                                                value='{{ old('email') }}' name="email">

                                            @error('email')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="class col-6">
                                        <div class="form-group">
                                            <label for="projectinput1">كلمة المرور </label>
                                            <input type="password" id="password" class="form-control" placeholder="  "
                                                value='{{ old('password') }}' name="password">
                                            @error('password')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="class col-6">
                                        <div class="form-group">
                                            <label for="projectinput1">الصلاحيات </label>
                                            <div>
                                                <select class="form-control" name='permission_id'>
                                                    @foreach ($Permissions as $permission)
                                                        <option value={{ $permission->id }}>
                                                            {{ $permission->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('password')
                                                <span class="text-danger"> {{ $message }}</span>
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
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
