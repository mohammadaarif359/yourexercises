<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Plan PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
        }
        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
            margin-top: 20px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table th, table td {
            border: 1px solid #333;
            padding: 8px;
            vertical-align: top;
        }
        .no-border td {
            border: none;
            padding: 5px 0;
        }
        .image-box {
            width: 100%;
            height: 150px;
            border: 1px dashed #999;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-style: italic;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="title">Plan Details</div>

<!-- Basic Info Table -->
<table class="no-border">
    <tr>
        <td><strong>Name:</strong> Plan One</td>
        <td><strong>Status:</strong> Active</td>
    </tr>
    <tr>
        <td><strong>Category:</strong> Category One</td>
        <td><strong>Subcategory:</strong> Subcategory one of cat one</td>
    </tr>
</table>

<!-- Feature Image -->
<div class="section-title">Feature Image</div>
<div class="image-box">No image uploaded</div>

<!-- Description -->
<div class="section-title">Description</div>
<p>Plan one</p>

<!-- Exercise Table -->
<div class="section-title">Exercise Details</div>
<table>
    <thead>
        <tr>
            <th>Reps</th>
            <th>Hold</th>
            <th>Complete</th>
            <th>Perform</th>
            <th>Times</th>
            <th>Weekly</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>1 Second</td>
            <td>2</td>
            <td>3</td>
            <td>Times</td>
            <td>Weekly</td>
            <td>Action</td>
        </tr>
    </tbody>
</table>

</body>
</html>
