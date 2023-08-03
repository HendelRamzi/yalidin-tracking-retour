<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-dark" style="font-weight: 500" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <span >Add new tracking code</span>
 </button>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">New tracking for {{ $store->name }}</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{route('tracking.store')}}" method="POST">
                 @csrf
                <input type="hidden" value="{{$store->id}}" name="store_id">
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
         </div>
     </div>
 </div>