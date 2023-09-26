<?php
// IMPORT BEGIN
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php"); // Import projects configuration
require_once(BORANG_DIR."/site_config.php"); // Import site configuration
require_once(COMPONENTS_DIR."/header_bootstrap.php"); // Import header
require_once(BORANG_COMPONENTS_DIR."/config.php"); // Import mysql config
require_once("select.php");
require_once(BORANG_COMPONENTS_DIR . "/navbar.php"); // Import header
require_once(BORANG_COMPONENTS_DIR . "/redirect_if_not_admin_or_lecturer.php"); // Import header
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
                                    <th scope="col">Kemahiran IT</th>
                                    <th scope="col">Peranti</th>
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
                                        <td scope='col'>%s</td>
                                        <td scope='col'>%s</td>
                                        <td scope='col container-fluid'>
                                            <div class='row'>
                                                <div class='col-12 m-2'>
                                                    <a class='btn btn-primary text-nowrap w-100' href='profail.php?id=%s'><i class='fa-solid fa-pencil'></i><span class='ms-2'>Kemaskini</span></a>
                                                </div>
                                                <div class='col-12 m-2'>
                                                    <a class='btn btn-danger  text-nowrap w-100' href='buang.php?id=%s' onclick=\"confirm("."'Delete this record?'".")\"><i class='fa-solid fa-trash'></i><span class='ms-2'>Buang</span></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                                
                                while($rows = mysqli_fetch_object($pelajarRows)){
                                    // Formatting displays for peranti field
                                    $perantiHTML = "<ul>";
                                    // Check wehther peranti exists in each field
                                    if(!empty($rows->peranti0)){
                                        // Appending peranti to html output value
                                        $perantiHTML .= "<li>".$rows->peranti0."</li>";
                                    }
                                    if(!empty($rows->peranti1)){
                                        // Appending peranti to html output value
                                        $perantiHTML .= "<li>".$rows->peranti1."</li>";
                                    }
                                    if(!empty($rows->peranti2)){
                                        // Appending peranti to html output value
                                        $perantiHTML .= "<li>".$rows->peranti2."</li>";
                                    }
                                    if(!empty($rows->peranti3)){
                                        // Appending peranti to html output value
                                        $perantiHTML .= "<li>".$rows->peranti3."</li>";
                                    }
                                    if(!empty($rows->peranti4)){
                                        // Appending peranti to html output value
                                        $perantiHTML .= "<li>".$rows->peranti3."</li>";
                                    }
                                    $perantiHTML .= "</ul>";

                                    printf($tdFormat, $rows->pengguna_id, $rows->nama, $rows->jantina, $rows->tlahir, $rows->peringkat, $rows->program, $rows->alamat, $rows->it, $perantiHTML, $rows->pengguna_id, $rows->pengguna_id);
                                }
                                ?>
                            </tbody>
                        </table>
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