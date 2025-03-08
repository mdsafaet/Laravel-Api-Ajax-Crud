<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form -->
            <form id="productForm" action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="productPrice" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="productImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="productImage" name="image" required>
                    </div>

                    <div class="mb-3">
                        <label for="productQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="productQuantity" name="quantity" required>
                    </div>

                    <div id="formResponse" class="mt-2"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    // AJAX for Form Submission
    $(document).ready(function () {
        $('#productForm').on('submit', function (e) {
            e.preventDefault();
            
            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '/api/products',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#formResponse').html('<div class="alert alert-success">Product added successfully!</div>');
                    $('#productForm')[0].reset();
                    $('#exampleModal').modal('hide');
                    location.reload();
                },
                error: function () {
                    $('#formResponse').html('<div class="alert alert-danger">Failed to add product.</div>');
                }
            });
        });
    });
</script>
