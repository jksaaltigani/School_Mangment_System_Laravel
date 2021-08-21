@extends('layouts.master')
@section('title', __('layout.name_of_website') . ' | ' . __('layout.users'))
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title"> الاقسام الرئيسية </h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item active"> {{ __('layout.users') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- DOM - jQuery events table -->
        <section id="dom">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{ __('layout.table users') }}</h4>
                                <div>
                                    <a href="{{ route('user.create') }}" class="btn btn-outline-info">
                                        {{ __('layout.add users') }}
                                        <i class="mdi mdi-view-dashboard-outline"></i> </a>
                                </div>
                            </div>
                            <p class="tx-12 tx-gray-500 mb-2"> {{ __('layout.all data from users') }}</p>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                    <thead class="">
                                        <tr>
                                            <th>{{ __('layout.name') }}</th>
                                            <th>{{ __('layout.user photo') }}</th>
                                            <th>{{ __('layout.email') }}</th>
                                            <th> {{ __('layout.status') }} </th>
                                            <th>{{ __('layout.opration') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @isset($users)
                                            @foreach ($users as $user)
                                                @if ($user->id == auth()->user()->id)
                                                    @continue

                                                @endif
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        <img style="width: 150px; height: 100px;" src="{{ $user->logo }}">
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td> {{ __('layout.' . $user->getActive()) }}</td>
                                                    @if (auth()->user()->admin == 1)

                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                                <a href="{{ route('admin.users.delete', $user->id) }}"
                                                                    class="btn btn-outline-danger box-shadow-3 mr-1 mb-1">حذف</a>
                                                                <a href="{{ route('admin.users.status', $user->id) }}"
                                                                    class="btn btn-outline-warning box-shadow-3 mr-1 mb-1">

                                                                    @if ($user->active == 0)
                                                                        تفعيل
                                                                    @else
                                                                        الغاء تفعيل
                                                                    @endif
                                                                </a>


                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endisset


                                    </tbody>
                                </table>
                                <div class="justify-content-center d-flex">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    </div>
@endsection
