<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(1, 5, 29);
            color: #e0e0e0;
        }
        .navbar-dark .navbar-brand {
            color: #ffffff;
        }
        .card {
            background-color: #1e1e1e;
            color: #e0e0e0;
        }
        .card-header {
            background-color: #0d6efd;
        }
        .form-control, .form-select {
            background-color:rgb(255, 255, 255);
            color: #ffffff;
            border: 1px solid #444;
        }
        .form-control::placeholder {
            color: #aaaaaa;
        }
        .form-select option {
            background-color: #2c2c2c;
        }
        .table {
            color: brown;
            width: 100%; 
            border-collapse: collapse;
             max-width: 100%;
        }
        .table thead {
            background-color: #333;
            color: #ffffff;
        }
        .contact-row:hover {
            background-color: #2a2a2a;
        }
        .btn-outline-primary {
            border-color: #0d6efd;
            color: #0d6efd;
        }
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: #fff;
        }
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }
        .btn-outline-info {
            border-color: #17a2b8;
            color: #17a2b8;
        }
        .btn-outline-info:hover {
            background-color: #17a2b8;
            color: #fff;
        }
        
    </style>
</head>
<body>
    

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Address Book</h1>
            <div class="d-flex">
                <a href="/contacts/create" class="btn btn-primary me-2">
                    <i class="fas fa-plus me-2"></i>Add New Contact
                </a>
                <button class="btn btn-outline-info me-2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-filter me-2"></i>Filter by Location
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-location="New York">New York</a></li>
                    <li><a class="dropdown-item" href="#" data-location="Delhi">Delhi</a></li>
                    <li><a class="dropdown-item" href="#" data-location="London">London</a></li>
                    <li><a class="dropdown-item" href="#" data-location="Berlin">Berlin</a></li>
                    <li><a class="dropdown-item" href="#" data-location="Tokyo">Tokyo</a></li>
                </ul>
                <button class="btn btn-outline-primary" id="searchBtn">
                    <i class="fas fa-search me-2"></i>Search
                </button>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search contacts...">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Job Position</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="contactsTable">
                        <?php foreach ($contacts as $row): ?>
                        <tr class="contact-row" data-location="<?= esc($row['location']) ?>">
                            <td class="align-middle"><?= esc($row['name']) ?></td>
                            <td class="align-middle"><?= esc($row['email']) ?></td>
                            <td class="align-middle"><?= esc($row['phone']) ?></td>
                            <td class="align-middle"><?= esc($row['location']) ?></td>
                            <td class="align-middle"><?= esc($row['job_position']) ?></td>
                            <td class="align-middle">
                                <span class="address-tooltip" 
                                      data-bs-toggle="tooltip" 
                                      data-bs-placement="top" 
                                      title="<?= esc($row['address']) ?>">
                                    <?= substr(esc($row['address']), 0, 20) ?>...
                                </span>
                            </td>
                            <td class="align-middle">
                                <div class="btn-group" role="group">
                                    <a href="/contacts/edit/<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/contacts/delete/<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('Are you sure you want to delete this contact?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', filterContacts)
        document.getElementById('searchBtn').addEventListener('click', filterContacts)

        function filterContacts() {
            const searchText = document.getElementById('searchInput').value.toLowerCase()
            const rows = document.getElementById('contactsTable').getElementsByTagName('tr')

            for (let row of rows) {
                const name = row.cells[0].textContent.toLowerCase()
                const email = row.cells[1].textContent.toLowerCase()
                const phone = row.cells[2].textContent.toLowerCase()
                const location = row.cells[3].textContent
                const jobPosition = row.cells[4].textContent.toLowerCase()
                
                const matchesSearch = name.includes(searchText) || 
                                    email.includes(searchText) || 
                                    phone.includes(searchText) ||
                                    jobPosition.includes(searchText)

                row.style.display = matchesSearch ? '' : 'none'
            }
        }

        // Filter by location
        const locationFilterButtons = document.querySelectorAll('.dropdown-item')
        locationFilterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const selectedLocation = this.getAttribute('data-location')
                const rows = document.getElementById('contactsTable').getElementsByTagName('tr')

                for (let row of rows) {
                    const location = row.getAttribute('data-location')

                    if (selectedLocation && location !== selectedLocation) {
                        row.style.display = 'none'
                    } else {
                        row.style.display = ''
                    }
                }
            })
        })
    </script>
</body>
</html>
