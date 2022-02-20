<?php
$conn = conn();
$db   = new Database($conn);
?>
<h2 align="center">HASIL PERHITUNGAN PROFILE MATCHING</h2>

<h3>Calon Siswa</h3>
<table border="1" width="100%">
    <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Alamat</th>
    </tr>
    <?php foreach($siswa as $key => $s): ?>
    <tr>
        <td>A<?=$s->id?></td>
        <td><?=$s->nama?></td>
        <td><?=$s->alamat?></td>
    </tr>
    <?php endforeach ?>
</table>

<h3>Kriteria</h3>
<table border="1" width="100%">
    <tr>
        <th>#</th>
        <th>Kriteria</th>
        <th>Bobot</th>
    </tr>
    <?php foreach($kriterias as $kriteria): ?>
    <tr>
        <td>C<?=$kriteria->id?></td>
        <td><?=$kriteria->nama?></td>
        <td><?=$kriteria->bobot?></td>
    </tr>
    <?php endforeach ?>
</table>

<h3>Core Factor dan Secondary Factor</h3>
<table border="1" width="100%">
    <tr>
        <td>CF</td>
        <td>SF</td>
    </tr>
    <?php $factor = $db->single('faktor'); ?>
    <tr>
        <td><?=$fcf = $factor->cf?></td>
        <td><?=$fsf = $factor->sf?></td>
    </tr>
</table>

<h3>Jurusan</h3>
<?php foreach($jurusan as $j): ?>
<h4>Jurusan : <?=$j->nama?></h4>
<table border="1" width="100%">
    <tr>
        <td>#</td>
        <td>Kriteria</td>
        <td>Sebagai</td>
    </tr>
    <?php 
    foreach($j->factor as $factor): 
        $c = $db->single('kriteria',['id'=>$factor->id_kriteria]);
    ?>
    <tr>
        <td><?=$c->id?></td>
        <td><?=$c->nama?></td>
        <td><?=$factor->sebagai?></td>
    </tr>
    <?php endforeach ?>
</table>
<?php endforeach ?>

<h3>Peniliaian</h3>
<table border="1" width="100%">
    <tr>
        <th>Calon Siswa</th>
        <?php foreach($kriterias as $kriteria): ?>
        <th>C<?=$kriteria->id?></th>
        <?php endforeach ?>
    </tr>
    <?php 
    foreach($normalisasi_data as $id_calon_siswa => $kriteria): 
        echo '<tr><td>A'.$id_calon_siswa.'</td>';
        foreach($kriteria as $id_kriteria => $nilai):
    ?>
        <td style="text-align:center"><?=$nilai?></td>
        <?php endforeach ?>
    </tr>
    <?php endforeach ?>
    <tr>
        <td>GAP</td>
        <?php foreach($kriterias as $kriteria): ?>
        <th><?=$kriteria->bobot?></th>
        <?php endforeach ?>
    </tr>
    <?php 
    foreach($gaps as $id_calon_siswa => $kriteria): 
        echo '<tr><td>A'.$id_calon_siswa.'</td>';
        foreach($kriteria as $id_kriteria => $nilai):
    ?>
        <td style="text-align:center"><?=$nilai?></td>
        <?php endforeach ?>
    </tr>
    <?php endforeach ?>
</table>

<h3>Hasil Bobot Nilai GAP</h3>
<table border="1" width="100%">
    <tr>
        <th>Calon Siswa</th>
        <?php foreach($kriterias as $kriteria): ?>
        <th>C<?=$kriteria->id?></th>
        <?php endforeach ?>
    </tr>
    <?php 
    foreach($gap_results as $id_calon_siswa => $kriteria): 
        echo '<tr><td>A'.$id_calon_siswa.'</td>';
        foreach($kriteria as $id_kriteria => $nilai):
    ?>
        <td style="text-align:center"><?=$nilai?></td>
        <?php endforeach ?>
    </tr>
    <?php endforeach ?>
</table>

<h3>Hasil Perhitungan</h3>
<table border="1" width="100%">
    <tr>
        <th rowspan="2">Calon Siswa</th>
        <?php foreach($jurusan as $j): ?>
        <th colspan="3"><?=$j->nama?></th>
        <?php endforeach ?>
    </tr>
    <tr>
        <?php foreach($jurusan as $j): ?>
        <td>CF</td>
        <td>SF</td>
        <td>HASIL</td>
        <?php endforeach ?>
    </tr>
    <?php 
    foreach($gap_results as $id_calon_siswa => $kriteria): 
        echo '<tr><td>A'.$id_calon_siswa.'</td>';
        foreach($jurusan as $j):
            $cf = 0;
            $sf = 0;
            $ncf = 0;
            $nsf = 0;
            foreach($kriteria as $id_kriteria => $nilai):
                $j_factor = $db->single('faktor_jurusan',[
                    'id_kriteria' => $id_kriteria,
                    'id_jurusan' => $j->id,
                ]);
                if($j_factor->sebagai == 'cf')
                {
                    $cf += $nilai;
                    $ncf++;
                }
                if($j_factor->sebagai == 'sf')
                {
                    $sf += $nilai;
                    $nsf++;
                }
            endforeach;
            $cf = number_format($cf/$ncf,2);
            $sf = number_format($sf/$nsf,2);
            $hasil = number_format(($cf * $fcf/100) + ($sf * $fcf/100),2);
            echo '<td>'.$cf.'</td>';
            echo '<td>'.$sf.'</td>';
            echo '<td>'.$hasil.'</td>';
        endforeach;
        echo '</tr>';
    endforeach ?>
</table>
<script>
    window.print()
</script>