<!DOCTYPE html>
<html lang="en">
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
                <th class="">Image</th>
                <th class="">Name</th>
                <th class="">Last name</th>
                <th class="">Phone</th>
                <th class="">E-mail</th>
                <th class="">Action</th>
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
                    <form id="addContact" action="/contacts" method="POST">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input placeholder="Type name" type="text" class="form-control" id="name">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="last_name" class="col-sm-4 col-form-label">Last name</label>
                            <div class="col-sm-8">
                                <input placeholder="Type last name" type="text" class="form-control" id="last_name">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input placeholder="Type phone" type="text" class="form-control" id="phone">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input onblur="validateEmail(this.value)" placeholder="Type email" type="email"
                                       class="form-control" id="email">
                                <div id="email_error"></div>
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


<div style="color: black" class="modal fade" id="contactModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <form id="viewContact" action="/contacts/update" method="POST">
                        <input type="hidden" class="form-control" id="contact_id">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nameView">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="last_name" class="col-sm-4 col-form-label">Last name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name_view">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="phoneView">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input onblur="validateEmail(this.value)" type="email" class="form-control"
                                       id="emailView">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-12">
                    <div id="contact_image">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button onclick="updateContact()" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<div style="color: black" class="modal fade" id="imageModal" tabindex="-1" role="dialog"
     aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Upload Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file" id="imageUpload" accept=".jpg, .jpeg, .png"/>
                <form id="imageUploadForm" enctype="multipart/form-data">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="uploadButton">Upload</button>
            </div>
        </div>
    </div>
</div>


<script>
  var contactId = 0;
  var notImage = 'You can upload avatar after creating/updating contact';

  function getContacts() {
    let postData = {
      userId: "<?=$_SESSION['user']['id']?>"
    }
    $.post('/contacts', postData, function (response) {
      var $table = $('#myTable');
      $table.find('tbody tr').remove();
      const table = document.getElementById('myTable');
      const tbody = table.querySelector('tbody');
      response.forEach(item => {
        const row = document.createElement('tr');
        if (item.image === '') {
          row.innerHTML = '<td><button onclick="contactId = ' + item.id + ';" id=' + item.id + ' type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal">Upload Image</button></td>';
        } else {
          row.innerHTML = '<td>' + '<img width="70px;" src="' + item.image + '"></td>';
        }
        row.innerHTML += `<td><button class="btn btn-info contactModalButton" onclick="getContact(` + item.id + `)">${item.name}</button> </td><td>${item.last_name}</td><td>${item.phone}</td><td>${item.email}</td><td><button onclick="deleteContact(` + item.id + `)" class="btn btn-danger">Delete<i class="fas fa-trash"></i></button></td>`;
        tbody.appendChild(row);
      });

      $('.contactModalButton').on('click', function () {
        $('#contactModal').modal('show');
      });
    })
      .fail(function (error) {
        console.error('Error:', error);
      });
  }

  function getContact(id) {
    $.post('/contact', {contactId: id}, function (response) {
      $('#nameView').val(response.name)
      $('#last_name_view').val(response.last_name)
      $('#phoneView').val(response.phone)
      $('#emailView').val(response.email)
      $('#contact_id').val(id)

      if (response.image !== false) {
        $('#contact_image').html('<img width="435" src=' + response.image.path + '>' + '<button onclick="deleteAvatarId(' + id + ')" type="button" class="btn btn-secondary">' +
          '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">' +
          '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>' +
          '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path></svg>' +
          '</button>');
      } else {
        $('#contact_image').html(notImage);
      }
    })
      .fail(function (error) {
        console.log(error);
      });
  }

  function deleteAvatarId(contactId) {
    $.post('/avatar/delete', {avatarId: contactId}, function (response) {
      $('#contact_image').html(notImage);
      getContacts();
      Swal.fire(
        'Good job!',
        'Image deleted',
        'success'
      )
    })
      .fail(function (error) {
        alert(error);
      });
  }

  function addContact() {
    var $form = $('#addContact');
    var formData = {};
    $form.find('input').each(function () {
      var $input = $(this);
      var id = $input.attr('id');
      formData[id] = $input.val();
    });
    $.post('/contact/add', formData, function (response) {
      getContacts();
      Swal.fire(
        'Good job!',
        'Contact added!',
        'success'
      );
      $('#myModal').modal('hide');
    })
      .fail(function (error) {
        alert(error);
      });
  }

  function updateContact(id) {
    var $form = $('#viewContact');
    var formData = {};
    $form.find('input').each(function () {
      var $input = $(this);
      var id = $input.attr('id');
      formData[id] = $input.val();
    });
    formData['id'] = id;
    $.post('/contact/update', formData, function (response) {
      getContacts();

      Swal.fire(
        'Good job!',
        'The contact was updated!',
        'success'
      )

      $('#contactModal').modal('hide');
    })
      .fail(function (error) {
        alert(error);
      });
  }

  function deleteContact(id) {
    var userInput = prompt('Are you sure? Type the "DELETE" for accept', '');
    if (userInput == 'DELETE') {
      $.post('/contact/delete', {contactId: id}, function (response) {
        getContacts();

        Swal.fire(
          'Good job!',
          'The contact was deleted!',
          'success'
        )

      })
        .fail(function (error) {
          console.log(error);
        });
    } else {
      alert('You clicked Cancel or typed incorrect answer for the prompt.');
    }
  }

  document.getElementById('openModalButton').addEventListener('click', function () {
    $('#myModal').modal('show');
  });

  $("#uploadButton").on("click", function () {
    const maxSize = 5 * 1024 * 1024;
    const allowedTypes = ['image/jpeg', 'image/png'];

    let fileInput = $("#imageUpload")[0];
    let file = fileInput.files[0];

    if (allowedTypes.indexOf(file.type) === -1) {
      Swal.fire(
        'Error!',
        'Only JPEG and PNG images are allowed.',
        'warning'
      );
      return;
    }

    if (file.size > maxSize) {
      Swal.fire(
        'Error!',
        'File size exceeds the 5 MB limit.',
        'warning'
      );
      return;
    }

    if (fileInput.files.length > 0) {
      let formData = new FormData();
      formData.append("image", fileInput.files[0]);
      formData.append("contactId", contactId);
      $.ajax({
        url: "/upload.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          getContacts();
          Swal.fire(
            'Good job!',
            'Image uploaded successfully!',
            'success'
          );

          $("#imageModal").modal("hide");
        },
        error: function (data) {
          console.log(data);
          alert("An error occurred during image upload.");
        }
      });
    }
  });

  getContacts();
</script>
</body>
</html>