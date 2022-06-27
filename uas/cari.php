<?php

   include("koneksi.php");
   
   // mengambil data dari $.ajax
   if(isset($_POST['input'])){
        $input = $_POST['input'];

        // simbol persen berfungsi untuk mengambil data semua karakter
        // $query = "SELECT * FROM shahih_bukhari WHERE id LIKE '%{$input}%' OR 
        //     kitab LIKE '%{$input}%' OR arab LIKE '%{$input}%' OR 
        //     terjemah LIKE '%{$input}%' LIMIT 100";
        $query = "SELECT * FROM shahih_bukhari WHERE MATCH (terjemah) AGAINST ('$input' IN NATURAL LANGUAGE MODE)";

        $result = mysqli_query($konekin, $query);

        // nomor dari rows di table database
        if(mysqli_num_rows($result) > 0){
            ?>

            <table class="table table-bordered table-striped mt-4" id="tabelku">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kitab</th>
                        <th>Arab</th>
                        <th>Terjemahan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    while($row = mysqli_fetch_assoc($result)){

                        // mengambil data dari database
                        $id = $row['id'];
                        $kitab = $row['kitab'];
                        $arab = $row['arab'];
                        $terjemah = $row['terjemah'];

                        ?>

                        <!-- menampilkan data dari database -->
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $kitab;?></td>
                            <td><?php echo $arab;?></td>
                            <td><?php echo $terjemah;?></td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>

           
            <?php
        }else{
            echo "<h5 class='text-danger text-center mt-3'>Data Tidak Ditemukan!</h5>";
        }
   }

?>