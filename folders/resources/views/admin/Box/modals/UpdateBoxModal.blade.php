<!-- Button trigger modal -->
<button type="button" class="btn btn-info mx-2" style="font-weight: 500" data-bs-toggle="modal" data-bs-target="{{"#updateModal_".$box->id }}">
    <span >edit</span>
 </button>
 <!-- Modal -->
 <div class="modal fade" id="{{"updateModal_".$box->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Update box</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{route('box.update', ['box' => $box->id])}}" method="POST">
                 @csrf
                 @method("put")
                 <div class="modal-body">
                    <div class="form-group">
                        <label for="box_name">Box name</label>
                        <input type="text" class="form-control" name="name" value="{{$box->name}}" id="box_name" placeholder="Enter The box name" required>
                    </div>
                    @foreach ($box->shelves as $shelf)
                        <div class="form-group">
                            <label for="">Shalf {{$shelf->name}}</label>
                            <input type="text" class="form-control" name="shelves[]" value="{{$shelf->name}}" id="" placeholder="Enter The shelf name" required>
                        </div>
                    @endforeach
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <input type="submit" class="btn btn-primary" value="Update"/>
                 </div>
             </form>
         </div>
     </div>
 </div>