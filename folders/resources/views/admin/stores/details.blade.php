@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>store {{$store->name}}</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('store.index')}}">Stores</a></li>
                <li class="breadcrumb-item active">store Informations</li>
            </ol>
            </div>
        </div>
    </div><!-- /.container -->
</section>


    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Store informations</h3>
        
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="store_name">Store name</label>
                                <input type="text" class="form-control" id="store_name" value="{{$store->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="box_name">Box name</label>
                                <input type="text" class="form-control" id="box_name" value="{{$shelf->box->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="shelf_name">Shelf name</label>
                                <input type="text" class="form-control" id="shelf_name" value="{{$shelf->name}}" disabled>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a  href="{{route('store.index')}}" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                See other stores
                            </a>
                        </div>
                    </div>
                    <!-- /.card -->
                    
                </div>
            </div>
        </div>
    </section>


<section class="content" >
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <!-- Button trigger modal -->
                @include('admin.tracking.modals.CreateTrackingModal', ['store' => $store])
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="card ">
                @if(count($codes) >= 1)
                    <div class="card-header">
                        <h3 class="card-title">You have {{ count($codes) }} tracking codes</h3>
                        <div class="card-tools">
                            <div class="input-group " style="width: 150px;">
                                @include('admin.tracking.modals.SearchTrackingModal', ['store' => $store])
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                @endif
                <div class="card-body table-responsive p-0">
                    @if(count($codes) >= 1)
                        <table  class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="bg-white">ID</th>
                                    <th class="bg-white">Code</th>
                                    <th class="bg-white">User</th>
                                    <th class="bg-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($codes as $code)
                                    <tr>
                                        <td class="bg-white" >{{$code->id}}</td>
                                        <td class="bg-white" style="text-transform: capitalize">
                                            <p class="badge bg-primary p-2 me-2">   {{$code->code}}</p>

                                        </td>
                                        <td class="bg-white" style="text-transform: capitalize">
                                                {{$code->user->name}}
                                        </td>
                                        <td class="bg-white" >
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-dark  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deletestore">Delete</a></li>
                                                </ul>
                                            </div>
                                            @include('admin.tracking.modals.DeleteTrackingModal', ['tracking' => $code])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</section>


@endsection


@push('custom-script')
<script type='module'>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif 
</script>
@endpush
