<?php
require_once 'database.php'; 
require_once 'classcontact.php';
$arr = classcontact::select(); 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link href="style.css" rel="stylesheet"> 
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 sidebar">
            <h1 class="text-center">HOMEPAGE</h1>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">
     <svg class="bi me-2" width="16" height="16">
    <image xlink:href="https://img2.pngdownload.id/20180426/dsq/kisspng-computer-icons-clip-art-5ae29c62600098.7613629915248006103932.jpg" width="16" height="16" />
</svg>
                Setting
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <svg class="bi me-2" width="16" height="16">
    <image xlink:href="https://img2.pngdownload.id/20181228/svx/kisspng-computer-icons-ios-7-iphone-portable-network-graph-remind-svg-png-icon-free-download-2443-2-onli-5c261c7926a328.3025707815460015291583.jpg" width="16" height="16" />
</svg> Notification
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <svg class="bi me-2" width="20" height="20">
    <image xlink:href="https://img2.pngdownload.id/20180319/aeq/kisspng-computer-icons-google-account-user-profile-iconfin-png-icons-download-profile-5ab0301e0d78f3.2971990915214960940552.jpg" width="16" height="16" />
</svg>

                        Profil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">
                    <svg class="bi me-2" width="16" height="16">
    <image xlink:href="https://i.pinimg.com/564x/a6/82/a7/a682a710b6d9e6d81b010001295c9968.jpg" width="16" height="16" />
</svg>

                        Logout
                    </a>
                </li>
            </ul>
            <hr>
        </div>
        <div class="col-9">
            <div>
                <h1 class="text-center cool-9">TABEL PEMBELI IPHONE</h1>
                <table id="myTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                        
                    </thead>
                    <tbody> 
                        <?php foreach ($arr as $data): ?>
                        <tr> 
                            <td><?= $data['id_pembeli'] ?></td> 
                            <td><input type="text" value="<?= $data['nomor_telepon'] ?>" class="form-control nomor_telepon" readonly></td> 
                            <td><input type="text" value="<?= $data['nama'] ?>" class="form-control nama" readonly></td> 
                            <td> 
                                <button class="btn btn-primary edit-btn">Edit</button> 
                                <button class="btn btn-primary save-btn" style="display:none;">Save</button> 
                                <button class="btn btn-danger delete-btn">Delete</button> <!-- Tombol Hapus -->
                            </td> 
                        </tr> 
                        <?php endforeach; ?>
                    </tbody> 
                </table>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-success tambah-btn">Tambah</button> <!-- Tombol Tambah -->
            </div>
        </div>        
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const saveButtons = document.querySelectorAll('.save-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const tambahBtn = document.querySelector('.tambah-btn');

    // Function to handle edit button click
    editButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const nomor_teleponInput = row.querySelector('.nomor_telepon');
            const namaInput = row.querySelector('.nama');
            const saveBtn = row.querySelector('.save-btn');

            nomor_teleponInput.readOnly = false;
            namaInput.readOnly = false;
            saveBtn.style.display = 'block';
            this.style.display = 'none';
        });
    });

    // Function to handle save button click
    saveButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const nomor_teleponInput = row.querySelector('.nomor_telepon');
            const namaInput = row.querySelector('.nama');
            const editBtn = row.querySelector('.edit-btn');

            // Kirim data yang diedit ke server
            const id_pembeli = row.cells[0].textContent;
            const nomor_telepon = nomor_teleponInput.value;
            const nama = namaInput.value;

            // Simpan data ke server menggunakan AJAX atau cara yang sesuai
            // ...

            // Setelah penyimpanan sukses, kembalikan tampilan ke mode non-edit
            nomor_teleponInput.readOnly = true;
            namaInput.readOnly = true;
            editBtn.style.display = 'none';
            this.style.display = 'none';
        });
    });

    // Function to handle delete button click
    deleteButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (confirmation) {
                const row = this.closest('tr');
                // Lakukan proses penghapusan data di sini, misalnya dengan AJAX
                row.remove(); // Untuk contoh sementara, hapus baris dari DOM
            }
        });
    });

    // Function to handle tambah button click
    tambahBtn.addEventListener('click', function() {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="text" class="form-control new-nomor-telepon"></td>
            <td><input type="text" class="form-control new-nama"></td>
            <td>
                <button class="btn btn-primary save-new-btn">Save</button>
                <button class="btn btn-danger cancel-new-btn">Cancel</button>
            </td>
        `;
        document.querySelector('tbody').appendChild(newRow);
    });

    // Function to handle save new button click
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('save-new-btn')) {
            const newRow = event.target.closest('tr');
            const nomor_telepon = newRow.querySelector('.new-nomor-telepon').value;
            const nama = newRow.querySelector('.new-nama').value;

            // Kirim data baru ke server menggunakan AJAX atau cara yang sesuai
            // ...

            // Setelah penyimpanan sukses, tambahkan data ke tabel
            const newDataRow = document.createElement('tr');
            newDataRow.innerHTML = `
                <td></td>
                <td><input type="text" value="${nomor_telepon}" class="form-control nomor_telepon" readonly></td>
                <td><input type="text" value="${nama}" class="form-control nama" readonly></td>
                <td>
                    <button class="btn btn-primary edit-btn">Edit</button>
                    <button class="btn btn-primary save-btn" style="display:none;">Save</button>
                    <button class="btn btn-danger delete-btn">Delete</button>
                </td>
            `;
            document.querySelector('tbody').appendChild(newDataRow);
            newRow.remove();
        } else if (event.target.classList.contains('cancel-new-btn')) {
            event.target.closest('tr').remove();
        }
    });
});
</script>
</body>
</html>
