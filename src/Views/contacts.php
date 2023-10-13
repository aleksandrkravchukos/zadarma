<html>
<?php
include_once 'header.php';
?>
<body>

<header class="bg-dark text-light text-center py-4">
    <h1>Phone book</h1>
</header>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <?php
            include "auth.php";
            ?>
        </div>

        <div class="col-md-9">
            <h2>Contacts
                <button id="openModalButton" class="btn btn-success float-right" type="submit">Add contact</button>
            </h2>

            <table id="myTable" class="table text-justify table-striped">
                <thead class="tableh1">
                <th class="">Name</th>
                <th class="">Last name</th>
                <th class="">Phone</th>
                <th class="">E-mail</th>
                </thead>
                <tbody id="tableBody">
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php
include_once 'scripts.php';
?>

<div style="color: black" class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form action="/contacts" method="POST">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="last_name" class="col-sm-2 col-form-label">Last name</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="last_name">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button onclick="addContact()" class="btn btn-success">Add</button>
            </div>
        </div>
    </div>
</div>

<script>
  function getContacts() {
    let postData = {
      userId: 3
    }
    $.post('/contacts', postData, function (response) {
      const table = document.getElementById('myTable');
      const tbody = table.querySelector('tbody');
      response.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `<td>${item.name}</td><td>${item.last_name}</td><td>${item.phone}</td><td>${item.email}</td>`;
        tbody.appendChild(row);
      });
    })
      .fail(function (error) {
        console.error('Error:', error);
      });
  }

  getContacts();
  document.getElementById('openModalButton').addEventListener('click', function () {
    $('#myModal').modal('show');
  });

  function addContact() {
    // $('#myModal').hide();
    $('#myModal').modal('hide');
  }
</script>
</body>

</html>