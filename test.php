<script>
  $(document).on('click', '.updateQty', function() {
    var qty = $(this).closest('.product_data').find('.quantity').val();
    var prod_id = $(this).closest('.product_data').find('.prodId').val();

    $.ajax({
      url: 'function.php',
      method: "POST",
      data: {
        'order_id': prod_id,
        'order_quantity': qty
      },
      success: function(response) {
        updateCart();
      }
    });
  });
</script>
<script>
  function updateCart() {
    $.ajax({
      url: 'update_cart.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var cartHtml = '';
        data.items.forEach(function(item) {
          cartHtml += `
            <span class="flex flex-col gap-1.5 justify-between">
              <h6 class="lg:text-base text-sm">Item Name : ${item.product_name}</h6>
              <span class="flex gap-1 items-center">
                <h6 class="lg:text-base text-sm">Product Price : Rp.${new Intl.NumberFormat('id-ID').format(item.product_price)} X</h6>
                <input class="w-[30px] h-[30px] outline-none" type="number" readonly value="${item.order_quantity}">
              </span>
              <h6 class="lg:text-base text-sm">Subtotal: Rp. ${new Intl.NumberFormat('id-ID').format(item.subtotal)}</h6>
            </span>
            <hr>`;
        });

        if (cartHtml === '') {
          cartHtml = `
            <span class="flex flex-col gap-1.5 justify-between items-center">
              <h6>Tidak Ada Product Yuk belanja !!</h6>
            </span>`;
        }

        $('.cart-container').html(cartHtml);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error updating cart: ' + textStatus, errorThrown);
      }
    });
  }

  // Call updateCart function on page load or any other event you want to trigger it
  $(document).ready(function() {
    updateCart();
  });
</script>