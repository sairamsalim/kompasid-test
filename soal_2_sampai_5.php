<?php
//soal nomor 2
function soal_2(){
    $url = 'https://klasika.kompas.id/baca/inspiraksi-kemilau-perayaan-hut-ke-50-kompas/';
    $content = file_get_contents($url);;
    preg_match_all('#<p>(.+?)</p>#', $content, $matches);
    $cap_alphas = range('A', 'Z');
    $alphas = range('a', 'z');
    $final = array();

    foreach (count_chars($matches[1][0], 1) as $i => $val) {
        foreach($cap_alphas as $cap_alpha) {
            if(chr($i) == $cap_alpha) {
                $str = chr($i) . " = " . $val . "\n";
                array_push($final, $str);
            }
        }
        foreach($alphas as $alpha) {
            if(chr($i) == $alpha) {
                $str = chr($i) . " = " . $val . "\n";
                array_push($final, $str);
            }
        }
    }
    return $final;
}

//soal nomor 3
$query_1 = "SELECT COUNT(id) FROM Artikel WHERE Author_id = 1";
$query_2 = "SELECT LEN(body) - LEN(REPLACE(body, ' ', '')) + 1 FROM Artikel";
$query_3 = "SELECT Author_id, COUNT(*) AS Frequency FROM Artikel GROUP BY Author_id ORDER BY COUNT(*) DESC LIMIT 1";
$query_4 = "SELECT Artikel.judul as Judul, CONVERT(VARCHAR(33), `Artikel.Tanggal terbit`, 126) as Tanggal, meta.Meta_value as Meta_Value, meta.Meta_key as Meta_key FROM Artikel INNER JOIN Author ON Artikel.Author_id = Author.id INNER JOIN meta ON meta.Post_id = Artikel.id WHERE meta.Post_id = 1";
$query_5 = "SELECT * FROM Artikel ORDER BY `Tanggal terbit` ASC";
$query_6 = "SELECT COUNT(id) FROM Artikel WHERE `status` = 1";
$query_7 = "SELECT Author.Nama as Author, Artikel.judul as Judul, `Artikel.Tanggal terbit` as Tanggal, coalesce(meta.Meta_value, '-') as Photographer FROM Artikel LEFT JOIN Author ON Artikel.Author_id = Author.id INNER JOIN meta ON meta.Post_id = Artikel.id WHERE meta.Meta_key = 'Photographer'";
$query_8 = "SELECT Artikel.judul as Judul, CONVERT(VARCHAR(33), `Artikel.Tanggal terbit`, 126) as Tanggal, coalesce(meta.Meta_value, '-') as Meta_Value, meta.Meta_key as Meta_key FROM Artikel LEFT JOIN Author ON Artikel.Author_id = Author.id INNER JOIN meta ON meta.Post_id = Artikel.id WHERE meta.Meta_key = 'sponsor' OR meta.Meta_key = 'sumber'";
$query_9 = "SELECT AVG(`Page View`) FROM Artikel WHERE CONVERT(VARCHAR(33), `Artikel.Tanggal terbit`, 126) as Tanggal BETWEEN '2020-01-01T00:00:00.000' AND '2020-01-31T23:59:59.999'";

//soal nomor 4
$array_bilangan = [1,2,3,4,5,1,4,6,8,10];
//Jumlah (Sum) angka di dalam array
function soal_4_1($array_bilangan){
    $sum = 0;
    foreach($array_bilangan as $bilangan) {
        $sum += $bilangan;
    }
    return $sum;
}

//Berapa Jumlah angka berulang di dalam array tersebut
function soal_4_2($array_bilangan) {
    $jumlah_angka_berulang = 0;
    $bilangan_duplikat = array();
    for($i=0; $i < count($array_bilangan) - 1; $i++) {
        for($j=$i+1; $j < count($array_bilangan); $j++) {
            if($array_bilangan[$i] == $array_bilangan[$j]) {
                if(!in_array($array_bilangan[$i], $bilangan_duplikat)){
                    $jumlah_angka_berulang++;
                }
                array_push($bilangan_duplikat, $array_bilangan[$i]);
            }
        }
    }
    return $jumlah_angka_berulang;
}

//Hapus angka berulang di array tersebut sehingga menghasilkan 1,2,3,4,5,6,8,10
function soal_4_3($array_bilangan) {
    $bilangan_final = [$array_bilangan[0]];
    for($i=1; $i < count($array_bilangan); $i++) {
        if(!in_array($array_bilangan[$i], $bilangan_final)){
            array_push($bilangan_final, $array_bilangan[$i]);
        }
    }
    return $bilangan_final;
}

//Berapa jumlah bilangan genap di dalam array tersebut
function soal_4_4($array_bilangan) {
    $jumlah_genap = 0;
    foreach($array_bilangan as $bilangan) {
        if ($bilangan % 2 == 0) {
            $jumlah_genap++;
        }
    }
    return $jumlah_genap;
}

//Berapa jumlah bilangan fibonaci di dalam array tersebut
function soal_4_5($array_bilangan) {
    $jumlah_fibonacci = 0;
    foreach($array_bilangan as $bilangan) {
        $dRes1 = sqrt((5*pow($bilangan, 2))-4);
        $nRes1 = (int)$dRes1;
        $dDecPoint1 = $dRes1 - $nRes1;
        $dRes2 = sqrt((5*pow($bilangan, 2))+4);
        $nRes2 = (int)$dRes2;
        $dDecPoint2 = $dRes2 - $nRes2;
        if( !$dDecPoint1 || !$dDecPoint2 )
        {
            $jumlah_fibonacci++;
        }
    }
    return $jumlah_fibonacci;
}

//Jumlah angka berulang di array tersebut
//saya menganggap pertanyaan ini sama dengan soal 4.2
function soal_4_6($array_bilangan) {
    $jumlah_angka_berulang = 0;
    $bilangan_duplikat = array();
    for($i=0; $i < count($array_bilangan) - 1; $i++) {
        for($j=$i+1; $j < count($array_bilangan); $j++) {
            if($array_bilangan[$i] == $array_bilangan[$j]) {
                if(!in_array($array_bilangan[$i], $bilangan_duplikat)){
                    $jumlah_angka_berulang++;
                }
                array_push($bilangan_duplikat, $array_bilangan[$i]);
            }
        }
    }
    return $jumlah_angka_berulang;
}

//Urutkan angka di dalam array tersebut dari yang terbesar ke yang terkecil
function soal_4_7($array_bilangan) {
    $sorted_array = $array_bilangan;
    $count = count($array_bilangan);
    for ($i = 0; $i < $count; $i++) {
        for ($j = $i + 1; $j < $count; $j++) {
            if ($array_bilangan[$i] > $array_bilangan[$j]) {
                $temp = $sorted_array[$i];
                $sorted_array[$i] = $sorted_array[$j];
                $sorted_array[$j] = $temp;
            }
        }
    }
    return $sorted_array;
}

//soal nomor 5
//Buatlah 1 fungsi untuk memastikan bahwa password yang diinput user merupakan password yang kuat
function soal_5($password){
    $pattern = '^(?!.*?(.)\1{1,})(?=.*\d){2,}(?=.*[a-z]){5,}(?=.*[A-Z]){2,}(?=.*[!@#$%^&*()-+]){1,}.{10,20}$';
    if(preg_match($pattern, $password)) {
        return true;
    } else {
        return false;
    }
}
?>