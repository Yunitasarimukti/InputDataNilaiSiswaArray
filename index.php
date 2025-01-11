<?php 

$rows=[
    [
      //array
    ]
];

// $nilai=[9, 10, 5, 6, 3, 1, 2, 3, 9, 9];

// // if(isset($_POST['submit'])){

// // }

// var_dump(sort($nilai));

 if(isset($_POST['btnOk'])){
     $nama=$_POST['nama'];
     $kelas=$_POST['kls'];
     $nilai=$_POST['nilai'];

     $data=$nama.'_'.$kelas.'_'.$nilai.'|';

     $file=
     fopen('nilai/n.txt', 'a');
     fwrite($file, $data);
     fclose($file);
 }
    
 $file=fopen('nilai/n.txt', 'r');
 $text= fread($file, filesize('nilai/n.txt'));
 $text=explode('|', $text);
for($i=0; $i<count($text)-1; $i++){
 $text[$i]=explode('_', $text[$i]);
 }
unset($text[count($text)-1]);
fclose($file);

$r=$text;

function ascending($r){
  $tmp=0;
 for($i=1; $i < count($r); $i++){
   for($j = count($r)-1; $j>= $i; $j--){
     if($r[$j][2] < $r[$j-1][2]){
       $tmp = $r[$j];
       $r[$j]=$r[$j-1];
       $r[$j-1]=$tmp;
     }
   }
 }
return $r;
}
function descending($r){
  $tmp=0;
 for($i=1; $i < count($r); $i++){
   for($j = count($r)-1; $j>= $i; $j--){
     if($r[$j][2] > $r[$j-1][2]){
       $tmp = $r[$j];
       $r[$j]=$r[$j-1];
       $r[$j-1]=$tmp;
     }
   }
 }
return $r;
}
if(isset($_POST['asc'])){
  $r=ascending($r);
}
if(isset($_POST['dsc'])){
  $r=descending($r);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>input nilai siswa</title>

    
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8"><h1>INPUT NILAI SISWA</h1>
        <form method="POST" name="datapribadi" action=""  class="form-group w-50 m mx-auto">
      <div class="form-group">
        <label for="exampleFormControlInput1">Nama</label>
        <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="isi nama asli....">
        <label for="exampleFormControlInput1">Jurusan/Kelas</label>
        <input type="text" class="form-control" name="kls" id="exampleFormControlInput2" placeholder="isi Kelas & Jurusan....">
        <label for="exampleFormControlInput1">Nilai</label>
        <input type="text" class="form-control" name="nilai" id="exampleFormControlInput2" placeholder="isi Nilai....">
      </div>
      <button type="submit" name="btnOk" class="btn btn-primary">Submit</button>
        
<button type="submit" name="asc" class="btn btn-success">Ascending</button>
<button type="submit" name="dsc" class="btn btn-success">Dascending</button>
</form>
      </div>
      <div class="container w-50">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Nilai</th>
            </tr>
        </thead>
  <tbody>
            <?php $i=1; ?>
            <?php foreach($r as $row): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row[0] ?></td>
                <td><?= $row[1] ?></td>
                <td><?= $row[2] ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
  </table>
  </div>

    </form>
        </div>          
        <div class="col-md-2"></div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

   </body>
</html>