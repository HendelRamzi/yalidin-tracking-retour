<div>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div class="">
                    <p class="badge bg-secondary p-2 me-2">Result ({{count($stores)}})</p>
                    <p class="badge bg-warning p-2 me-3">Selected ({{count($items)}})</p>
                </div>
                @if(count($items) >= 1)
                    <p class="badge bg-danger p-2 ms-auto" type="button" wire:click="deleteSelected">Delete all the selected</p>
                @endif
                <!-- Button trigger modal -->
                <a href="{{route('store.create')}}" class="btn btn-sm btn-outline-dark">
                    <span >Add new store</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="card ">
                <div class="card-header w-100 d-flex align-items-center ">
                    <h3 class="card-title me-2">Search for Store</h3>
                    <div class="">
                        <input type="text" class="form-control" wire:model="search" name="search" placeholder="Enter The store name">
                    </div>
                </div>
                    <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    @if(count($stores) < 1)
                    <table  class="table table-striped">
                        <thead>
                            <tr>
                                <th class="bg-white">ID</th>
                                <th class="bg-white">Store name</th>
                                <th class="bg-white">Box</th>
                                <th class="bg-white">Shelf</th>
                                <th class="bg-white">Retour count</th>
                                <th class="bg-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <p style="font-weight: bold">No store found</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                    @if(count($stores) >= 1)
                        <table  class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="bg-white">ID</th>
                                    <th class="bg-white">Store name</th>
                                    <th class="bg-white">Box</th>
                                    <th class="bg-white">Shelf</th>
                                    <th class="bg-white">Retour count</th>
                                    <th class="bg-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td class="bg-white" >{{$store->id}}</td>
                                        <td class="bg-white" style="text-transform: capitalize">
                                            <a href="{{route('store.show', ['store' => $store->id])}}">
                                                {{$store->name}}
                                            </a>
                                        </td>
                                        <td class="bg-white">
                                           <a href="{{route('box.show', ['box' => $store->shelf->box->id])}}">
                                            {{ $store->shelf->box->name }}
                                           </a>
                                        </td>
                                        <td class="bg-white">
                                            {{ $store->shelf->name }}
                                        </td>
                                        <td class="bg-white">
                                           {{ count($store->codes) }}
                                        </td>
                                        <td class="d-flex bg-white" >
                                            @include('admin.stores.modals.DeleteStoreModal', ['store' => $store->id])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
                <!-- /.card-body -->

            </div>
            {{ $stores->links() }}

            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
