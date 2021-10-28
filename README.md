## PANDUAN PENGGUNAAN

1. Tambahkan directory project pada setting/function.php (misal D:/xampp/htdocs/projectmu/ maka cukup isi /projectmu)
2. Masukan route pada index.php ($route->get('url', 'nama_controller', 'nama_fungsi')
3. Pada controllel buat function yang diinginkan
4. Isi dengan require_once('nama_file_yang_ingin_ditampilkan.php')
5. Jika ingin menggunakan fungsi

## FUNGSI YANG TERSEDIA

1. all('nama_tabel', 'query_tambahan') = Mengambil semua data dari database
2. create()
3. delete()
4. update()

## CARA PENGGUNAAN create()

1. Buat route baru dengan ketentuan /bebas?table=nama_table
2. Lalu pada form action, masukan sama persis dengan route yang tadi dibuat

## TODO LIST

1. Jika mengatur project_location, user harus manual ke function.php dan atur sendiri (SOLVED)
