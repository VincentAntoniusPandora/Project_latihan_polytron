<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="/addNewCompny/add" method="post">
    <?= csrf_field() ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- company name -->
            <h1>Add New Company</h1>
            <?php if (session()->has('errors')) : ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach (session('errors') as $error) : ?>
                <strong><?= esc($error) ?></strong>
                <br>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="formGroupExampleInput">Company Name</label>
                <input type="text" name="company_name" class="form-control" id="formGroupExampleInput"
                    placeholder="Enter new company name*" autofocus>
            </div>
            <br>

            <!-- phone number -->
            <div class="form-group">
                <label for="formGroupExampleInput">Phone Number</label>
                <div>
                    <input type="tel" name="company_phone" class="form-control" id="formGroupExampleInput"
                        placeholder="Enter new company phone number*">
                </div>
            </div>
            <br>

            <!-- address -->
            <div class="form-group">
                <label for="formGroupExampleInput">Address</label>
                <textarea type="text" name="company_address" class="form-control"
                    placeholder="Enter new company address*"></textarea>
            </div>
            <br>

            <button type="submit" class="btn" style="background-color: #990011
; color: white;"">Add Company</button>
            <a type=" submit" href="/" class="btn btn-outline"
                style="color:#990011; border:2px solid #990011">Cancel</a>
        </div>
    </div>
</form>
</body>

</html>
<?= $this->endSection(); ?>