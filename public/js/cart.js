function increment_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    save_to_db(cart_id, newQuantity);
}

function decrement_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1) 
    {
      var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
      save_to_db(cart_id, newQuantity);
    }
}

function save_to_db(cart_id, new_quantity) {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var inputQuantityElement = $("#input-quantity-"+cart_id);
  $.ajax({
    url : "./cart-add",
    data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
    type : 'POST',
    success : function(response) {
      $(".test").html(response);
      $(inputQuantityElement).val(new_quantity);
    },
    error: function (jqXHR, exception) {
      console.log(jqXHR);
    }
  });
}
