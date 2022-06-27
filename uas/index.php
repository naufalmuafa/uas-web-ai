<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hadits Bukhari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
        crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
    <div  class="container" style="max-width: 50%;">
        <div class="text-center mt-5 mb-4">
            <h2>Daftar Hadits Shahih Bukhari</h2>
        </div>

        <input type="text" class="form-control" id="cari" autocomplete="off" 
            placeholder="Silahkan Cari Hadits...">
    </div>

    <div id="pencarian"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">

        // membuat fungsi untuk memanggil id CARI
        $(document).ready(function(){
            $("#cari").keyup(function(){

                // membuat fungsi keyup, jadi jika client mengetik apapun di kolom 
                // pencarian akan di simpan ke variabel input dan ditampilkan menggunakan 
                // metode alert
                var input = $(this).val();
                //alert(input);

                // membuat fungsi ajax, jika client mengisi dikolom carian maka akan 
                // di alihkan ke file cari.php
                if(input != ""){
                    $.ajax({
                        url:"cari.php",
                        method:"POST",
                        data:{input:input},
                        
                        // menampilkan data dari halaman cari.php
                        success:function(data){
                            $("#pencarian").html(data);
                            $("#pencarian").css("display","block");
                        }
                    });
                }else{

                    //jika input ini kosong maka akan di sembunyikan
                    $("#pencarian").css("display","none");
                }
            });
        });

        $(document).ready( function () {
            $('#tabelku').DataTable();
        } );
    </script>
</body>
</html>