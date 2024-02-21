<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="/addNewEmply/add/<?= $company_id ?>" method="post">
    <?= csrf_field() ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- employee name -->
            <h1>Add New Employee</h1>
            <?php if (session()->has('errors')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach (session('errors') as $error) : ?>
                        <strong><?= esc($error) ?></strong>
                        <br>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="form-group ">
                <label for="formGroupExampleInput">Employee Name</label>
                <input type="text" name="employee_name" class="form-control" id="formGroupExampleInput" placeholder="Enter new employee name*">
            </div>
            <br>

            <!-- gender -->
            <div class="form-group ">
                <label for="formGroupExampleInput">Gender</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="employee_gender" id="inlineRadio1" value="0">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="employee_gender" id="inlineRadio2" value="1">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
            </div>
            <br>

            <!-- birthday -->
            <div class="form-group ">
                <label for="formGroupExampleInput">Birthday</label>
                <input id="startDate" name="employee_birthday" class="form-control" type="date">
                <p style="font-size: 13px; color:#990011;">*Please Input Your Birthday Before Today's Date</p>
            </div>
            <script>
                let startDate = document.getElementById('startDate')

                startDate.addEventListener('change', (e) => {
                    let startDateVal = e.target.value
                    document.getElementById('startDateSelected').innerText = startDateVal
                })
            </script>
            <br>

            <!-- image -->
            <div class="mb-3">
                <label class="form-label">Image</label>
                <br>
                <input class="form-control" type="file" id="formFile" name="employee_picture" onchange="imageUpload(event)" hidden>
                <div class="container" style="position:relative; display:inline-block;">
                    <label type="btn" for="formFile" style="position:relative; display:inline-block;">
                        <img src="/img/add image.png" alt="" id="chg-img" width="100px" height="100px" style="cursor: pointer; border-radius: 20px; object-fit:cover;">
                        <i class="fa-solid fa-plus" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size:30px">
                        </i>
                    </label>
                </div>
            </div>

            <script>
                const imageUpload = (event) => {
                    const images = event.target.files;
                    const filesLength = images.length;
                    if (filesLength > 0) {
                        const imageSrc = URL.createObjectURL(images[0]);
                        const imagePreviewElement = document.querySelector("#chg-img");
                        imagePreviewElement.src = imageSrc;
                        imagePreviewElement.style.display = "block";
                    }
                };
            </script>

            <!-- phone number -->
            <div class="form-group ">
                <label for="formGroupExampleInput">Phone Number</label>
                <input type="text" name="employee_phone" class="form-control" id="formGroupExampleInput" placeholder="Enter new employee phone number*">
            </div>
            <br>

            <button type="submit" class="btn" style="background-color: #990011; color: white;">Add Employee</button>
            <a type="submit" href="/employeeList/<?= $company_id ?>" class="btn btn-outline" style="color:#990011; border:2px solid #990011">Cancel</a>
        </div>
    </div>
</form>
</body>

</html>
<?= $this->endSection(); ?>