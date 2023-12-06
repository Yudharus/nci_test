<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            margin: 5vh;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<button type="button" class="btn btn-success">Add data</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">id_prop</th>
      <th scope="col">nik</th>
      <th scope="col">nama</th>
      <th scope="col">id_prop</th>
      <th scope="col">nama_prop</th>
      <th scope="col">jumlah_penduduk</th>
    </tr>
  </thead>
  @foreach($data as $item)
  <tbody>
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->id_prop}}</td>
      <td>{{$item->nik}}</td>
      <td>{{$item->nama}}</td>
      <td>{{$item->id_prop}}</td>
      <td>{{$item->nama_prop}}</td>
      <td>{{$item->jumlah_penduduk}}</td>
      <td>
        <button type="button" id="delete" class="btn btn-danger" >Delete</button>
        <button type="button" class="btn btn-warning">Detail</button>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>
</body>
</html>
<script>

</script>