@extends('layouts.master')
@section('title', __('layout.name_of_website') . ' | ' . __('layout.permissions'))
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('layout.permissions') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('layout.add permissions') }}</span>
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
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('layout.table permissions') }}</h4>
                        <div>
                            <a href="#" class="btn btn-outline-info" data-target="#modaldemo1" data-toggle="modal">
                                {{ __('layout.new Roles') }}
                                <i class="mdi mdi-view-dashboard-outline"></i> </a>
                        </div>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2"> {{ __('layout.all data from permissions') }}</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('layout.name') }}</th>
                                    <th class="border-bottom-0">{{ __('layout.permissions') }}</th>
                                    <th class="border-bottom-0">{{ __('layout.oprations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($Permissions)
                                    @foreach ($Permissions as $Permission)
                                        <tr>
                                            <td>{{ $Permission->name }}</td>
                                            <td style="max-width: 200px">
                                                @foreach ($Permission->permissions as $index => $permission)
                                                    {{ $permission }}
                                                    {{ $index !== count($Permission->permissions) - 1 ? '|' : '' }}
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{ route('permissions.destroy', $Permission->id) }}"
                                                    method='post' style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-outline-danger p-0 "
                                                        onclick="confirm_submit()">
                                                        <i class="mdi mdi-delete " style="font-size: 14px; margin:3px 5px"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <div class="modal" id="modaldemo1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('layout.add permissions') }}</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf
                        <div class="row p-3">
                            <div class="form-group col-md-6">
                                <label>{{ __('site.email') }}</label> <input class="form-control"
                                    placeholder="Enter your email" type="text" name='name'>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('site.permissions') }}</label>
                                <div class="row">
                                    @foreach (config('permissions.permissions') as $key)
                                        <div class="col-md-6 mt-1">
                                            <input type="checkbox" name='permissions[]' value="{{ $key }}"> <label
                                                for="">{{ $key }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="m-3">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">Save changes</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        function confirm_submit(e) {
            event.perventDefualt()
            var myCallback = function(choice) {
                if (choice) {
                    notif({
                        'type': 'success',
                        'msg': 'Yeah!',
                        'position': 'center'
                    })
                } else {
                    notif({
                        'type': 'error',
                        'msg': '<i class="far fa-sad-tear"></i>',
                        'position': 'center'
                    })
                }
            }

            notif_confirm({
                'textaccept': 'Stay Here',
                'textcancel': 'Close The Window',
                'message': 'Are you Sure You Want to Close?',
                'callback': myCallback
            })
        }
    </script>
@endsection
