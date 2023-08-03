@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4> {{$shelf->box->name}} | shelf {{$shelf->name}}  </h4>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('box.index')}}">Boxes</a></li>
                <li class="breadcrumb-item active">Shelf Informations</li>
            </ol>
            </div>
        </div>
    </div><!-- /.container -->
</section>


<section class="content" >
    <div class="container">
        <div class="row mb-3 ">
            <div class="col-12 d-flex justify-content-end">

                <a href="{{route('store.create')}}" class="btn btn-outline-dark">Create new store</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="card ">
                @if(count($shelf->stores) >= 1)
                    <div class="card-header">
                        <h3 class="card-title">You have {{ count($shelf->stores) }} stores in the shelf</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                @endif
                <div class="card-body table-responsive p-0">
                    @if(count($shelf->stores) >= 1)
                        <table  class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="bg-white">ID</th>
                                    <th class="bg-white">Store name</th>
                                    <th class="bg-white">Tracking count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shelf->stores as $store)
                                    <tr>
                                        <td class="bg-white" >{{$store->id}}</td>
                                        <td class="bg-white">
                                               <a href="{{route('store.show', ['store' => $store->id ])}}">
                                                   <span>{{$store->name}}</span>
                                               </a>
                                        </td>
                                        <td class="bg-white" style="text-transform: capitalize">
                                                {{count($store->codes)}}
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
