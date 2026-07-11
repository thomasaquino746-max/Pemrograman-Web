<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table,th,td{
            border:1px solid black;
        }

        th,td{
            padding:8px;
        }

        h2{
            text-align:center;
        }

    </style>

</head>

<body>

<h2>Laporan Barang Masuk</h2>

<table>

<thead>

<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Produk</th>
    <th>Qty</th>
    <th>Supplier</th>
</tr>

</thead>

<tbody>

@foreach($incomingProducts as $item)

<tr>

<td>{{ $loop->iteration }}</td>
<td>{{ $item->date }}</td>
<td>{{ $item->product->name }}</td>
<td>{{ $item->qty }}</td>
<td>{{ $item->supplier }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>