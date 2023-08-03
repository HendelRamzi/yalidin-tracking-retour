<button type="text" name="search" class=" btn btn-outline-light form-control float-right" style="font-weight: 500" data-bs-toggle="modal" data-bs-target="#search_modal">
    Search for store
</button>
 
<!-- Modal -->
<div class="modal fade" id="search_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search for stores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <div class="modal-body">
                    <div class="form-group">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                With name
                              </button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                With tracking code
                              </button>
                            </li>
                        </ul>


                        <div class="tab-content" id="pills-tabContent">

                            
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <form action="{{route('store.index')}}" method="GET">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Store name</label>
                                        <input type="text" class="form-control" name="name" id="box_name" placeholder="Enter The store name" required>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Search"/>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <form action="{{route('store.index')}}" method="GET">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tacking code</label>
                                        <input type="text" class="form-control" name="code" id="box_name" placeholder="Enter The tracking code" required>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Search"/>
                                        </div>
                                    </div>
                                </form>

                            </div>


                        </div>


                    </div>
                </div>

        </div>
    </div>
</div>
