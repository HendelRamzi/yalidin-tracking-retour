<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light" style="font-weight: 500" data-bs-toggle="modal" data-bs-target="#search_modal">
    <span >Search for code</span>
 </button>
 <!-- Modal -->
 <div class="modal fade" id="search_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search for tracking code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if(isset($store))
                <form action="{{route('store.show', ['store' => $store->id])}}" method="GET">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tracking_code">Tracking code</label>
                            <input type="text" class="form-control" name="code" id="tracking_code" placeholder="Enter The tracking code" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Add"/>
                    </div>
                </form>
            @else
                <form action="{{route('tracking.index')}}" method="GET">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tracking_code">Tracking code</label>
                            <input type="text" class="form-control" name="code" id="tracking_code" placeholder="Enter The tracking code" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Search"/>
                    </div>
                </form>
            @endif
         </div>
     </div>
 </div>