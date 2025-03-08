


<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="deleteProductConfirmBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $(document).on('click', '.delete_product', function(e) {
          e.preventDefault();
  
          let productId = $(this).data('id');  // Get product ID
  
          // Show delete confirmation modal
          $('#deleteProductModal').modal('show');
  
          // Confirm deletion
          $('#deleteProductConfirmBtn').off().on('click', function() {
              $.ajax({
                  url: "{{ url('api/products') }}/" + productId,
                  method: 'DELETE',
                  success: function(response) {
                      if (response.status) {
                          alert(response.message);
                          $('#deleteProductModal').modal('hide');
                          location.reload();  // Reload the page to reflect deletion
                      } else {
                          alert(response.message);
                      }
                  },
                  error: function(xhr, status, error) {
                      alert('An error occurred while deleting the product.');
                  }
              });
          });
      });
  
  </script>