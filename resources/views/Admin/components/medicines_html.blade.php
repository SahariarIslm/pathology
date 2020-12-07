<td><select class="form-control SUP medicine" id="medicine_id" name="medicine_id[]" required>
		<option value="">Select Medicine</option>
		@foreach($medicines as $medicine)
		<option value="{{ $medicine->id }}">
		    {{ $medicine->name }}
		</option>
		@endforeach
	</select>
</td>
<td>
	<input class="code text-center form-control" id="code" name="code[]" type="text" value=""style="width: ; border: hidden;" readonly>
</td>
<td>
	<input class="Expiry text-center form-control"type="date" name="expiry_date[]" value=""style="width: ; border: hidden;">
</td>
<td>
	<input class="Batch text-center form-control" type="text" name="batch_no[]" value=""style="width: ; border: hidden;">
</td>
<td>
	<input class="iTEmQty text-center form-control" id="quantity" name="qty[]" type="number" step=".01" title="" value="" min="0" style="width: ; bor der: hidden;">
</td>
<td>
	<input class="price text-center form-control" id="price" type="number" name="cost[]" step=".01" title="" value="" min="0" style="width: ; bor der: hidden;">
</td>
<td><input class="item_total text-center form-control" id="subprice" name="total[]" type="number" step=".01" title="" value="" min="0" style="width: ; bor der: hidden;" readonly></td>
<td>
	<a class="btn btn-danger btn-xs ibtnDel"> <i class="fa fa-remove"></i></a>
</td>

<script type="text/javascript">
	$(document).ready(function(){
	    $('.medicine').change(function(){
	        $.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });
	        var counter =  $(this).parent('td').parent('tr').data('id');
			var medicine_id = $('#medicine_row_'+counter).find('.medicine').val();
	         $.ajax({
	            type: "POST",
	            url : "{{ route('purchase.getPrice') }}",
	            data : 
	                {
	                    medicine_id:medicine_id,
	                },
	            success: function(response) {
	            	$('#medicine_row_'+counter).find('#quantity').on("input",function (event) {

	            		var total_qty   = 0;
	            		var qty         = 0;
						var singlePrice = 0;
						var subPrice    = 0;
				        var sub_total   = 0;

	            		singlePrice = $('#medicine_row_'+counter).find('#price').val();
	            		qty         = $('#medicine_row_'+counter).find('#quantity').val();
	                    subPrice    = singlePrice * qty;
	                    subPriceVal = $('#medicine_row_'+counter).find('#subprice').val(subPrice);
	                    
					    $(".iTEmQty").each(function(){
					        var item_qty = parseInt($(this).val());
					        total_qty   += isNaN(item_qty)?0:item_qty ;
					        $('.totalQty').val(total_qty);
					    });

					    $('#medicine_row_'+counter).find('#price').keyup(function(){
					        var price   = parseFloat($(this).val());
					        subPrice    = (isNaN(price)?0:price) * qty;
					        subPriceVal = $('#medicine_row_'+counter).find('#subprice').val(subPrice);   
					        var item_total_amount = 0;
					        var sub_total = 0;
					        $(".item_total").each(function(){
						        var item_total_amount = parseFloat($(this).val());
						        sub_total            += isNaN(item_total_amount) ? 0 : item_total_amount;
						        $('.bill').val(sub_total);
						        $('.subTotal').val(sub_total);
						    });
					    });

					    $(".item_total").each(function(){
					        var item_total_amount = parseFloat($(this).val());
					        sub_total            += isNaN(item_total_amount) ? 0 : item_total_amount;
					        $('.bill').val(sub_total);
					        $('.subTotal').val(sub_total);
					    });

	                    
	                    $('#medicine_row_'+counter).find('#price').keyup(function(){
					        var price   = parseFloat($(this).val());
					        subPrice    = (isNaN(price)?0:price) * qty;
					        subPriceVal = $('#medicine_row_'+counter).find('#subprice').val(subPrice);   

					        function doStuff() {
						        var d = $('.disc').val();
						        var s = $('.SubTotal').val();

						        if ($(".discType").children(":selected").attr("id") == 't') {   
						            var totalP = s - d;   
						        } else {
						            var totald = (s * d) / 100;
						            var totalP = s - totald;
						        }

						        $(".totalamount").val(totalP);
						        $('.bill').val(totalP);

						    }

						    $(".disc").on('keyup', doStuff);
						    $(".discType").on('change', doStuff);
						    $('.SubTotal').on('keyup', doStuff());

						    function doIt() {

						        var ro  = 0;
						        var pa  = $('.pAmount').val();
						        var tp  = $('.totalamount').val();
						        var cal = (pa - tp);

						        if (cal > 0) {
						            $('.damount').val(ro);
						            $('.ramount').val(cal);
						        } else {
						            var bal = (tp - pa);
						            $('.ramount').val(ro);
						            $('.damount').val(bal); }
						    }

						    $(".pAmount").on('keyup', doIt);
						    $(".totalamount").on('change', doIt);
						    $(".disc").on('keyup', doIt);
						    $(".discType").on('change', doIt);
						    $('.SubTotal').on('keyup', doIt);
					    });

	                    $("table.order-list").on("click", ".ibtnDel", function (event) {
	                    	var item_total_amount = 0;
					        var sub_total = 0;
		                    $(this).closest("tr").remove();
		                    counter --;
		                    if(counter > 0){
		                    	$(".item_total").each(function(){
							        var item_total_amount = parseFloat($(this).val());
							        sub_total            += isNaN(item_total_amount) ? 0 : item_total_amount;
							        $('.bill').val(sub_total);
							        $('.subTotal').val(sub_total);
							    })
		                    }else{
		                    	$('.bill').val(0);
							    $('.subTotal').val(0);
		                    }
					        
		                });

	                    function doStuff() {
					        var d = $('.disc').val();
					        var s = $('.SubTotal').val();

					        if ($(".discType").children(":selected").attr("id") == 't') {   
					            var totalP = s - d;   
					        } else {
					            var totald = (s * d) / 100;
					            var totalP = s - totald;
					        }

					        $(".totalamount").val(totalP);
					        $('.bill').val(totalP);

					    }

					    $(".disc").on('keyup', doStuff);
					    $(".discType").on('change', doStuff);
					    $('.SubTotal').on('keyup', doStuff());

					    function doIt() {

					        var ro  = 0;
					        var pa  = $('.pAmount').val();
					        var tp  = $('.totalamount').val();
					        var cal = (pa - tp);

					        if (cal > 0) {
					            $('.damount').val(ro);
					            $('.ramount').val(cal);
					        } else {
					            var bal = (tp - pa);
					            $('.ramount').val(ro);
					            $('.damount').val(bal);
					            }
					    }

					    $(".pAmount").on('keyup', doIt);
					    $(".totalamount").on('change', doIt);
					    $(".disc").on('keyup', doIt);
					    $(".discType").on('change', doIt);
					    $('.SubTotal').on('keyup', doIt);

	                });

	                $('#medicine_row_'+counter).find('#code').val(response.getPrice.barcode);
	                $('#medicine_row_'+counter).find('#price').val(response.getPrice.manufacturer_price);
	            },
	            error: function(response) {
	            }
	        }); 
	    });
	});
</script>