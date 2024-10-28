<!-- app/views/user/index.php -->
<h2>Daftar Pengguna</h2>
<a href="/user/create">Tambah Pengguna Baru</a>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?= htmlspecialchars($user['name']) ?> - <?= htmlspecialchars($user['email']) ?></li>
    <?php endforeach; ?>
</ul>
