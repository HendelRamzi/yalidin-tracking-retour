@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Create Store</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('store.index')}}">Stores</a></li>
                    <li class="breadcrumb-item active">Create Store</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <!-- general form elements -->
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Creation of the store</h3>
                </div>
                <!-- /.card-header -->


                <!-- form start -->
                    @livewire('create-store')
                <!-- form end -->

            </div>
                <!-- /.card -->
        </div>
    </section>
@endsection


@push('js-plugins')

@endpush


@push('custom-script')





@endpush
