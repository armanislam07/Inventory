$(document).ready(function(){



 $('#cat_id').on('change',function(e){

  if($(this).value != ''){
    var cat_id = e.target.value;
      $.get('/dependent/product?cat_id='+cat_id,function(data){

        $('#product').empty();
        $('#product').append('<option value="">--Select Product--</option>');
        $.each(data, function(index, productObj){
          $('#product').append('<option value="'+productObj.id+'">'+productObj.product_name+'</option>');

        });


      });
  }

 });

 $('#product').on('change',function(e){

  if($(this).value != ''){
    var product = e.target.value;
      $.get('/invoice/fatch?id='+product,function(data){
        
        $('#chalan').empty();
        $('#chalan').append('<option value="">--Select Product--</option>');
        $.each(data, function(index, chalanObj){
          $('#chalan').append('<option value="'+chalanObj.id+'">'+chalanObj.chalan_date+ ' ('+chalanObj.current_quantity+')'+'</option>');
        });

      });
  }

 });

$('#chalan').on('change',function(e){
  

  if($(this).value != ''){
    var chalan = e.target.value;
      $.get('/invoice/fatch/price?id='+chalan,function(data){
        
         // $('#price').empty();
        // $('#price').append('<input class="form-control" type="number" id="price" name="price" required autocomplete="price">');
        $.each(data, function(index, priceObj){
          document.getElementById('quantity').value = 1;
          document.getElementById('price').value = priceObj.sell_price;
          document.getElementById('discount').value = 0; //this is discount value updated
        });



sub_total();
grand_total();
total_due();
$("#quantity, #price, #discount, #dis_type").on("keydown keyup", function(){
    sub_total();
    grand_total();
    total_due();
  });

  function sub_total(){
    var quantity = document.getElementById('quantity').value;
    var price = document.getElementById('price').value;
    var discount = document.getElementById('discount').value;
    var dis_type = document.getElementById('dis_type').value;

    var result = parseInt(quantity) * parseInt(price);
    var dis_result = result - parseInt(discount);
    

    if (dis_type == '-') {

        var amount_result = result - parseInt(discount);
        document.getElementById('sub_total').value = dis_result; //this is sub total value updated
      }
      if (dis_type == '%') {

        var parsent = result * parseInt(discount);
        var parsent_amount = parsent / 100;
        var parsent_result = result - parsent_amount;
        document.getElementById('sub_total').value = parsent_result; //this is sub total value updated
      }



    $('#dis_type').on('change',function(e){
      
      var dis_type = e.target.value;

      if (dis_type == '-') {

        var amount_result = result - parseInt(discount);
        document.getElementById('sub_total').value = amount_result; //this is sub total value updated
      }
      if (dis_type == '%') {

        var parsent = result * parseInt(discount);
        var parsent_amount = parsent / 100;
        var parsent_result = result - parsent_amount;
        document.getElementById('sub_total').value = parsent_result; //this is sub total value updated
      }

    });

  }

      });
  }





 });


});



  var i = 2;

function addmore()
    {

          var tr = '<tr>'+
          '<th class="h3"><a href="#" id="remove" class="remove"><i class="fa fa-trash text text-danger" aria-hidden="true"></i></a></th>'+
          '<td>'+
          '<select class="form-control" id="cat_id'+i+'" name="cat_id[]">'+
          '<option value="">--select Category--</option>'+

          '</select>'+
          '</td>'+
          '<td>'+
          '<select class="form-control" id="product'+i+'" name="product[]">'+
          '<option value="">select Product</option>'+
          '</select>'+
          '</td>'+
          '<td>'+
          '<select class="form-control" id="chalan'+i+'" name="chalan[]">'+
          '<option value="">select Chalan</option>'+
          '</select>'+
          '</td>'+
          '<td>'+
          '<input class="form-control text-center" type="number" id="quantity'+i+'" name="quantity[]" required autocomplete="quantity">'+
          '</td>'+
          '<td>'+
          '<input class="form-control text-md-right" type="number" id="price'+i+'" name="price[]" required autocomplete="price" readonly>'+
          '</td>'+
          '<td>'+
          '<input class="form-control" type="number" id="discount'+i+'" name="discount[]" value="" required autocomplete="discount">'+
          '</td>'+
          '<td>'+
          '<select class="form-control" id="dis_type'+i+'" name="discount_type[]" required autocomplete="discount">'+
          '<option value="-" default>Amount</option>'+
          '<option value="%">%</option>'+
          '</select>'+
          '</td>'+
          '<td>'+
          '<input class="form-control text-md-right" type="number" id="sub_total'+i+'" name="sub_total[]" required autocomplete="sub_total" readonly>'+
          '</td>'+
          '</tr>';
          $('.show').append(tr);

    };

    function fatchCategoryData(){
      $.get('/invoice/view/fatch', function(data){

            $('#cat_id'+i+'').empty();
            $('#cat_id'+i+'').append('<option value="">--Select Category--</option>');
            $.each(data, function(index, categoryObj){
              $('#cat_id'+i+'').append('<option value="'+categoryObj.id+'">'+categoryObj.category+'</option>');
            });

          });

 $('#cat_id'+i+'').on('change',function(e){

  if($(this).value != ''){
    var cat_id = e.target.value;
      $.get('/dependent/product?cat_id='+cat_id,function(data){
        var index_id = i;

        $('#product'+i+'').empty();
          $('#product'+i+'').append('<option value="">--Select Product--</option>');
          $.each(data, function(index, productObj){
            $('#product'+i+'').append('<option value="'+productObj.id+'">'+productObj.product_name+'</option>');
          });

      });
  }

 });

 $('#product'+i+'').on('change',function(e){

  if($(this).value != ''){
    var product = e.target.value;
      $.get('/invoice/fatch?id='+product,function(data){
        // console.log(data);
        $('#chalan'+i+'').empty();
        $('#chalan'+i+'').append('<option value="">--Select Product--</option>');
        $.each(data, function(index, chalanObj){
          $('#chalan'+i+'').append('<option value="'+chalanObj.id+'">'+chalanObj.chalan_date+ ' ('+chalanObj.current_quantity+')'+'</option>');
        });

      });
  }

 });

$('#chalan'+i+'').on('change',function(e){
  // console.log(e);

  if($(this).value != ''){
    var chalan_id = e.target.value;
      $.get('/invoice/fatch/price?id='+chalan_id,function(data){
        // console.log(data);
          $('#price'+i+'').empty();
        // $('#price'+i+'').append('<input class="form-control" type="number" id="price" name="price[]" required autocomplete="price">');
        $.each(data, function(index, priceObj){
          document.getElementById('quantity'+i+'').value = 1;
          document.getElementById('price'+i+'').value = priceObj.sell_price;
          document.getElementById('discount'+i+'').value = 0;
        });



          sub_total();
          grand_total();
          total_due();

$("#quantity"+i+", #price"+i+", #discount"+i+", #dis_type"+i+"").on("keydown keyup", function(){
    sub_total();
    grand_total();
    total_due();
  });

  function sub_total(){
    var quantity = document.getElementById('quantity'+i+'').value;
    var price = document.getElementById('price'+i+'').value;
    var discount = document.getElementById('discount'+i+'').value;
    var dis_type = document.getElementById('dis_type'+i+'').value;
    var g_total = document.getElementById('g_total').value;
    // console.log(g_total);
    var result = parseInt(quantity) * parseInt(price);
    var dis_result = result - parseInt(discount);
    // console.log(dis_type);
    $('#g_total').empty();
    if (dis_type == '-') {

        var amount_result = result - parseInt(discount);
        document.getElementById('sub_total'+i+'').value = dis_result;

      }
      if (dis_type == '%') {

        var parsent = result * parseInt(discount);
        var parsent_amount = parsent / 100;
        var parsent_result = result - parsent_amount;
        var grand_total = g_total + parsent_result;
        $('#g_total').empty();
        document.getElementById('sub_total'+i+'').value = parsent_result;
        document.getElementById('g_total').value = grand_total;
      }



    $('#dis_type'+i+'').on('change',function(e){
      // console.log(e);
      var dis_type = e.target.value;

      if (dis_type == '-') {

        var amount_result = result - parseInt(discount);
        var grand_total = g_total + amount_result;
        document.getElementById('sub_total'+i+'').value = dis_result;
        document.getElementById('g_total').value = grand_total;

      }
      if (dis_type == '%') {

        var parsent = result * parseInt(discount);
        var parsent_amount = parsent / 100;
        var parsent_result = result - parsent_amount;
        var grand_total = g_total + parsent_result;
        document.getElementById('sub_total'+i+'').value = parsent_result;
        document.getElementById('g_total').value = grand_total;
      }

    });

  }

      });
  }

 });
    };

    $('#addmore').on('click',function(){
      i++;
      addmore();
      fatchCategoryData();

    });

    $(document).on('click', '.remove', function(e){
            $(this).closest('tr').remove();
            // console.log(e);
        });


function grand_total(){
    var subTotal = 0;
    $("input[name^=sub_total]").each(function() {
        // alert(this.value);
        //   console.log($(this));

        subTotal += parseFloat($(this).val());

    });
    //alert(subTotal); vi aktu daran
    // console.log(subTotal);
    $('#g_total').val(subTotal.toFixed(2));
    
}

function total_due(){
  var total_due = 0;
  $("#g_total,#paid_amount").on('keydown keyup',function(){

  var grand_total = document.getElementById('g_total').value;
  var paid_amount = document.getElementById('paid_amount').value;
  total_due = parseFloat(grand_total) - parseFloat(paid_amount);
  $('#due_amount').val(total_due.toFixed(2));
  // console.log(total_due);
  });
}

// $(document).ready(function(){

//   $.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
// });

//   $('#invoice_save').on('click', function(invoice){
//     // invoice.preventDefault();
//     var customer_name = [$('#price'+i+'').val()];

//     $.ajax({
//       url: "/invoice/insert",
//       method: "POST",
//       data:{customer_name:customer_name},
//       dataType:"json",
//       success:function(data)
//       {
//         // var html = '';
//         // if (data.errors) {
//         //   html = '<div class="alert alert-danger">';
//         //   for (var count =0 count < data.errors.length; i >= 0; i--) {
//         //     Things[i]
//         //   }
//         // }
//         console.log(data);

//       }
//     });

//   });
// });






// $(document).ready(function() {
//     //this calculates values automatically
//     sum();
//     $("#qty1, #qty2, #qty3, #qty4, #qty5").on("keydown keyup", function() {
//         sum();
//     });
// });

// function sum() {
//             var num1 = document.getElementById('qty1').value;
//             var num2 = document.getElementById('qty2').value;
//             var num3 = document.getElementById('qty3').value;
//             var num4 = document.getElementById('qty4').value;
//             var num5 = document.getElementById('qty5').value;
// 			var result = parseInt(num1) + parseInt(num2) + parseInt(num3) + parseInt(num4) - parseInt(num5);
// 			var result1 = result - parseInt(num3);
//             if (!isNaN(result)) {
//                 document.getElementById('sum').value = result;
// 				document.getElementById('subt').value = result1;
//             }else{
//                 document.getElementById('sum').value = result;
//             }
//         }





