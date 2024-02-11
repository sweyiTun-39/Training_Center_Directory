<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>
	<h2>File Upload</h2>
	<hr>
	<a href="{{route('file.create')}}"><button type="submit" style="margin-left: 180px;">Upload</button></a>
	<br>
	<br>
	<table border="1" cellspacing="0" cellpadding="20">
		<thead>
			<tr>
				<td>No.</td>
				<td>File Name</td>
			</tr>
		</thead>
		@php $i=1 @endphp
		@foreach($file as $file)
		<tbody>
			<tr>
				<td>{{$i++}}</td>
				<td>{{$file->filename}}</td>
			</tr>
		</tbody>
		@endforeach
	</table>
</body>
</html>