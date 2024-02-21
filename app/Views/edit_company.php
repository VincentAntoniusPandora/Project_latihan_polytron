<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="/editCompny/update/<?= $edit['company_id']; ?>" method="post">
    <?= csrf_field() ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- company name -->
            <h1>Edit Company Details</h1>
            <div class="form-group ">
                <label for="formGroupExampleInput">Company Name</label>
                <input type="text" name="company_name" class="form-control" id="formGroupExampleInput" value="<?= $edit['company_name']; ?>">
            </div>
            <br>

            <!-- phone number -->
            <div class="form-group ">
                <label for="formGroupExampleInput">Phone Number</label>
                <input type="text" name="company_phone" class="form-control" id="formGroupExampleInput" value="<?= $edit['company_phone']; ?>">
            </div>
            <br>

            <!-- address -->
            <div class="form-group ">
                <label for="formGroupExampleInput">Address</label>
                <textarea type="text" name="company_address" class="form-control" id="formGroupExampleInput"><?= $edit['company_address']; ?></textarea>
            </div>
            <br>

            <button type="submit" class="btn" style="background-color: #990011
; color: white;">Save Changes</button>
            <a href="/" class="btn btn-outline" style="color:#990011; border:2px solid #990011">Discard
                Changes</a>
        </div>
    </div>
</form>
</body>

</html>
<?= $this->endSection(); ?>