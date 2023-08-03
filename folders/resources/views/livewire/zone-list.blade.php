<div>
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Zones list</h3>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Zones</li>
                </ol>
                </div>
            </div>
        </div><!-- /.container -->
    </section>


    <section class="content" >
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-between">
                    <div class="d-flex">
                        <p class="badge bg-secondary p-2 me-3">Result ({{count($boxs)}})</p>
                        @if(count($items) >= 1)
                            <p class="badge bg-warning p-2 me-3">Selected ({{count($items)}})</p>
                        @endif
                    </div>
                    @include('admin.box.modals.AddBoxModel')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header w-100 d-flex align-items-center " >
                        <h3 class="card-title me-2">Search for box</h3>
                        <div class="">
                            <input type="text" class="form-control" wire:model="search" name="search" placeholder="Enter The box name">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        @if(count($boxs) < 1)
                        <table  class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="bg-white">Box name</th>
                                    @foreach ($zones->storages as $storage)
                                        <th class="bg-white"> {$storage->name} </th>
                                    @endforeach
                                    <th class="bg-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        No boxes found
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                        @if(count($boxs) >= 1)
                            <table  class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="bg-white">
                                            <input type="checkbox" wire:click="selectAll">
                                        </th>
                                        <th class="bg-white">Box name</th>
                                        @foreach ($zones->storages as $storage)
                                            <th class="bg-white"> {$storage->name} </th>
                                        @endforeach
                                        <th class="bg-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($zones as $zone)
                                        <tr wire:key="{{$zone->id}}">
                                            <td class="bg-white" >
                                                <input type="checkbox" wire:model="items" value="{{$zone->id}}" name="items" >
                                            </td>
                                            <td class="bg-white" style="text-transform: capitalize">
                                                <a href="{{route('box.show', ['box' => $zone->id])}}">
                                                    {{$zone->name}}
                                                </a>
                                            </td>
                                            @foreach ($zone->storages as $storage)
                                                @if(count($storage->stores) >=1)
                                                    <td class="bg-white" >
                                                        <a href="{{route('shelf.show', ['shelf' => $shelf->id ])}}">
                                                            <span class="badge bg-success p-2">{{count($shelf->stores)}} Stores</span>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="bg-white" >empty</td>
                                                @endif
                                            @endforeach
                                            <td class="d-flex bg-white  " >
                                                @include('admin.box.modals.DeleteModal', ['box' => $box->id])
                                                {{-- @include('admin.box.modals.UpdateBoxModal', ['box'=> $box]) --}}
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

</div>
