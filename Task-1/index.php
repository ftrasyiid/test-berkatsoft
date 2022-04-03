<?php
    /** 
     * Memerikas apakah semua huruf pada kata pertama terdapat pada kata kedua.
     * 
     * @param string $firstword Kata pertama yang ingin diperiksa.
     * @param string $secondword Kata kedua yang merupakan referensi pemeriksaan
     * 
     * @return boolean
     */
    function containLetters(string $firstword, string $secondword) {
        $firstword = strtolower($firstword);
        $secondword = strtolower($secondword) ;
        $countFirstword = mb_strlen( $firstword );
        $countsecondword = mb_strlen( $secondword );
        if( $countFirstword == 0 || $countsecondword == 0){
            return false;
        }
        $matchletter = 0;
        for( $i = 0; $i < $countFirstword; $i++ ){
            for( $j = 0; $j < $countsecondword; $j++ ){
                $matchletter += $firstword[$i] === $secondword[$j]? 1: 0;
            }
        }
        return $matchletter >= $countFirstword;
    }
    $firstword = isset( $_POST['firstword'] )? $_POST['firstword']: false;
    $secondword = isset( $_POST['secondword'] )? $_POST['secondword']: false;
    $iscontainLetters = containLetters( $firstword, $secondword );
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="firstword" id="firstword" placeholder="Kata Pertama" value="<?= $firstword ?>" required />
        <input type="text" name="secondword" id="secondword" placeholder="Kata Kedua" value="<?= $secondword ?>" required />
        <button type="submit">Periksa</button>
    </form>
    <?php if( $firstword && $secondword ): ?>
        <p>Apakah semua huruf pada "<?= $firstword ?>" terkandung dalam "<?= $secondword ?>"?</p>
        <h2><?= $iscontainLetters? 'TRUE': 'FALSE' ?></h2>
    <?php endif; ?>
</body>
</html>