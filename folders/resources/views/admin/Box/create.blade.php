@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Create box</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('box.index')}}">Boxes</a></li>
                    <li class="breadcrumb-item active">Create box</li>
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
                    <h3 class="card-title">Creation of the box</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('box.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Box name</label>
                            <input type="text" class="form-control" name="name" id="box_name" placeholder="Enter The box name" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button  id="submit" class="btn btn-dark">Create box</button>
                    </div>
                </form>
            </div>
                <!-- /.card -->
        </div>
    </section>
@endsection


@push('js-plugins')

@endpush


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
