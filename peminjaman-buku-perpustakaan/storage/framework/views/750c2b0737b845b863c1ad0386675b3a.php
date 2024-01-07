<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>
<body>
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <?php if(Session::has('admin')): ?>
        <a class="btn btn-primary" href="/admin/koleksi/tambah">Tambah Buku</a>
        <?php endif; ?>
        <table class="table table-striped mt-3">
            <!-- Judul Tabel -->
            <thead>
                <tr>
                    <?php if(Session::has('admin')): ?>
                        <th scope="col">ID</th>
                    <?php endif; ?>
                <th scope="col">Judul</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Rak</th>
                <th scope="col">Stok</th>
                <th scope="col">Foto Buku</th>
                <?php if(Session::has('admin')): ?>
                <th scope="col"></th>
                <?php endif; ?>
            </tr>
            </thead>
            <!-- Isi Tabel -->
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <?php if(Session::has('admin')): ?>
                    <th scope="row"><?php echo e($buku->id_buku); ?></th>
                    <?php endif; ?>
                    <td><?php echo e($buku->judul); ?></td>
                    <td><?php echo e($buku->pengarang); ?></td>
                    <td><?php echo e($buku->penerbit); ?></td>
                    <td><?php echo e($buku->tahun_terbit); ?></td>
                    <td><?php echo e($buku->Rak); ?></td>
                    <td><?php echo e($buku->stok); ?></td>
                    <td><img src="<?php echo e($buku->image_path); ?>"></img></td>
                    <?php if(Session::has('admin')): ?>
                    <td>
                        <form action="/admin/koleksi/edit" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="idBuku" value="<?php echo e($buku->id_buku); ?>">
                            <input type="submit" value="Update">
                        </form>
                    </td>
                    <?php endif; ?>
                    </tr>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html><?php /**PATH /Users/bryant35/Desktop/peminjaman-buku-perpustakaan/resources/views/koleksi/listBuku.blade.php ENDPATH**/ ?>