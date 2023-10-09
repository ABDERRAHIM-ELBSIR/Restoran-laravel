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
                        <p>pla</p>
                        <label for=""> <i class="fa fa-users"></i></label>
                        <span>{{ $menu_count }}</span>
                    </div>
                    <div>
                        <form action="{{ url('/menu-search') }}" method="POST">
                            @csrf
                            @method('POST')
                            <select name="select_input" id="" class="search_input">
                                <option value=""></option>
                                <option value="denere">denere</option>
                                <option value="breakfast">breakfast</option>
                                <option value="launnch">launnch</option>
                            </select>
                            <button class="search_botton" type="submit">search</button>
                            <a href="{{ url('/new-pla') }}">
                                <button class="search_botton" type="button">add new</button>
                            </a>

                        </form>

                    </div>
                </div>
                <div class="table_section">
                    <table>
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>img</th>
                                <th>category</th>
                                <th>prix</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td><img src="{{ asset($item->img) }}" alt=""></td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->prix }}</td>
                                    <td class="action">

                                        <form action="{{ url('delete_food/' . $item->id) }}" id="{{ $item->id }}">

                                            @csrf
                                            @method('POST')

                                            <a href="{{ url('info-menu/' . $item->id) }}">
                                                <button type="button" class="see"><i
                                                        class="fa-solid fa-eye"></i></button>
                                            </a>

                                            <button type="button" class="delete"
                                                onclick="showConfirmation('{{ $item->id }}')"><i
                                                    class="fa-solid fa-trash"></i></button>
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
