@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-body ">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Manage User</h5>
                    <div>
                        <a href="" class="btn btn-primary">Tambah User</a>
                    </div>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%" scope="col">No</th>
                            <th width="15%"  scope="col">Username</th>
                            <th width="20%" scope="col">Email</th>
                            <th width="8%" scope="col">Role</th>
                            <th class="text-end" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th width="5%" scope="row">1</th>
                            <td>Admin</td>
                            <td>admin@gmail.com</td>
                            <td>admin</td>
                            <td class="text-end">
                                <a href="" class="btn btn-sm btn-warning"> <i class="bi bi-pencil"></i> Edit</a>
                                <a href="" class="btn btn-sm btn-danger"> <i class="bi bi-trash"></i> Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>


    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f3f5f7;
            min-height: 100vh;
        }

        .text-logo {
            color: #1e4ed8;
        }

        .text-brand {
            color: #1e4ed8;
        }

        a.text-nav {
            color: #1e4ed8 !important;
            text-decoration: none;
        }

        .text-sub {
            color: #1e4ed8 !important;
        }

        .custom-tabs {
            background-color: #1e63ff;
            border-radius: 8px;
            padding: 6px;
            display: flex;
            gap: 6px;
            width: 100%;
        }

        .custom-tabs .nav-link {
            color: #fff;
            font-weight: 600;
            border-radius: 6px;
            padding: 8px 16px;
            text-align: center;
            width: 100%;
        }

        .custom-tabs .nav-link.active {
            background-color: #fff;
            color: #1e63ff !important;
        }

        @media (min-width: 992px) {
            .custom-tabs {
                width: fit-content;
            }

            .custom-tabs .nav-link {
                padding: 6px 48px;
                width: auto;
            }
        }





        .nav-pills-materi {
            display: flex;
            width: 100%;
            gap: 12px;
        }

        .nav-pills-materi .nav-item {
            flex: 1;
        }

        /* default = btn-outline-secondary */
        .nav-pills-materi .nav-link {
            width: 100%;
            text-align: center;
            background-color: transparent;
            color: #2b2c2d !important;
            border: 2px solid #6c757d;
            border-radius: 12px;
            transition: all .2s ease;
        }

        /* hover efek */
        .nav-pills-materi .nav-link:hover {
            background-color: #6c757d;
            color: #fff !important;
        }

        /* active = btn-primary */
        .nav-pills-materi .nav-link.active {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff !important;
        }
    </style>
@endsection
