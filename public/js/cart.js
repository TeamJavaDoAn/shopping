function changeValue() {
  var valueQty = $(".input-quantity").val();
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var inputQuantityElement = $("#input-quantity-"+valueQty);
  $.ajax({
    url : "./cart-update",
    type : 'POST',
    dataType:"text",
    data : "valueQty="+valueQty,
    success : function(response) {
      $(".test").html(response);
      $(inputQuantityElement).val(valueQty);
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      console.log(err.Message);
    }
  });
}

function increment_quantity(valueQty) {
    var inputQuantityElement = $("#input-quantity-"+valueQty);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    save_to_db(valueQty, newQuantity);
}

function decrement_quantity(valueQty) {
    var inputQuantityElement = $("#input-quantity-"+valueQty);
    if($(inputQuantityElement).val() > 1) 
    {
      var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
      save_to_db(valueQty, newQuantity);
    }
}

function save_to_db(valueQty, new_quantity) {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  var inputQuantityElement = $("#input-quantity-"+valueQty);
  $.ajax({
    url : "./cart-update",
    data : "valueQty="+valueQty+"&new_quantity="+new_quantity,
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
