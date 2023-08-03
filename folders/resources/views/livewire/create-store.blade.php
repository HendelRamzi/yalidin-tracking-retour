<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="store_name">Store name</label>
            <input type="text" class="form-control" name="name" wire:model="name" id="store_name" placeholder="Enter The box name" required>
        </div>
        <div class="row">
            <div class=" col-12 col-md-6">
                <div class="form-group">
                    <label for="box">Select to box</label>
                    <select name="box" id="box" class="form-control" wire:model="box">
                        <option value="" selected >Select the box</option>
                        @foreach ($boxs as $box)
                            <option value="{{$box->id}}" wire:key={{$box->id}}>{{$box->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class=" col-12 col-md-6">
                <div class="form-group">
                    <label for="shelf">Select the shelf</label>
                    <select class="form-control" name="shelf" id="shelf" wire:model="shelf"> 
                        <option value="">Select the shelf</option>
                        @if (!empty($shelves))
                            @foreach ($shelves as $shelf)
                                <option value="{{$shelf->id}}" wire:key={{$shelf->id}}>{{$shelf->name}}</option>
                            @endforeach
                        @endif
                    </select>                                    
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="tracking_code">Tracking code</label>
            <input type="text" class="form-control"wire:model="code" name="code" id="tracking_code" placeholder="Enter The tracking code" required>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button wire:click='createStore' class="btn btn-outline-dark">Create store</button>
    </div>

</div>
