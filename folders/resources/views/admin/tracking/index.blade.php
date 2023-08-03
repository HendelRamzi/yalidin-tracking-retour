@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Tracking list</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Trackings</li>
            </ol>
            </div>
        </div>
    </div><!-- /.container -->




</section>
    @livewire('tracking-list')
@endsection


@push('custom-script')

@endpush
