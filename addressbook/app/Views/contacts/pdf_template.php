<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Address Book Contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            border-bottom: 2px solid #333;
        }
        .contact {
            margin-bottom: 25px;
            padding: 15px;
            border-bottom: 1px solid #ccc;
            page-break-inside: avoid;
        }
        .label {
            font-weight: bold;
            color: #333;
            width: 120px;
            display: inline-block;
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .timestamp {
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Address Book Contacts</h1>
        <p class="timestamp">Generated on <?= date('Y-m-d H:i:s') ?></p>
    </div>

    <?php foreach ($contacts as $contact): ?>
    <div class="contact">
        <p><span class="label">Name:</span> <?= esc($contact['name']) ?></p>
        <p><span class="label">Email:</span> <?= esc($contact['email']) ?></p>
        <p><span class="label">Phone:</span> <?= esc($contact['phone']) ?></p>
        <p><span class="label">Address:</span> <?= esc($contact['address']) ?></p>
        <p><span class="label">Location:</span> <?= esc($contact['location']) ?></p>
        <p><span class="label">Job Position:</span> <?= esc($contact['job_position']) ?></p>
    </div>
    <?php endforeach; ?>
</body>
</html>