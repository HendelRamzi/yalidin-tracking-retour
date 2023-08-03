@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Stores list</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Stores list</li>
            </ol>
            </div>
        </div>
    </div><!-- /.container -->
</section>

<section class="content" >
    @livewire('store-list')
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
