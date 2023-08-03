<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteBox">
    <span >delete</span>
 </button>
 <!-- Modal -->
 <div class="modal fade" id="deleteBox" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
            <div class="modal-body">
                <p>Are you sure to delete this box ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{route('box.destroy',['box' => $box])}}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </div>
         </div>
     </div>
 </div>