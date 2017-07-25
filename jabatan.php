<html>
  <head>
    <title> Training Code List </title>
      <!-- Bootstrap CSS -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <!-- CSS and JS -->
      <link rel="stylesheet" type="text/css" href="assets/table.css" media="screen" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   <?php include "navbar.php"; ?>   

<body>

<!-- Tombol Menambahkan -->
  <form action='tambahjabatan.php' method='POST'>
    <table >
     <tr>
      <td> <input type='submit' name='tambah_jabatan' value='Tambah Jabatan'> </td> 
    </tr>
    </table>
  </form>

  <!-- tabel list jabatan -->
<table>
  <thead>
    <tr>
      <th colspan="5">List Jabatan</th>
    </tr>
    <tr>
      <th>No</th>
      <th>Kode Jabatan</th>
      <th>Nama Jabatan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>12345689</td>
      <td>General Manager</td>
      <td>
        <i class="material-icons button edit">edit</i>
        <i class="material-icons button delete">delete</i>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>0987654</td>
      <td>Senior Manager</td>
      <td>
        <i class="material-icons button edit">edit</i>
        <i class="material-icons button delete">delete</i>
      </td>
    </tr>
    <tr>
      <td>3</td>
      <td>7481692581</td>
      <td>Manager</td>
      <td>
        <i class="material-icons button edit">edit</i>
        <i class="material-icons button delete">delete</i>
      </td>
    </tr>
  </tbody>
</table>

</body>

</head>
</html>

<?php include "footer.php"; ?>