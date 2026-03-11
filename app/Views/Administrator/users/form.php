<?php echo $this->extend('Shared/layout'); ?>

<?php echo $this->section('content'); ?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <?php if (session()->has('errors')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                <?php foreach (session('errors') as $field => $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo $user ? '/administrator/users/update/' . $user->id : '/administrator/users/store'; ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php echo session('errors.username') ? 'is-invalid' : ''; ?>" 
                                       id="username" name="username" value="<?php echo old('username', $user->username ?? ''); ?>" required>
                                <?php if (session('errors.username')): ?>
                                    <div class="invalid-feedback d-block"><?php echo session('errors.username'); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control <?php echo session('errors.email') ? 'is-invalid' : ''; ?>" 
                                       id="email" name="email" value="<?php echo old('email', $user->email ?? ''); ?>" required>
                                <?php if (session('errors.email')): ?>
                                    <div class="invalid-feedback d-block"><?php echo session('errors.email'); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" 
                                       id="firstname" name="firstname" value="<?php echo old('firstname', $user->first_name ?? ''); ?>">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" 
                                       id="lastname" name="lastname" value="<?php echo old('lastname', $user->last_name ?? ''); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="group" class="form-label">User Group <span class="text-danger">*</span></label>
                            <select class="form-select <?php echo session('errors.group') ? 'is-invalid' : ''; ?>" id="group" name="group" required>
                                <option value="">Select a group</option>
                                <?php foreach ($groups as $key => $group): ?>
                                    <option value="<?php echo $key; ?>" <?php echo old('group', ($user ? ($user->getGroups()[0] ?? '') : '')) === $key ? 'selected' : ''; ?>>
                                        <?php echo $group['title']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (session('errors.group')): ?>
                                <div class="invalid-feedback d-block"><?php echo session('errors.group'); ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password <?php echo !$user ? '<span class="text-danger">*</span>' : ''; ?>
                                <?php if ($user): ?><small class="text-muted">(Leave blank to keep current password)</small><?php endif; ?>
                            </label>
                            <input type="password" class="form-control <?php echo session('errors.password') ? 'is-invalid' : ''; ?>" 
                                   id="password" name="password" <?php echo !$user ? 'required' : ''; ?>>
                            <?php if (session('errors.password')): ?>
                                <div class="invalid-feedback d-block"><?php echo session('errors.password'); ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <small class="text-muted">
                                <?php if (!$user): ?>
                                    Password must be at least 8 characters long.
                                <?php else: ?>
                                    If you want to change the password, enter a new one (minimum 8 characters). Otherwise, leave this field blank.
                                <?php endif; ?>
                            </small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                <?php echo $user ? 'Update User' : 'Create User'; ?>
                            </button>
                            <a href="/administrator/users" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-light">
                    <h6 class="m-0 font-weight-bold">Form Help</h6>
                </div>
                <div class="card-body">
                    <p><strong>Username:</strong> Must be unique and contain only alphanumeric characters and spaces.</p>
                    <p><strong>Email:</strong> Must be a valid email address and unique in the system.</p>
                    <p><strong>Password:</strong> Minimum 8 characters for security.</p>
                    <p class="text-muted mb-0"><small>Fields marked with * are required.</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
