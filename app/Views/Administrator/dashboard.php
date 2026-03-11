<?= $this->extend('Shared/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-tachometer-alt me-2"></i>Administrator Dashboard</h5>
                </div>
                <div class="card-body">
                    <h4 class="mb-3">Welcome back, <?= esc($user->username ?? 'Admin') ?>!</h4>
                    <p class="text-muted">You are logged in as a <strong><?= esc($user->getGroups()[0] ?? 'N/A') ?></strong>.</p>
                    
                    <div class="row mt-4">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info p-3 rounded mb-3">
                                <div class="inner">
                                    <h3>System</h3>
                                    <p>Settings</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success p-3 rounded mb-3 text-white">
                                <div class="inner">
                                    <h3>Users</h3>
                                    <p>Management</p>
                                </div>
                                <div class="icon text-white-50">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
