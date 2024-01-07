<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Peminjaman</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>
<body>
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
    <div class="container">
        <?php if(Session::has('delete')): ?>
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <!-- <svg class="bi flex-shrink-0 me-1" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
                <div>
                    <?php echo e(Session::get('delete')); ?>

                </div>
            </div>
        <?php endif; ?>
        <?php if(Session::has('update')): ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <!-- <svg class="bi flex-shrink-0 me-1" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
                <div>
                    <?php echo e(Session::get('update')); ?>

                </div>
            </div>
        <?php endif; ?>
        <table class="table table-striped mt-3">
            <!-- Judul Tabel -->
            <thead>
                <tr>
                <th scope="col">ID Peminjaman</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Judul peminjaman</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Batas Pengembalian</th>
                <th scope="col">Status Peminjaman</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <!-- Isi Tabel -->
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peminjaman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <th scope="row"><?php echo e($peminjaman->id_peminjaman); ?></th>
                    <td><?php echo e($peminjaman->nama_anggota); ?></td>
                    <td><?php echo e($peminjaman->judul); ?></td>
                    <td><?php echo e($peminjaman->tanggal_peminjaman); ?></td>
                    <td><?php echo e($peminjaman->tanggal_pengembalian); ?></td>
                    <td><?php echo e($peminjaman->tanggal_harus_kembali); ?></td>
                    <td><?php echo e($peminjaman->status_pengembalian); ?></td>

                    <td>
                        <form action="/admin/peminjaman/editStatusPeminjaman" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="idPeminjaman" value="<?php echo e($peminjaman->id_peminjaman); ?>">
                            <input type="submit" value="Update">
                        </form>
                    </td>
                    </tr>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html><?php /**PATH /Users/bryant35/Desktop/peminjaman-buku-perpustakaan/resources/views/peminjaman/statusPeminjam.blade.php ENDPATH**/ ?>