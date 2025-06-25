<!DOCTYPE html>
<html>
<head>
    <title>Form Pesan</title>
</head>
<body>

    <h2>Form Pesan</h2>

    <form method="post" action="/pemweb_codeigniter/pesan/submit">
        <textarea name="isi_pesan" placeholder="Kotak pesan..." rows="5" cols="40"><?= old('isi_pesan') ?></textarea><br><br>
        <input type="submit" value="Kirim Pesan">
    </form>

    <hr>

    <h3>Pesan tampil:</h3>
    <p><?= isset($pesan) ? esc($pesan) : 'Belum ada pesan.' ?></p>

</body>
</html>
