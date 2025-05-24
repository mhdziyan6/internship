<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .address-tooltip {
            cursor: pointer;
        }
        .contact-row:hover {
            background-color: rgba(0,0,0,0.02);
        }
        .search-box {
            max-width: 300px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Address Book</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/contacts">View Contacts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Address Book</h1>
            <div>
                <a href="/contacts/export-pdf" class="btn btn-secondary me-2">
                    <i class="fas fa-file-pdf me-2"></i>Export PDF
                </a>
                <a href="/contacts/create" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Contact
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <input type="text" id="searchInput" class="form-control search-box" placeholder="Search contacts...">
                    </div>
                    <div class="col-auto">
                        <select id="locationFilter" class="form-select">
                            <option value="">All Locations</option>
                            <option value="New York">New York</option>
                            <option value="Delhi">Delhi</option>
                            <option value="London">London</option>
                            <option value="Berlin">Berlin</option>
                            <option value="Tokyo">Tokyo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
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
                        <tr class="contact-row">
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
        document.getElementById('locationFilter').addEventListener('change', filterContacts)

        function filterContacts() {
            const searchText = document.getElementById('searchInput').value.toLowerCase()
            const locationFilter = document.getElementById('locationFilter').value
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
                                    
                const matchesLocation = !locationFilter || location === locationFilter

                row.style.display = (matchesSearch && matchesLocation) ? '' : 'none'
            }
        }
    </script>
</body>
</html>