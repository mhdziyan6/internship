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
            margin-bottom: 1rem;
        }
        .card-header {
            background-color: #003344;
            border-bottom: 1px solid #004455;
            border-radius: 8px 8px 0 0 !important;
        }
        .btn-primary {
            background-color: #008080;
            border: none;
        }
        #searchInput {
    color: white !important;
                    }

        #searchInput::placeholder {
         color: #ffffff !important; 
                        }

        .btn-primary:hover {
            background-color: #006666;
        }
        .table {
            color: #e0e0e0;
        }
        .table thead th {
            background-color: #003344;
            border-bottom: 2px solid #004455;
            color: #ffffff;
        }
        .table-hover tbody tr:hover {
            background-color: #002f3f;
        }
        .tag {
            display: inline-block;
            padding: 0.25em 0.6em;
            font-size: 0.75rem;
            font-weight: 500;
            line-height: 1;
            color: #fff;
            background-color: #008080;
            border-radius: 0.25rem;
            margin: 0.1rem;
        }
        .filter-section {
            background-color: #002733;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
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

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3">Contacts</h1>
                    <div>
                        <a href="/contacts/create" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add New Contact
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="filter-section">
                    <h5 class="mb-3">Filters</h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <select class="form-select" id="locationFilter">
                            <option value="">All Locations</option>
                            <option value="New York">New York</option>
                            <option value="Delhi">Delhi</option>
                            <option value="London">London</option>
                            <option value="Berlin">Berlin</option>
                            <option value="Tokyo">Tokyo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <div class="form-check">
                            <input class="form-check-input tag-filter" type="checkbox" value="Family" id="tag_Family">
                            <label class="form-check-label" for="tag_Family">Family</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input tag-filter" type="checkbox" value="Friends" id="tag_Friends">
                            <label class="form-check-label" for="tag_Friends">Friends</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input tag-filter" type="checkbox" value="Work" id="tag_Work">
                            <label class="form-check-label" for="tag_Work">Work</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search contacts...">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Job Position</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="contactsTable">
                                <?php foreach ($contacts as $row): ?>
                                <tr class="contact-row" data-location="<?= esc($row['location']) ?>" data-tags="<?= esc($row['tag'] ?? '') ?>">
                                    <td><?= esc($row['name']) ?></td>
                                    <td><?= esc($row['email']) ?></td>
                                    <td><?= esc($row['phone']) ?></td>
                                    <td><?= esc($row['address']) ?></td>
                                    <td><?= esc($row['location']) ?></td>
                                    <td><?= esc($row['job_position']) ?></td>
                                    <td>
                                        <?php if (!empty($row['tag'])): ?>
                                            <span class="tag"><?= esc($row['tag']) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const locationFilter = document.getElementById('locationFilter');
            const tagFilters = document.querySelectorAll('.tag-filter');
            
            function filterContacts() {
                const searchText = searchInput.value.toLowerCase();
                const selectedLocation = locationFilter.value;
                const selectedTags = Array.from(tagFilters)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);

                const rows = document.querySelectorAll('.contact-row');
                
                rows.forEach(row => {
                    const location = row.getAttribute('data-location');
                    const tags = row.getAttribute('data-tags');
                    
                    const matchesSearch = Array.from(row.children)
                        .some(cell => cell.textContent.toLowerCase().includes(searchText));
                    
                    const matchesLocation = !selectedLocation || location === selectedLocation;
                    
                    const matchesTags = selectedTags.length === 0 || 
                        selectedTags.some(tag => tags === tag);

                    row.style.display = (matchesSearch && matchesLocation && matchesTags) ? '' : 'none';
                });
            }

            searchInput.addEventListener('input', filterContacts);
            locationFilter.addEventListener('change', filterContacts);
            tagFilters.forEach(cb => cb.addEventListener('change', filterContacts));
        });
    </script>
</body>
</html>