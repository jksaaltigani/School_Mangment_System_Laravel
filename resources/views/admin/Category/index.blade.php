@extends('layouts.master')
@section('title', __('layout.name_of_website') . ' | ' . __('layout.categories'))
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('layout.categories') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('layout.dashboard') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('layout.table categories') }}</h4>
                        <div>
                            <a href="#" class="btn btn-outline-info" data-target="#modaldemo1" data-toggle="modal">
                                {{ __('layout.new category') }}
                                <i class="mdi mdi-view-dashboard-outline"></i> </a>
                        </div>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2"> {{ __('layout.all data from categories') }}</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('layout.name') }}</th>
                                    <th class="border-bottom-0">{{ __('layout.status') }}</th>
                                    <th class="border-bottom-0">{{ __('layout.oprations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($Categories)
                                    @foreach ($Categories as $Category)
                                        <tr>
                                            <td>{{ $Category->name }}</td>
                                            <td>{{ $Category->getStatus() }}</td>
                                            <td>
                                                <a class='btn btn-sm btn-outline-primary p-0 edit_btn' data-target="#editModal"
                                                    data-toggle="modal" data-name='{{ $Category->name }}'
                                                    data-id='{{ $Category->id }}' href="javascript::void(0)">
                                                    <i class="mdi mdi-pen" style="font-size: 14px; margin:3px 5px"></i>
                                                </a>

                                                <form action="{{ route('category.destroy', $Category->id) }}" method='post'
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-outline-danger p-0 ">
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
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('layout.add category') }}</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="row p-3">
                            <div class="form-group col-md-12">
                                <label>{{ __('layout.email') }}</label> <input class="form-control"
                                    placeholder="Enter your email" type="text" name='name'>
                            </div>
                        </div>
                        <div class="m-3">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">{{ __('layout.add category') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{ __('layout.cancel') }}</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>

    <div class="modal" id="editModal">
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
    <script>
        $('.edit_btn').on('click', function(e) {
            $('#edit_id').val($(this).data('id'))
            $('#edit_name').val($(this).data('name'))
            console.log($(this).data('name'))

        })
    </script>
@endsection
