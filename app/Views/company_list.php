<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col align-self-start">
            <h3 style="font-weight: bold;">Company List</h3>
        </div>
        <div class="col align-self-end text-end">
            <a type="submit" class="btn" href="/addNewCompny" style="background-color: #990011; color:white; right:55%"><i class="fa-solid fa-plus" style="color: white;"></i> New Company
            </a>
        </div>
    </div>
</div>

<div class="container">
    <?php if (!empty($message)) : ?>
        <div class="alert alert-danger" role="alert">
            <strong> <?= $message ?> </strong>
        </div>
    <?php endif; ?>
    <br>
    <div class="row mb-3">
        <div class="col-12">
            <div class="card" style="border-radius: 10px; border-color: #FCF6F5;">
                <div class="card-body">
                    <div class="row align-items-center" style="color: #A1A1A1;">
                        <div class="col-md-4">
                            <h6>Company Name</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Phone</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Address</h6>
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
                            <div class="col-md-4 d-flex align-items-center">
                                <img src="/img/2.jpg" alt="" width="50px" height="50px" style="border-radius: 8px;">
                                <br>
                                <h5 style="margin-left: 8px;"><?= $d['company_name'] ?></h5>
                            </div>
                            <div class="col-md-3">
                                <?php
                                $phone = $d['company_phone'];
                                $cut = sprintf(
                                    "%s-%s-%s",
                                    substr($phone, 1, 3),
                                    substr($phone, 4, 4),
                                    substr($phone, 8)
                                );
                                ?>
                                <h6>+62 <?= $cut ?></h6>
                            </div>
                            <div class="col-md-3">
                                <h6><?= $d['company_address'] ?></h6>
                            </div>
                            <div class="col-md-2" style="text-align: right;">
                                <a type="submit" href="/employeeList/<?= $d['company_id']; ?>" class="btn" style="background-color: #F18B97; color:white"><i class="fa-solid fa-user" style="color:white;"></i> Employee
                                    List</a>
                                <br>
                                <a class="btn" href="/editCompny/<?= $d['company_id']; ?>" style=" border: none; background:
                                none; padding: 0; margin: 0; color: blue;"><i class="fa-solid fa-pen" style="font-size: small;"></i> Edit</a> |
                                <form action="/removeCompny/<?= $d['company_id']; ?>" method="post" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn" style="border: none; background: none; padding: 0; margin: 0; color: red;" onclick=" return confirm('Yakin akan dihapus?');">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>

</html>
<?= $this->endSection(); ?>