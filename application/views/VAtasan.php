<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kegiatan</h1>
        </div>

        <?php echo $this->session->flashdata('message'); ?>

        <div class="table-responsive">
            <table id="dataTables" class="table table-hover table-striped table-bordered">
                <thead>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Sub Kegiatan</th>
                    <th>Nama Belanja</th>
                    <th>Kode Rekening</th>
                    <th>Pagu Anggaran</th>
                    <th>Nama PPTK</th>
                    <th>Tanggal Input</th>
                    <th>Bukti Tagihan</th>
                    <th>Bukti Transfer</th>
                    <th>Status Pembayaran</th>
                </thead>

                <?php
                $no = 1;
                foreach ($kegiatan as $act) :
                ?>
                    <tbody>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $act->nama_kegiatan ?></td>
                        <td><?php echo $act->sub_kegiatan ?></td>
                        <td><?php echo $act->nama_belanja ?></td>
                        <td><?php echo $act->kode_rekening ?></td>
                        <td>Rp<?php echo number_format($act->pagu_anggaran, 0, ',', '.') ?></td>
                        <td><?php echo $act->nama_pptk ?></td>
                        <td><?php echo $act->tanggal_input ?></td>

                        <td>
                            <?php 
                                if (empty($act->bukti_tagihan)) {
                                        echo '<center><img src="' . base_url('./assets/images/noimg.jpg') . '" border="0" width="70px" height="70px"> </center>';
                                    
                                } else {
                                    echo '<center><img src="' . base_url('./uploads/bukti_tagihan/' . $act->bukti_tagihan) . '" border="0" width="70px" height="70px"> </center>';
                                }
                            ?>
                        </td>

                        <td>
                            <?php 
                                if (empty($act->bukti_transfer)) {
                                    echo '<center><img src="' . base_url('./assets/images/noimg.jpg') . '" border="0" width="70px" height="70px"> </center>';
                                    
                                } else {
                                    echo '<center><img src="' . base_url('./uploads/bukti_transfer/' . $act->bukti_transfer) . '" border="0" width="70px" height="70px"> </center>';
                                }
                            ?>
                        </td>

                        <td>
                            <?php
                                if (empty($act->bukti_tagihan) && empty($act->bukti_transfer)) {
                                    echo "<span class='badge badge-pill badge-dark'>Belum dijalankan</span>";
                                } elseif (empty($act->bukti_transfer)) {
                                    echo "<span class='badge badge-pill badge-danger'>Belum dibayar</span>";
                                } elseif (!empty($act->bukti_tagihan) && !empty($act->bukti_transfer)) {
                                    echo "<span class='badge badge-pill badge-success'>Sudah dibayar</span>";
                                }
                            ?>
                        </td>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>

    </section>
</div>