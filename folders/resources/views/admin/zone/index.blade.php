@extends('layouts.app')

@section('content')
    @livewire('zone-list')
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
