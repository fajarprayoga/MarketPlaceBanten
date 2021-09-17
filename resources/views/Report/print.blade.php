<!DOCTYPE html>
<html>
<head>
	<title>Pemasaran Saran Upakara</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 7pt;
		}
	</style>
	<div style="text-align : center">
		<h5>Laporan Order </h4>
		<h6><a target="_blank" href="{{ url('/') }}">Pemasaran Sarana Upakara</a></h5>
	</div>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Banten</th>
				<th>Tanggal Pemesanan</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody style="font-size: 7pt">
			@foreach ($orders as $key => $order)
				<td>{{ $key + 1 }}</td>
				<td>{{ ucwords($order->pembeli->name) }}</td>
				<td>{{ ucwords($order->pembeli->email) }}</td>
				<td>{{ ucwords($order->banten->name) }}</td>
				<td>{{ $order->created_at }}</td>
				<td>{{ Rupiah($order->harga )}}</td>
				<td>{{ (int)$order->qty }}</td>
				<td>{{ ucwords($order->status)}}</td>
			@endforeach
		</tbody>
	</table>

</body>
</html>