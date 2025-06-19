<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CeBan Admin Panel</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
    <style>
        .dashboard {
            padding: 20px;
        }
        .page-title {
            font-size: 20px;
            font-weight: bold;
            color: #2b7be4;
            margin-bottom: 20px;
        }
        .user-management {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .search-input {
            flex: 1;
            max-width: 300px;
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        .btn-add-user {
            background-color: #2b7be4;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .user-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .user-table th, .user-table td {
            padding: 14px 16px;
            text-align: left;
            font-size: 14px;
        }
        .user-table th {
            background-color: #f5f7fa;
            color: #333;
        }
        .user-table tr:nth-child(even) {
            background-color: #f0f8ff;
        }
        .table-actions {
            text-align: right;
        }
        .icon {
            width: 18px;
            height: 18px;
            margin-left: 8px;
            vertical-align: middle;
        }
        .red-icon {
            filter: hue-rotate(320deg) saturate(5);
        }
    </style>
</head>
<body>
<div class="container">
    <aside class="sidebar">
        <h1 class="logo">CeBan<br><span>CEGAH BANJIR</span></h1>
        <nav>
            <a href="{{ route('admin.homepage') }}">Dashboard</a>
            <a href="{{ route('admin.das') }}">Status DAS</a>
            <a class="active" href="{{ route('admin.users') }}">Kelola Pengguna</a>
        </nav>
    </aside>

    <main class="main-content">
        <header>
            <div class="profile">
                <img src="https://i.pravatar.cc/40" alt="Admin">
                <span>Admin</span>
            </div>
        </header>

        <div class="dashboard">
            <h2 class="page-title">Kelola Pengguna</h2>

            <div class="user-management">
                <input type="text" class="search-input" placeholder="Search...">
                <button class="btn-add-user">+ Tambah Pengguna</button>
            </div>

            <table class="user-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th style="text-align: right;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>UserA</td>
                        <td>usertest1@gmail.com</td>
                        <td>Admin</td>
                        <td class="table-actions">
                            <button class="btn-edit">Edit</button>
                            <button class="btn-delete">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>UserB</td>
                        <td>usertest2@gmail.com</td>
                        <td>Viewer</td>
                        <td class="table-actions">
                            <button class="btn-edit">Edit</button>
                            <button class="btn-delete">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>UserC</td>
                        <td>usertest3@gmail.com</td>
                        <td>Admin</td>
                        <td class="table-actions">
                            <button class="btn-edit">Edit</button>
                            <button class="btn-delete">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>UserD</td>
                        <td>usertest4@gmail.com</td>
                        <td>Viewer</td>
                        <td class="table-actions">
                            <button class="btn-edit">Edit</button>
                            <button class="btn-delete">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
