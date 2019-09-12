<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Starter</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/c8f77d7d5d.js"></script>
    <style>
      i{
        color: #fd9a00;
        cursor: pointer;
      }
    </style>
</head>

<body id="app">
      <div class="container pt-5">
          <div class="row ">
            <div id="left" class="col-lg-12">
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>post ID</th>
                            <th>Caption</th>
                            <th>Content Stage</th>
                            <th>Edit</th>

                        </tr>
                    </thead>

                </table>
            </div>
            <div id="info" class="hiddin col-lg-6">

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var table;
            // Edit record
              $('#example').on('click', 'a.editor_edit', function (e) {
                  e.preventDefault();

                  editor.edit( $(this).closest('tr'), {
                      title: 'Edit record',
                      buttons: 'Update'
                  } );
              } );

            table = $("#example").DataTable({
                "processing": true,
                "serverSide": true,
                "select": true,
                "ajax": "{{ route('admin.index') }}",
                "columns": [{
                    "data": "id"
                }, {
                    "data": "caption"
                }, {
                    "data": "caption"
                },
                {
                  "data": "Action",
                 "orderable": false ,
                  mRender: function (o) { return '<i class="fas fa-pen-square"></i>'; }
              } ]
            });

            $('#example tbody').on('click', 'i', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                var post_id = row.data().id;
                $("#left").removeClass('col-lg-12');
                $("#left").addClass('col-lg-6');
                $("#info").show();
                $.ajax({
                    type: "get",
                    data: {
                        id: post_id
                    },

                    url: "{{ route('admin.comments')}}",
                    success: function(data) {
                        $('#info').html(data);

                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });

            });
        });
    </script>
</body>

</html>
