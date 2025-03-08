{{-- 
<button class="btn btn-primary btn-sm editProduct" 
data-bs-toggle="modal" 
data-bs-target="#upexampleModal" 
data-id="{{ $product->id }}"  
data-name="{{ $product->name }}"
data-quantity="{{ $product->quantity }}"
data-price="{{ $product->price }}"
data-image="{{ $product->image }}">
Edit
</button> --}}



    <!-- Update Product Modal -->
    <div class="modal fade" id="upexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Form inside Modal -->
                <form id="updateproductForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="Update_id" name="id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="upproductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="upproductName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="upproductPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="upproductPrice" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="upproductimage" class="form-label">Image</label>
                            <input type="file" class="form-control" id="upproductimage" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="upproductquantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="upproductquantity" name="quantity" required>
                        </div>
                        <div id="upformResponse" class="mt-2"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary updateproduct">Update Product</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
         

            // Open Modal and Fetch Data
            $(document).on('click', '.editProduct', function () {  // Use delegated event handling
                const productId = $(this).data('id');
              
        
                // Fetch Product Data
                $.ajax({
                    url: `/api/products/${productId}`, // Verify this endpoint
                    method: 'GET',
                    success: function (response) {
                        console.log('API Response:', response); // Inspect response structure
                        
                        // Adjust these lines based on actual response structure
                        const product = response.product || response.data; // Common variations
                        
                        if (product) {
                            $('#Update_id').val(product.id);
                            $('#upproductName').val(product.name);
                            $('#upproductPrice').val(product.price);
                            $('#upproductquantity').val(product.quantity);
                            $('#upexampleModal').modal('show'); // Show modal AFTER populating data
                        } else {
                            console.error('Product data missing in response');
                            alert('Product not found');
                        }
                    },
                    error: function (xhr) {
                        console.error('AJAX Error:', xhr.responseText);
                        alert('Error fetching product data');
                    }
                });
            });
                        // Update Product
                       
                 $('#updateproductForm').on('submit', function (e) {
                e.preventDefault();

                let id = $('#Update_id').val();
                let formData = new FormData(this);
                formData.append('_method', 'PUT'); // For Laravel resource update

                $.ajax({
                    type: 'POST',
                    url: `/api/products/${id}`,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log('Update success:', response);
                        $('#upformResponse').html('<div class="alert alert-success">✅ Product updated successfully.</div>');
                        setTimeout(() => {
                            $('#upexampleModal').modal('hide');
                            location.reload(); // Refresh page
                        }, 1500);
                    },
                    error: function (xhr) {
                        console.error('Update error:', xhr);
                        $('#upformResponse').html('<div class="alert alert-danger">❌ Failed to update product.</div>');
                    }
                });
            });

        });
         
        </script>