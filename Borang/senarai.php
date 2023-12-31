<?php
// IMPORT BEGIN
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php"); // Import projects configuration
require_once(BORANG_DIR."/site_config.php"); // Import site configuration
require_once(COMPONENTS_DIR."/header_bootstrap.php"); // Import header
require_once(BORANG_COMPONENTS_DIR."/config.php"); // Import mysql config
require_once("select.php");
require_once(BORANG_COMPONENTS_DIR . "/navbar.php"); // Import header
// IMPORT END
?>

<!-- CONTENT BEGIN -->
<div class="container-fluid">
    <div class="row justify-content-center align-items-center g-2">
        <div class="card text-center shadow-lg col-8 m-4">
            <img class="card-img-top">
            <div class="card-body">
                <h4 class="card-title">Maklumat Pelajar</h4>
                <div class="card-text">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jantina</th>
                                    <th scope="col">Tarikh Lahir</th>
                                    <th scope="col">Peringkat Pengajian</th>
                                    <th scope="col">Program</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tdFormat = "
                                    <tr>
                                        <td scope='col'>%s</td>
                                        <td scope='col'>%s</td>
                                        <td scope='col'>%s</td>
                                        <td scope='col'>%s</td>
                                        <td scope='col'>%s</td>
                                        <td scope='col'>%s</td>
                                        <td scope='col'>%s</td>
                                        <td scope='col container-fluid'>
                                            <div class='row'>
                                                <div class='col-12 m-2'>
                                                    <a class='btn btn-primary text-nowrap' href='borang_kemaskini.php?id=%s'><i class='fa-solid fa-pencil'></i><span class='ms-2'>Kemaskini</span></a>
                                                </div>
                                                <div class='col-12 m-2'>
                                                    <a class='btn btn-danger  text-nowrap' href='delete.php?id=%s' onclick=\"confirm("."'Delete this record?'".")\"><i class='fa-solid fa-trash'></i><span class='ms-2'>Buang</span></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                                while($rows = mysqli_fetch_object($pelajarRows)){
                                    printf($tdFormat, $rows->id, $rows->nama, $rows->jantina, $rows->tlahir, $rows->peringkat, $rows->program, $rows->alamat, $rows->id, $rows->id);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="container-fluid justify-content-start align-items-start mt-2">
                        <div class="row">
                            <div class="col-4">
                                <a class="btn btn-primary" href="<?php echo(BORANG_URL."/borang.php");?>"><i class="fa-solid fa-list"></i><span class="ms-2">Kembali ke borang</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </p>
        </div>
    </div>
</div>
<!-- CONTENT END -->

<?php
// FOOTER BEGIN
require_once(COMPONENTS_DIR."/footer_bootstrap.php"); // Import site configuration
// FOOTER END
?>