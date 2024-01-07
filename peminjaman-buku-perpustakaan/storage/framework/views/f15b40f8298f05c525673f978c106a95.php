<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pinjam</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>
<body>
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <form action="/admin/peminjaman/daftarPinjam" method="POST" class="mt-3">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
            <label for="" class="form-label">Judul Buku</label>
            <input type="text" name="JudulBuku" style="background-color: #F4F9FF;" list="idLIST" id="id_buku" class="form-control dropbtn bg-body" placeholder="Cari Judul Buku">
                <datalist id="idLIST">
                    <?php $__currentLoopData = $dataBuku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($buku->id_buku); ?> - <?php echo e($buku->judul); ?>"></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </datalist>
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Nama Anggota</label>
            <input type="text" name="id_Anggota" style="background-color: #F4F9FF;" list="idAnggota" id="id_anggota" class="form-control dropbtn bg-body" placeholder="Cari Anggota">
                <datalist id="idAnggota">
                    <?php $__currentLoopData = $dataAnggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anggota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($anggota->id_anggota); ?> - <?php echo e($anggota->nama_anggota); ?>"></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </datalist>
            </div>
            <div class="mb-3">
                <label for="pinjamDate" class="form-label">Tanggal Peminjaman</label>
                <input type="date" class="form-control" onchange="pinjamDate()" id="pinjamDate" name="tanggalPinjam" aria-describedby="tenggatInfo"  value="<?php echo e(now()->toDateString()); ?>">
                <div id="tenggatInfo" class="form-text">Tenggat waktu pengembalian adalah 7 hari</div>
            </div>
            <?php if(Session::has('empty')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <!-- <svg class="bi flex-shrink-0 me-1" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
                <div>
                    <?php echo e(Session::get('empty')); ?>

                </div>
            </div>
            <?php elseif(Session::has('kosong')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <!-- <svg class="bi flex-shrink-0 me-1" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
                <div>
                    <?php echo e(Session::get('kosong')); ?>

                </div>
            </div>
            <?php elseif(Session::has('success')): ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <!-- <svg class="bi flex-shrink-0 me-1" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> -->
                <div>
                    <?php echo e(Session::get('success')); ?>

                </div>
            </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary" name="submit" value="Save">Save</button>
            <button type="reset" class="btn btn-outline-danger" name="reset">Reset</button>
        </form>
    </div>
</body>
</html><?php /**PATH /Users/bryant35/Desktop/peminjaman-buku-perpustakaan/resources/views/peminjaman/pinjam.blade.php ENDPATH**/ ?>