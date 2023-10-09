<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>users</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/css/styles.css') }}">


    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    @extends('admin.nav')
    <div id="layoutSidenav">
        @extends('admin.layoutsidenav')

        <div id="layoutSidenav_content">

            <div class="table">
                <div class="table_header">

                    <div class="user-count">
                        <p>orders </p>
                        <label for=""> <i class="fa fa-users"></i></label>
                        <span>{{ $booking_count }}</span>
                    </div>
                    <div>
                        <form action="{{ url('/search') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="text">
                            <button class="search_botton" type="submit">search</button>

                        </form>

                    </div>
                </div>
                <div class="table_section">
                    <table>
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>numbre person</th>
                                <th>datetime</th>
                                <th>special_request</th>
                                <th>ref_to</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->user_name }}</td>

                                    <td>{{ $item->user_name }}</td>
                                    <td>{{ $item->numbre_person }}</td>
                                    <td>{{ $item->datetime }}</td>
                                    <td>{{ $item->special_request }}</td>
                                    <td>{{ $item->ref_to }}</td>
                                    <td class="action">

                                        <form method="POST" action="{{ url('delete-booking/' . $item->id) }}"
                                            id="{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('booking-info/' . $item->id) }}">
                                                <button type="button" class="see"><i
                                                        class="fa-solid fa-eye"></i></button>
                                            </a>
                                            <button type="button" class="delete"
                                                onclick="showConfirmation('{{ $item->id }}')"><i
                                                    class="fa-solid fa-trash"></i></button>

                                            @if ($item->is_validate == 1)
                                                <a href="{{ url('is-validate-info/' . $item->id) }}" id="admin_form">
                                                    <button type="button" style="background-color: rgb(238, 255, 4)">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </a>
                                            @else
                                                <a href="{{ url('is-validate-info/' . $item->id) }}" id="admin_form">
                                                    <button type="button" style="background-color:green"><i
                                                            class="fas fa-check"></i></button>
                                                </a>
                                            @endif

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showConfirmation(id_form) {
            // Create a custom confirmation dialog
            const dialog = document.createElement('div');
            dialog.className = 'confirmation-dialog';
            dialog.innerHTML = `
        <p>Are you sure you want to delete this user?</p>
        <button onclick="confirmDelete('${id_form}')" class="conferm_delete" >Yes</button>
        <button onclick="closeDialog()" class="close_delete">No</button>
            `;

            // Append the dialog to the body
            document.body.appendChild(dialog);
        }

        function closeDialog() {
            // Remove the custom dialog
            const dialog = document.querySelector('.confirmation-dialog');
            if (dialog) {
                dialog.remove();
            }
        }

        function confirmDelete(id_form) {
            // Use the user ID to get the form element
            const form = document.getElementById(id_form);

            // Check if the form exists before submitting
            if (form) {
                form.submit();
            }

            // Close the confirmation dialog
            closeDialog();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="admin/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="admin/js/datatables-simple-demo.js"></script>
</body>

</html>
