<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-dark" style="font-weight: 500" data-bs-toggle="modal" data-bs-target="#exampleModal">
   <span >Add new box</span>
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New box</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('box.store')}}" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Box name</label>
                        <input type="text" class="form-control" name="name" id="box_name" placeholder="Enter The box name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save"/>
                </div>
            </form>
        </div>
    </div>
</div>