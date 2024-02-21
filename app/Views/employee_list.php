<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <a class="btn" href="/" style="border: none; background: none; padding: 0; margin-bottom: 10px; color: #990011; font-size: 30px">
        <i class="fa-solid fa-arrow-left mr-2" style="color: #A1A1A1; font-size: 20px"></i>
        <?= $company_name['company_name']; ?>
    </a>
    <br>
    <div class="row">
        <div class="col align-self-start">
            <h3 style="font-weight: bold;">Employee List</h3>
        </div>
        <div class="col align-self-end text-end">
            <a type="submit" class="btn" href="/addNewEmply/<?= $company_id; ?>" style="background-color: #990011; color:white; right:55%"><i class="fa-solid fa-plus" style="color: white;"></i> New Employee
            </a>
        </div>
    </div>

    <!-- ajax -->
    <script>
        $(document).ready(function() {
            $('.detailButton').click(function() {
                var employeeId = $(this).data('employee-id');

                $.ajax({
                    url: '/employeeList/getEmployeeDetails/' + employeeId,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);

                        // membuat format tanggal menjadi dd/mm/yyyy
                        var birthday = response.employee_birthday;
                        var parts = birthday.split('-');
                        var formattedBirthday = parts[2] + '/' + parts[1] + '/' + parts[0];

                        if (response.employee_picture) {
                            var detailsEmployee = '<img src="/img/' + response
                                .employee_picture +
                                '" alt="..."  style="border-radius: 20px; object-fit:cover; width: 250px; height: 250px;">';
                        } else {
                            var detailsEmployee =
                                '<img src="/img/No_Image_Available.jpg" alt="" class="img-thumbnail" style="border-radius: 20px; object-fit:cover; width: 250px; height: 250px;">';
                        }

                        detailsEmployee +=
                            '<h4 style="color: #990011; margin-top: 10px;"><strong>' +
                            response.employee_name + '</strong></h4>';

                        let phone = response.employee_phone;
                        let cut =
                            `${phone.substring(1, 4)}-${phone.substring(4, 8)}-${phone.substring(8)}`;
                        detailsEmployee += '<p style="margin-top: 10px;"><strong>' + '+62 ' +
                            cut +
                            '</strong></p>';

                        detailsEmployee += '<p style="margin-top: -10px;">' + (response
                                .employee_gender == 0 ?
                                '<i class="fa-solid fa-mars"></i> Male' :
                                '<i class="fa-solid fa-venus"></i> Female') + ' | ' +
                            formattedBirthday + '</p>';

                        $('#employeeDetails').html(detailsEmployee);

                        // munculin detail employee di kanan
                        $('.col-md-12').removeClass('col-md-12').addClass('col-md-8');
                        $('#employeeDetailsContainer').removeClass('d-none');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error
                    }
                });
            });
            // hilangin detail employee di kanan
            $('#closeButton').click(function() {
                $('.col-md-8').removeClass('col-md-8').addClass('col-md-12');
                $('#employeeDetailsContainer').addClass('d-none');
            });
        });
    </script>
</div>

<div class="container">
    <br>
    <?php if (!empty($message)) : ?>
        <div class="alert alert-danger" role="alert">
            <strong> <?= $message ?> </strong>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card" style="border-radius: 10px; border-color: #FCF6F5;">
                        <div class="card-body">
                            <div class="row align-items-center" style="color: #A1A1A1;">
                                <div class="col-md-4">
                                    <h6>Employee Name</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Gender</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Birthday</h6>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($data as $d) : ?>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card" style="border-radius: 10px; border-color: #FCF6F5;">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <h5><?= $d['employee_name'] ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <?php if ($d['employee_gender'] == 0) {
                                            echo ('<h6>Male</h6>');
                                        } else {
                                            echo ('<h6>Female</h6>');
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-3">
                                        <h6><?= date('d/m/Y', strtotime($d['employee_birthday'])) ?></h6>
                                    </div>
                                    <div class="col-md-3" style="text-align: right;">
                                        <a class="btn detailButton" data-employee-id="<?= $d['employee_id']; ?>" style="background-color: #F18B97; color:white; width: 120px">
                                            <i class="fa-solid fa-user" style="color:white;"></i> Details
                                        </a>

                                        <br>
                                        <a class="btn" href="/editEmply/<?= $d['employee_id']; ?>" style="border: none; background: none; padding: 0; margin: 0; color: blue;"><i class="fa-solid fa-pen" style="font-size: small;"></i> Edit</a>
                                        |
                                        <form action="/removeEmply/<?= $d['employee_id']; ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn" style="border: none; background: none; padding: 0; margin: 0; color:red" onclick=" return confirm('Yakin akan dihapus?');">Remove</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-4 d-none" id="employeeDetailsContainer">
            <div class="card" style="width: 18rem; position: relative; border-color: #FCF6F5;">
                <div class="card-body">
                    <button id="closeButton" class="btn" style="position: absolute; top: 10px; right: 10px; border: none; background: none; padding: 0; margin: 0;">
                        <i class="fas fa-times-circle fa-lg" style="color: #B197FC;"></i>
                    </button>
                    <br>
                    <div id="employeeDetails"></div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
<?= $this->endSection(); ?>