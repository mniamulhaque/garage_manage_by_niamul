<div class="modal fade" id="mymodal" >
    <div class="modal-dialog modal-fullscreen-md-down modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Vehicle Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('vehicle-brands.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <label for="name" class="col-md-4">Vehicle Brand Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="" class="col-md-4"></label>
                        <div class="col-md-8 ">
                            <div class="float-end">
                                <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Close">
                                <input type="submit" class="btn btn-primary" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
