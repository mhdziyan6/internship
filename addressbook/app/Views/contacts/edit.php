<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #001f2d;
            color: #e0e0e0;
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
        .form-control:focus, .form-select:focus {
            background-color: #001f2d;
            border-color: #008080;
            box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.25);
            color: #ffffff;
        }
        .btn-primary {
            background-color: #008080;
            border: none;
        }
        .btn-primary:hover {
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
        .card-title, label {
    color: white !important;
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

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-user-edit me-2"></i>Edit Contact
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="/contacts/update/<?= $contact['id'] ?>" class="needs-validation" novalidate>
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control <?= (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : '' ?>" value="<?= old('name', $contact['name']) ?>" required>
                                <?php if (isset($validation) && $validation->hasError('name')): ?>
                                    <div class="invalid-feedback"><?= $validation->getError('name') ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control <?= (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : '' ?>" value="<?= old('email', $contact['email']) ?>" required>
                                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('email') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" class="form-control <?= (isset($validation) && $validation->hasError('phone')) ? 'is-invalid' : '' ?>" value="<?= old('phone', $contact['phone']) ?>" required>
                                    <?php if (isset($validation) && $validation->hasError('phone')): ?>
                                        <div class="invalid-feedback"><?= $validation->getError('phone') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control <?= (isset($validation) && $validation->hasError('address')) ? 'is-invalid' : '' ?>" rows="3" required><?= old('address', $contact['address']) ?></textarea>
                                <?php if (isset($validation) && $validation->hasError('address')): ?>
                                    <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <select name="location" id="location" class="form-select <?= (isset($validation) && $validation->hasError('location')) ? 'is-invalid' : '' ?>" required>
                                        <option value="New York" <?= old('location', $contact['location']) == 'New York' ? 'selected' : '' ?>>New York</option>
                                        <option value="Delhi" <?= old('location', $contact['location']) == 'Delhi' ? 'selected' : '' ?>>Delhi</option>
                                        <option value="London" <?= old('location', $contact['location']) == 'London' ? 'selected' : '' ?>>London</option>
                                        <option value="Berlin" <?= old('location', $contact['location']) == 'Berlin' ? 'selected' : '' ?>>Berlin</option>
                                        <option value="Tokyo" <?= old('location', $contact['location']) == 'Tokyo' ? 'selected' : '' ?>>Tokyo</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="job_position" class="form-label">Job Position</label>
                                    <input type="text" name="job_position" id="job_position" class="form-control <?= (isset($validation) && $validation->hasError('job_position')) ? 'is-invalid' : '' ?>" value="<?= old('job_position', $contact['job_position']) ?>" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="tag" class="form-label">Category</label>
                                    <select name="tag" id="tag" class="form-select">
                                        <option value="Family" <?= (old('tag', $contact['tag'] ?? '') == 'Family') ? 'selected' : '' ?>>Family</option>
                                        <option value="Friends" <?= (old('tag', $contact['tag'] ?? '') == 'Friends') ? 'selected' : '' ?>>Friends</option>
                                        <option value="Work" <?= (old('tag', $contact['tag'] ?? '') == 'Work') ? 'selected' : '' ?>>Work</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between pt-3">
                                <a href="/contacts" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Back
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update Contact
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>