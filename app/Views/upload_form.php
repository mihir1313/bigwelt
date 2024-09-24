<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
          .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
    <div class="container mt-5">
        <div class="button-container">
            <a href="<?= site_url('details') ?>" class="btn btn-secondary">Back</a>
            <a href="<?= site_url('apidetail') ?>" class="btn btn-primary">Api</a>
        </div>
        <h2>Upload Files</h2>
        <!-- <a href="<?= site_url('apidetail') ?>" class="btn btn-primary top-right">Api</a>
        <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary" style="margin-left: 10px;">Back</a> -->
        <form action="<?= site_url('upload') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <input type="file" name="files[]" multiple class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>
