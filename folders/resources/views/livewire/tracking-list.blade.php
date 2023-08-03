<div>
    <section class="content" >
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-start align-items-center">
                    <p class="badge bg-secondary p-2 me-2">Result ({{count($trackings)}})</p>
                    <p class="badge bg-warning p-2 me-3">Selected ({{count($items)}})</p>
                    @if(count($items) >= 1)
                        <p class="badge bg-danger p-2 ms-auto" type="button" wire:click="deleteSelected">Delete all the selected</p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                            <div class="card-header w-100 d-flex align-items-center ">
                                <h3 class="card-title me-2">Search for Tracking</h3>
                                <div class="">
                                    <input type="text" class="form-control" wire:model="search" name="search" placeholder="Enter The code">
                                </div>
                            </div>
                            <!-- /.card-header -->                       
                            <div class="card-body table-responsive p-0">
                            @if(count($trackings) < 1)
                            <table  class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="bg-white">
                                            <input type="checkbox" wire:click="selectAll" disabled>
                                        </th>
                                        <th class="bg-white">Tracking code</th>
                                        <th class="bg-white">Store</th>
                                        <th class="bg-white">user</th>
                                        <th class="bg-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
                                        <td colspan="5">
                                            No tracking code found
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                            @if(count($trackings) >= 1)
                                <table  class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="bg-white">
                                                <input type="checkbox" wire:click="selectAll">
                                            </th>
                                            <th class="bg-white">Tracking code</th>
                                            <th class="bg-white">Store</th>
                                            <th class="bg-white">user</th>
                                            <th class="bg-white">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trackings as $tracking)
                                            <tr wire:key="{{$tracking->id}}" >
                                                <td class="bg-white" >
                                                    <input type="checkbox" wire:model="items" name="items" value="{{$tracking->id}}">
                                                </td>
                                                <td class="bg-white" style="text-transform: capitalize">
                                                    <p class="badge bg-primary p-2 me-2">   {{$tracking->code}}</p>
                                                </td>
                                                <td class="bg-white"> 
                                                    <a href="{{ route('store.show', ["store" => $tracking->store->id]) }}">
                                                        {{$tracking->store->name}}
                                                    </a>
                                                </td>
                                                <td class="bg-white"> {{$tracking->user->name}} </td>
                                                <td class=" bg-white " >
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-dark  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deletestore">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                    @include('admin.tracking.modals.DeleteTrackingModal', ['tracking' => $tracking])
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{ $trackings->links() }}
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>    

    <script type='module'>
            @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
            @endif
            @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
            @endif
    </script>


</div>

