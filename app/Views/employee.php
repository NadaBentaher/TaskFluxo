<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(session()->getFlashdata('status'))
                {   ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong><?= session()->getFlashdata('status') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <?php 
                }
            ?>
            
        <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 text-center flex-grow-1">Employee Data</h3>
                    <a href="<?= base_url('employees/create') ?>" class="btn btn-success btn-md">Add</a>
                </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><i class="bi bi-hash"></i> ID</th>
                        <th scope="col"><i class="bi bi-person"></i> Name</th>
                        <th scope="col"><i class="bi bi-envelope-at"></i> Email</th>
                        <th scope="col"><i class="bi bi-telephone"></i> Phone</th>
                        <th scope="col"><i class="bi bi-building"></i> Department</th>
                        <th scope="col"><i class="bi bi-gear"></i> Action</th>
                    </tr>
                                </thead>
                    <tbody>
                        <?php if($employees):?>
                            <?php foreach($employees as $row) :  ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['Mobile_Number']; ?></td>
                                <td><?php echo $row['department']; ?></td>
                                <td>
                                    <a href="<?=base_url('employee/edit/'.$row['id'])?>" class="btn btn-info btn-sm">Edit</a>
                                    <!-- <a href="<?=base_url('employee/delete/'.$row['id'])?>" class="btn btn-danger btn-sm">Delete</a> -->
                                    <button type="button" value="<?= $row['id']; ?>" class="confirm_del_btn btn btn-danger btn-sm" >Delete</button>

                                </td>
                                <!-- <td>
                                    <button type="button" value="" class="confirm_del_btn btn btn-danger btn-sm" >Delete</button>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('scripts') ?>

<script>
    $(document).ready(function () {
        $('.confirm_del_btn').click(function(e) {
            e.preventDefault();
            var id = $(this).val();
            if (confirm('Are you sure you want to delete this data?')) {
                    //alert(id);
                $.ajax({
                url: "http://localhost/taskfluxo/employee/confirm-delete/" + id,
                success: function (response) {
                        window.location.reload();
                        alert("Data Deleted");
                    },
                // error: function (xhr, status, error) {
                //         console.log(xhr.responseText); // Vérifiez la console pour les erreurs
                //         alert("Error deleting data. Please try again."); // Message d'erreur générique
                //     }
               });
            }
        });
    });
</script>


<?= $this->endSection()?>
