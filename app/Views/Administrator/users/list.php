<?php echo $this->extend('Shared/layout'); ?>

<?php echo $this->section('styles'); ?>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1>User Management</h1>
        </div>
    </div>

    <?php if (session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo session('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo session('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            <a href="/administrator/users/create" class="btn btn-primary btn-sm ms-auto">
                <i class="bi bi-plus-circle"></i> Add New User
            </a>
        </div>
        <div class="card-body">
            <?php if (!empty($users)): ?>
                <div class="table-responsive">
                    <table class="table table-hover" id="usersTable">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Group</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td><strong><?php echo esc($user->username); ?></strong></td>
                                    <td><?php echo esc($user->email); ?></td>
                                    <td>
                                        <?php 
                                            $name = '';
                                            if (!empty($user->first_name)) {
                                                $name .= esc($user->first_name);
                                            }
                                            if (!empty($user->last_name)) {
                                                $name .= ' ' . esc($user->last_name);
                                            }
                                            echo $name ?: '—';
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $userGroups = $user->getGroups();
                                            echo !empty($userGroups) ? esc(ucfirst($userGroups[0])) : '—';
                                        ?>
                                    </td>
                                    <td><?php echo date('M d, Y', strtotime($user->created_at)); ?></td>
                                    <td>
                                        <span class="badge <?php echo $user->active ? 'bg-success' : 'bg-danger'; ?>">
                                            <?php echo $user->active ? 'Active' : 'Inactive'; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="/administrator/users/edit/<?php echo $user->id; ?>" class="btn btn-outline-primary" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="/administrator/users/toggle/<?php echo $user->id; ?>" class="btn btn-outline-warning" title="Toggle Status">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </a>
                                            <a href="/administrator/users/delete/<?php echo $user->id; ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <?php echo $pager->links('users', 'default_full'); ?>
                </div>
            <?php else: ?>
                <p class="text-muted text-center py-5">No users found. <a href="/administrator/users/create">Create the first user</a></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            responsive: true,
            pageLength: 10,
            language: {
                search: "Filter records:"
            }
        });
    });
</script>
<?php echo $this->endSection(); ?>
