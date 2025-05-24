<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-user-plus me-2"></i>Add New Contact
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="/contacts/store" class="needs-validation" novalidate>
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control <?= (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" required minlength="3" maxlength="100" placeholder="John Doe">
                                <?php if (isset($validation) && $validation->hasError('name')): ?>
                                    <div class="invalid-feedback"><?= $validation->getError('name') ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control <?= (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= old('email') ?>" required maxlength="100" placeholder="john@example.com">
                                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" class="form-control <?= (isset($validation) && $validation->hasError('phone')) ? 'is-invalid' : '' ?>" value="<?= old('phone') ?>" required minlength="10" maxlength="20" placeholder="+1 (234) 567-8900">
                                    <?php if (isset($validation) && $validation->hasError('phone')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('phone') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control <?= (isset($validation) && $validation->hasError('address')) ? 'is-invalid' : '' ?>" rows="3" required minlength="10" placeholder="123 Main St, City, Country"><?= old('address') ?></textarea>
                                <?php if (isset($validation) && $validation->hasError('address')): ?>
                                    <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <select name="location" id="location" class="form-select <?= (isset($validation) && $validation->hasError('location')) ? 'is-invalid' : '' ?>" required>
                                        <option value="" disabled <?= !old('location') ? 'selected' : '' ?>>Select a location</option>
                                        <option value="New York" <?= old('location') == 'New York' ? 'selected' : '' ?>>New York</option>
                                        <option value="Delhi" <?= old('location') == 'Delhi' ? 'selected' : '' ?>>Delhi</option>
                                        <option value="London" <?= old('location') == 'London' ? 'selected' : '' ?>>London</option>
                                        <option value="Berlin" <?= old('location') == 'Berlin' ? 'selected' : '' ?>>Berlin</option>
                                        <option value="Tokyo" <?= old('location') == 'Tokyo' ? 'selected' : '' ?>>Tokyo</option>
                                    </select>
                                    <?php if (isset($validation) && $validation->hasError('location')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('location') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="job_position" class="form-label">Job Position</label>
                                    <input type="text" name="job_position" id="job_position" class="form-control <?= (isset($validation) && $validation->hasError('job_position')) ? 'is-invalid' : '' ?>" value="<?= old('job_position') ?>" required minlength="2" maxlength="100" placeholder="Software Engineer">
                                    <?php if (isset($validation) && $validation->hasError('job_position')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('job_position') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between pt-3">
                                <a href="/" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Back
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>Save Contact
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Client-side validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
    </script>
</body>
</html>