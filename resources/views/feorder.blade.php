@extends('layout')
<style>
	table {
		display: block;
		overflow-x: auto;
		white-space: nowrap;
	}
	table tbody {
		display: table;
		width: 100%;
	}
	.custom-button[type="file"] {
		font-size : 10px;
		width : 100px
	}
	.custom-img{
		width : 100px
	}
</style>
@section('content')
	<div class="container">
		
    @if(isset($bantens))
		<h4>List item order :</h4>
		<br>
		<table class="table" style="font-size: 10px;" id="table_list_order">
			<thead>
				<th>No</th>
				<th width="12%">Order date</th>
				<th width="25%">Tgl Upakara</th>
				<th width="24%">Tgl Pengambilan</th>
				<th width="9%">Nama Banten</th>
				<th width="7%">Harga</th>
				<th width="25%">Qty</th>
				<th width="2%">Total</th>
			</thead>
			<tbody>
			@if(isset($bantens))
				@php 
					$i = 1; 
					$total = 0;
				@endphp
				@foreach($bantens as $banten)
				<tr data-baten = "{{$banten->id}}">
					<td>{{$i}}</td>
					<td>{{now()}}</td>
					<td><input type="text" name="" class="form-control tgl_upakara" placeholder="Pilih tanggal" value="{{$banten->tgl_upakara}}"></td>
					<td><input type="text" name="" class="form-control tgl_pengambilan" placeholder="Pilih tanggal" value="{{$banten->tgl_pengambilan}}"></td>
					<td>{{$banten->name}}</td>
					<td>{{ number_format($banten->harga,2) }}</td>
					<td><input type="number" name="" class="form-control qty" placeholder="qty banten" value="{{$banten->qty}}" data-harga="{{$banten->harga}}"></td>
					<td class="total_qty">0</td>
				</tr>
					@php 
						$i += 1; 
						$total += $banten->harga;
					@endphp
				@endforeach

			@endif
				
			</tbody>
			<tfoot>
				
			</tfoot>
		</table>

		<div class="form-group ">
    		<label>Notes:</label>
        		<textarea name="notes" class="form-control notes" rows="5" placeholder="Input Notes"></textarea>
        	
		</div>
		<br>
		<!-- <a href="{{route('fe.banten')}}" class="btn btn-primary btn-lg" type="button" id="btn_tambah">Tambah</a> -->
		<a href="javascript:;;" class="btn btn-primary btn-lg" type="button" id="btn_tambah">Tambah</a>
		<a href="javascript:;;" class="btn float-right btn-danger btn-lg" id="confirm_order" type="button">Confirm Order</a>


	</div>
	@else
		<h4>List order :</h4>
		<br>
		<div class="table-responsive">
		<table class="table" style="font-size: 10px;" id="table_list_order">
			<thead>
				<th>No</th>
				<th width="5%">Order #</th>
				<th width="5%">Order date</th>
				<th width="10%">Tgl Upakara</th>
				<th width="10%">Tgl Pengambilan</th>
				<th width="15%">Nama Banten</th>
				<th width="10%">Harga</th>
				<th width="5%">Qty</th>
				<th width="10%">Total</th>
				<th width="5%">Status</th>
				<th width="30%" style='text-align:center'>Bukti</th>
				<!-- <th>Bukti Bayar</th> -->
				
			</thead>
			<tbody>
			@if(isset($list_order))
				@php 
					$i = 1; 
					$total = 0;
				@endphp
				@foreach($list_order as $order)
				<tr data-id="{{$order->id}}">
					<td>{{$i}}</td>
					<td width="5%">{{'Order #'.$order->id}}</td>
					<td width="5%">{{$order->tgl_order}}</td>
					<td width="10%">{{$order->tgl_upakara}}</td>
					<td width="10%">{{$order->tgl_pengambilan}}</td>
					<td width="15%">{{$order->banten->name}}</td>
					<td width="10%">{{ $order->harga > 0 ? number_format($order->harga,2) : number_format($order->banten->harga,2) }}</td>
					<td width="5%">{{$order->qty}}</td>
					<td width="10%">{{number_format($order->harga * $order->qty,2)}}</td>
					<td width="5%">{{$order->status}}</td>
					@if($order->status == 'process')
						<td width="15%">
							<form method="post" action="{{route('fe.uploadbuktiperrow')}}" enctype="multipart/form-data">
							{{ csrf_field()}}
								<input type="hidden" name="order_id" value="{{$order->id}}">
								<input type="file" class="form-control img_detail custom-button" name="bukti_bayar_row">
							</form>
						</td>
						@if($order->bukti_bayar)
						<td width="15%">
							<a href="{{ isset($order->bukti_bayar) ? asset('uploads/'.$order->bukti_bayar) : '#'}}" target="_blank" class='btn btn-primary'>
								View
								<!-- <img src="{{ isset($order->bukti_bayar) ? asset('uploads/'.$order->bukti_bayar) : '#'}}"  class="src_image_prev_perrow custom-img "> -->
							</a>
						</td>
						@endif
					@endif
					<!-- <td width="30%">
						<label for="btn-img-{{$i}}" class="btn btn-primary">Bukti Bayar</label>
						<input id="btn-img-{{$i}}" type="file" name="bukti_bayar[]" style="visibility: hidden;" class="sel_image">
						<img src="#" id="src-img-{{$i}}" class="src_image_prev" width="50%">
					</td> -->

				</tr>
					@php 
						$i += 1;
						$total += ($order->harga > 0 ? $order->harga * $order->qty : $order->banten->harga * $order->qty);
					@endphp
				@endforeach
			@else
				<tr><td colspan="6" align="center">Tidak ada data order</td></tr>
			@endif
				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="8">Total harga</td>
					<td>Rp. {{number_format($total,2)}}</td>
				</tr>
			</tfoot>
		</table>
		</div>

		<br>
		<div>
			<a href="javascript:;;" id="history_btn"><h4>History Order :</h4></a>
			<table class="table" style="font-size: 18px;" id="table_history" hidden>
				<thead>
					<th width="5%">No</th>
					<th width="10%">Order #</th>
					<th width="12%">Order date</th>
					<th width="12%">Tgl Upakara</th>
					<th width="15%">Tgl Pengambilan</th>
					<th width="15%">Nama Banten</th>
					<th width="12%">Harga</th>
					<th width="5%">Qty</th>
					<th width="15%">Total</th>
					<th width="5%">Status</th>
					<th width="15%">Bukti</th>
					<!-- <th>Bukti Bayar</th> -->
					
				</thead>
				<tbody>
				@if(isset($history_order))
					@php 
						$i = 1; 
						$total = 0;
					@endphp
					@foreach($history_order as $order)
					<tr data-id="{{$order->id}}">
						<td>{{$i}}</td>
						<td>{{'Order #'.$order->id}}</td>
						<td>{{$order->tgl_order}}</td>
						<td>{{$order->tgl_upakara}}</td>
						<td>{{$order->tgl_pengambilan}}</td>
						<td>{{$order->banten->name}}</td>
						<td>{{ $order->harga > 0 ? number_format($order->harga,2) : number_format($order->banten->harga,2) }}</td>
						<td>{{$order->qty}}</td>
						<td>{{number_format($order->harga * $order->qty,2)}}</td>
						<td>{{$order->status}}</td>
						@if($order->status == 'process')
							<td>
								<form method="post" action="{{route('fe.uploadbuktiperrow')}}" enctype="multipart/form-data">
								{{ csrf_field()}}
									<input type="hidden" name="order_id" value="{{$order->id}}">
									<input type="file" class="form-control img_detail" name="bukti_bayar_row">
								</form>
							</td>
							@if($order->bukti_bayar)
							<td>
								<a href="{{ isset($order->bukti_bayar) ? asset('uploads/'.$order->bukti_bayar) : '#'}}" target="_blank">
								<img src="{{ isset($order->bukti_bayar) ? asset('uploads/'.$order->bukti_bayar) : '#'}}"  class="src_image_prev_perrow" width="50%">
								</a>
							</td>
							@endif
						@endif
						<!-- <td width="30%">
							<label for="btn-img-{{$i}}" class="btn btn-primary">Bukti Bayar</label>
							<input id="btn-img-{{$i}}" type="file" name="bukti_bayar[]" style="visibility: hidden;" class="sel_image">
							<img src="#" id="src-img-{{$i}}" class="src_image_prev" width="50%">
						</td> -->
	
					</tr>
						@php 
							$i += 1;
							$total += ($order->harga > 0 ? $order->harga * $order->qty : $order->banten->harga * $order->qty);
						@endphp
					@endforeach
				@else
					<tr><td colspan="6" align="center">Tidak ada data order</td></tr>
				@endif
					
				</tbody>
				<tfoot>
					<tr>
						<td colspan="8">Total harga</td>
						<td>Rp. {{number_format($total,2)}}</td>
					</tr>
				</tfoot>
			</table>

		</div>
		
		{{-- <div >
			<form method="post" action="{{route('fe.uploadbukti')}}" enctype="multipart/form-data" id="uploadbukti_form">
				{{ csrf_field()}}
				<input type="hidden" name="ids_order">
				<label for="bukti_bayar" class="btn btn-primary">Upload bukti bayar</label>
				<input type="file" name="bukti_bayar" id="bukti_bayar" style="visibility: hidden;" class="sel_image">
				@if(isset($bukti_bayar) && !empty($bukti_bayar))
					@php
						$images = $bukti_bayar->images;
					@endphp
				@endif
				<img src="{{ isset($images) ? asset('uploads/'.$images) : '#'}}" id="src-img-buktibayar" class="src_image_prev" width="50%">
			</form>
			@if($errors->any())
				<h4>{{$errors->first()}}</h4>
			@endif
		</div> --}}
	@endif

@stop

@section('otherscript')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn_tambah').click(function(){
				//generate array fisrt
				var objtable = $('#table_list_order tbody tr');
				var pendingorder = [];
				if(objtable.length > 0){
					$.each(objtable,function(){
						var banten_id = $(this).attr('data-baten');
						var tgl_upakara = $(this).find('.tgl_upakara').val();
						var qty = $(this).find('.qty').val();
						var tgl_pengambilan = $(this).find('.tgl_pengambilan').val();
						pendingorder.push({
							'banten_id' : banten_id,
							'tgl_upakara' : tgl_upakara,
							'tgl_pengambilan' : tgl_pengambilan,
							'qty_order' : qty
						})
					})
				}
				
				$.ajax({
			         type:'POST',
			         url:'{{route("fe.setpendingdate")}}',
			         data: {"_token": "{{ csrf_token() }}","data":pendingorder},
			         dataType: 'json',
			         success:function(data) {
			          
			          	window.location = "{{route('fe.banten') }}";
			          
			         }
			    });
			})

			$('.qty').keyup(function(){
				var qtyvalue = $(this).val();
				var harga = $(this).attr('data-harga');
				var objtd = $(this).closest('tr').find('.total_qty');
				$(objtd).text(qtyvalue * harga);

			})


			$('.tgl_upakara').datepicker({
			  autoclose: true,
			  format: 'yyyy-mm-dd',
			  defaultDate: new Date()
			});

			$('.tgl_pengambilan').datepicker({
			  autoclose: true,
			  format: 'yyyy-mm-dd',
			  defaultDate: new Date()
			});

			$('#confirm_order').click(function(){
				var objdate = $('.tgl_upakara');
				var empty_date = 0;
				if(objdate.length > 0){
					$.each(objdate,function(){
						if($(this).val() == ''){
							empty_date += 1;
						}
					})
				}
				if(empty_date > 0){
					$.alert('Silahkan tentukan tanggal upacara / pengambilan terlebih dahulu');
					return;
				}

				var dataform = {};
				var objdata = $('#table_list_order tbody tr');
				if(objdata.length > 0){
					var bantens = [];
					var pembeli = {!! Session::get('pembeli') !!};
					$.each(objdata,function(){
						bantens.push({
							'banten_id': $(this).attr('data-baten'),
							'tgl_upakara': $(this).find('.tgl_upakara').val(),
							'tgl_pengambilan': $(this).find('.tgl_pengambilan').val(),
							'qty': $(this).find('.qty').val()
						});
						// dataform['banten_id'] = $(this).attr('data-baten');
						// dataform['tgl_upakara'] = $(this).find('.tgl_upakara').val();
					})
					dataform['pembeli'] = pembeli.id;
					dataform['bantens'] = bantens;
					dataform['notes'] = $('[name="notes"]').val();
				}

				$.ajax({
			         type:'POST',
			         url:'{{route("fe.postorder")}}',
			         data: {"_token": "{{ csrf_token() }}","data":dataform},
			         dataType: 'json',
			         success:function(data) {
			          if(data.status){
			            window.location = data.redirect_url;
			          }
			         }
			    });
			})

			function readURL(input) {
			  if (input.files && input.files[0]) {
			    var reader = new FileReader();
			    
			    reader.onload = function(e) {
			      // var objsrc = $(input).closest('td').find('img'); //untuk multi image
			      // $(objsrc).attr('src', e.target.result);
			      $('#src-img-buktibayar').attr('src', e.target.result);
			    }
			    
			    reader.readAsDataURL(input.files[0]); // convert to base64 string
			  }
			}

			$(".sel_image").change(function() {
			  readURL(this);
			  //add data id to input
			  var order_ids = [];
			  var objtable = $('#table_list_order tbody tr');
			  if(objtable.length > 0 ){
			  	$.each(objtable, function(){
			  		var order_id = $(this).attr("data-id");
			  		order_ids.push(order_id);
			  	})
			  }
			  $('[name="ids_order"]').val(order_ids.join());
			  
			  setTimeout(function(){ 
			  	 $('#uploadbukti_form').submit();
			  }, 3000);

			});

			$(".img_detail").change(function(){
				var objform = $(this).closest('form');
				$(objform).submit();
			})

			$('#history_btn').click(function(){
				var table_attr = $('#table_history').attr('hidden');
				if(table_attr){
					$('#table_history').attr('hidden',false);
				}else{
					$('#table_history').attr('hidden',true);
				}
				
			})
		})

	</script>
@stop