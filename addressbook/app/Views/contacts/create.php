<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #001f2d;
            color: #e0e0e0;
        }
        .card-title {
    color: white !important; /* This makes the font color white */
            }
            h1, h2, h3, h4, h5, h6 {
    color: white !important;
                }
                label {
    color: white !important;
                    }
        .navbar {
            background-color: #003344;
            box-shadow: 0 2px 4px rgba(0,0,0,.2);
        }
        .navbar-brand {
            color: #ffffff !important;
            font-weight: 600;
        }
        .card {
            background-color: #002733;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,.2);
            border-radius: 8px;
        }
        .card-header {
            background-color: #003344;
            border-bottom: 1px solid #004455;
            border-radius: 8px 8px 0 0 !important;
        }
        .form-control, .form-select {
            background-color: #001f2d;
            color: #ffffff;
            border: 1px solid #004455;
        }
        .form-control::placeholder {
            color: #aaaaaa;
        }
        .form-control:focus, .form-select:focus {
            background-color: #001f2d;
            border-color: #008080;
            box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.25);
            color: #ffffff;
        }
        .form-select option {
            background-color: #001f2d;
        }
        .btn-success {
            background-color: #008080;
            border: none;
        }
        .btn-success:hover {
            background-color: #006666;
        }
        .btn-outline-secondary {
            color: #008080;
            border-color: #008080;
        }
        .btn-outline-secondary:hover {
            background-color: #008080;
            color: #ffffff;
        }
        .home-btn {
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .home-btn:hover {
            color: #008080;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a href="/" class="home-btn">
                <i class="fas fa-home"></i>
                Home
            </a>
            <a class="navbar-brand ms-4" href="/contacts">Address Book</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-user-plus me-2"></i>Add New Contact
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="/contacts/store" class="needs-validation" novalidate>
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control <?= (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : '' ?>" value="<?= old('name') ?>" required minlength="3" maxlength="100" placeholder="Add your name">
                                <?php if (isset($validation) && $validation->hasError('name')): ?>
                                    <div class="invalid-feedback"><?= $validation->getError('name') ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control <?= (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= old('email') ?>" required maxlength="100" placeholder="abc@gmail.com">
                                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" class="form-control <?= (isset($validation) && $validation->hasError('phone')) ? 'is-invalid' : '' ?>" value="<?= old('phone') ?>" required minlength="10" maxlength="20" placeholder="+974 76299302">
                                    <?php if (isset($validation) && $validation->hasError('phone')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('phone') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control <?= (isset($validation) && $validation->hasError('address')) ? 'is-invalid' : '' ?>" rows="3" required minlength="10" placeholder="88 Al Sadd Street"><?= old('address') ?></textarea>
                                <?php if (isset($validation) && $validation->hasError('address')): ?>
                                    <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
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

                                <div class="col-md-4 mb-3">
                                    <label for="job_position" class="form-label">Job Position</label>
                                    <input type="text" name="job_position" id="job_position" class="form-control <?= (isset($validation) && $validation->hasError('job_position')) ? 'is-invalid' : '' ?>" value="<?= old('job_position') ?>" required minlength="2" maxlength="100" placeholder="Software Engineer">
                                    <?php if (isset($validation) && $validation->hasError('job_position')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('job_position') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="tag" class="form-label">Category</label>
                                    <select name="tag" id="tag" class="form-select <?= (isset($validation) && $validation->hasError('tag')) ? 'is-invalid' : '' ?>" required>
                                        <option value="" disabled <?= !old('tag') ? 'selected' : '' ?>>Select a category</option>
                                        <option value="Family" <?= old('tag') == 'Family' ? 'selected' : '' ?>>Family</option>
                                        <option value="Work" <?= old('tag') == 'Work' ? 'selected' : '' ?>>Work</option>
                                        <option value="Friends" <?= old('tag') == 'Friends' ? 'selected' : '' ?>>Friends</option>
                                    </select>
                                    <?php if (isset($validation) && $validation->hasError('tag')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('tag') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between pt-3">
                                <a href="/contacts" class="btn btn-outline-secondary">
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