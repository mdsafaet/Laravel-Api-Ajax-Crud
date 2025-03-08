
<!-- Bootstrap Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="viewModalLabel">Product Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="productContent">
                <!-- Dynamic content will be inserted here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.view-product').on('click', function() {
            let productId = $(this).data('id');

            $.ajax({
                url: `/api/products/${productId}`,
                method: 'GET',
                success: function(response) {
                    let product = response.data;
                    let imageUrl = product.image ? `/storage/${product.image}` : '';

                    $('#productContent').html(`
                        ${imageUrl ? `<img src="${imageUrl}" class="img-fluid mt-2" alt="${product.name}">` : ''}
                        <p><strong>Name:</strong> ${product.name}</p>
                        <p><strong>Price:</strong> $${product.price}</p>
                        <p><strong>Quantity:</strong> ${product.quantity}</p>
                     
                    `);
                    $('#viewModal').modal('show');
                },
                error: function(xhr, status, error) {
                    alert('Error loading product: ' + error);
                }
            });
        });
    });
</script>
