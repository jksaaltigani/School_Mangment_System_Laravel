@extends('layouts.master')
@section('title', __('layout.name_of_website') . ' | ' . __('layout.posts'))
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
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
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('layout.table articals') }}</h4>
                        <div>
                            <a class="btn btn-outline-info" href={{ route('articals.create') }}>
                                {{ __('layout.add new artical') }}
                                <i class="mdi mdi-view-dashboard-outline"></i> </a>
                        </div>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2"> {{ __('layout.all data from articals') }}</p>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                            <thead class="">
                                <tr>
                                    <th>{{ __('layout.artical head') }} </th>
                                    <th>{{ __('layout.artical photo') }} </th>
                                    <th>{{ __('layout.artical writer') }} </th>
                                    <th>{{ __('layout.artical desc') }}</th>
                                    <th>{{ __('layout.status') }}</th>
                                    <th>{{ __('layout.opration') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($articals)
                                    @foreach ($articals as $artical)
                                        <tr>
                                            <td>{{ $artical->name }}</td>
                                            <td> <img style="width: 150px; height: 100px;" src="{{ $artical->photo }}">
                                            </td>
                                            <td>{{ $artical->description }}</td>
                                            <td>{{ $artical->user->name }}</td>
                                            <td>{{ __('layout.' . $artical->getActive()) }}</td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href=' {{ route('articals.show', $artical->id) }}'
                                                        class='btn btn-sm btn-outline-success p-0 ml-2 edit_btn'>
                                                        <i class="mdi mdi-eye" style="font-size: 14px; margin:3px 5px"></i>
                                                    </a>
                                                    <a href="{{ route('articals.edit', $artical->id) }}"
                                                        class='btn btn-sm btn-outline-primary p-0 ml-2 edit_btn'>
                                                        <i class="mdi mdi-pen" style="font-size: 14px; margin:3px 5px"></i>
                                                    </a>

                                                    <a data-toggle="modal" data-target="#deleteModel"
                                                        data-name='{{ $artical->name }}' data-id='{{ $artical->id }}'
                                                        href="javascript::void(0)"
                                                        class='btn btn-sm btn-outline-danger p-0 ml-2 Delete_btn'>
                                                        <i class="mdi mdi-delete" style="font-size: 14px; margin:3px 5px"></i>
                                                    </a>
                                                    <a href="{{ route('articals.status', $artical->id) }}"
                                                        class="btn btn-outline-warning">
                                                        @if ($artical->active == 0)
                                                            {{ __('layout.activeate') }}
                                                        @else
                                                            {{ __('layout.not activeate') }}
                                                        @endif
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        <div class="justify-content-center d-flex">
                            {!! $articals->links() !!}
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
    <!-- row closed -->
    </div>

    </div>

    <div class="modal" id="deleteModel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('layout.add category') }}</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('articals.destroy', 1) }}" method="post">
                        @csrf
                        @method('delete')
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
                    <button class="btn ripple btn-danger" type="submit">{{ __('layout.delete category') }}</button>
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
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $('.Delete_btn').on('click', function(e) {
            $('#edit_id').val($(this).data('id'))
            $('#edit_name').val($(this).data('name'))
            console.log($(this).data('name'))

        })
    </script>
@endsection
