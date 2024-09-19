<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card mt-0">
          
                <div class="card-body">
                    <form method="post" action="<?= base_url('employee/update/'.$employee['id']) ?>">
                        <a href="<?= base_url('employees'); ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i>
                        </a>
                        <h1 class="text-center">Edit Employee</h1>
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="bi bi-person"></i> Name</label>
                            <input name="name" type="text" value="<?= $employee['name']; ?>" class="form-control" id="name"placeholder="Your Name" value="<?= old('name') ?>">
            
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="bi bi-envelope-at"></i> Email address</label>
                            <input name="email" type="email" value="<?= $employee['email']; ?>" class="form-control" id="email" placeholder="name@example.com" value="<?= old('email') ?>">
                           
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label"><i class="bi bi-lock"></i> Password</label>
                            <input name="password" type="password"  class="form-control"  id="password" placeholder="Leave blank to keep the current password">
                           
                        </div>

                        

                        <div class="mb-3">
                            <label for="Mobile_Number" class="form-label"><i class="bi bi-telephone"></i> Mobile number</label>
                            <input name="Mobile_Number" type="tel" value="<?= $employee['Mobile_Number']; ?>"  class="form-control" id="Mobile_Number" placeholder="phone number" value="<?= old('Mobile_Number') ?>">
                          
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label"><i class="bi bi-building"></i> department</label>
                            <input name="department" type="text" value="<?= $employee['department']; ?>" class="form-control" id="department" placeholder="the assigned department" value="<?= old('department') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label"><i class="bi bi-person-gear"></i> role</label>
                            <input name="role" type="text" class="form-control" value="<?= $employee['role']; ?>" id="role" placeholder="the assigned role" value="<?= old('role') ?>">
                        </div>

                        <div class="mb-3 text-center">
                            <input type="submit" value="update" class="btn btn-dark" />
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>