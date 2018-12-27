<div class="uk-grid-small uk-child-width-expand@s uk-flex-center" uk-grid>
    <div uk-grid>
        
        <div class="uk-width-1-5@m">
            <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-slide-bottom-small">
                <li <?php if ($this->session->userdata('active_profile') == "sejarah"){ echo 'class="uk-active"'; }else{ echo 'class='; }?> ><a href="#">Sejarah</a></li>
                <li <?php if ($this->session->userdata('active_profile') == "visimisi"){ echo 'class="uk-active"'; }else{ echo 'class='; }?> ><a href="#">Visi & misi</a></li>
                <li <?php if ($this->session->userdata('active_profile') == "tupoksi"){ echo 'class="uk-active"'; }else{ echo 'class='; }?> ><a href="#">Tupoksi</a></li>
                <li <?php if ($this->session->userdata('active_profile') == "datapublikasi"){ echo 'class="uk-active"'; }else{ echo 'class='; }?> ><a href="#">Data & Publikasi</a></li>
                <li <?php if ($this->session->userdata('active_profile') == "galeri"){ echo 'class="uk-active"'; }else{ echo 'class='; }?> ><a href="#">Galeri</a></li>
            </ul>
        </div>

        <div class="uk-width-expand@m">
            <ul id="component-tab-left" class="uk-switcher">
                <li> <!-- sejarah -->

                    <div>
                        <?php echo form_open_multipart(site_url("Profile/tambah_sejarah/"), array("class" => "formValidate")) ?>
                            <fieldset class="uk-fieldset">
                                <div class="uk-margin">
                                    <textarea class="uk-textarea" rows="5" placeholder="ketik isi sejarah..." name="text" required="required"></textarea>
                                </div>
                                <div class="uk-margin">
                                    <button class="uk-button uk-button-default">Buat</button>
                                </div>
                            </fieldset>
                        <?php echo form_close() ?>
                    </div>
                    <hr>
                    
                    <div>
                        <table class="uk-table uk-table-left uk-table-divider uk-table-striped">
                            <thead>
                                <tr>
                                    <th>Paragraf</th>
                                    <th class="uk-width-small"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sejarah as $sj) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $sj->text?>
                                        </td>
                                        <td>
                                            <a class="btn-act" href="<?php echo site_url('Profile/hapus_sejarah/'.$sj->id)?>" uk-icon="icon: trash;" title="hapus"></a>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                </li>

                <li> <!-- visi misi -->
                    <div class="uk-grid-small uk-child-width-1-2@s uk-flex-center" uk-grid>
                        <div>
                            <?php echo form_open_multipart(site_url("Profile/tambah_visi/"), array("class" => "formValidate")) ?>
                                <fieldset class="uk-fieldset">
                                    <div class="uk-margin">
                                        <textarea class="uk-textarea" rows="5" placeholder="ketik isi visi..." name="textvisi" required="required"></textarea>
                                    </div>
                                    <div class="uk-margin">
                                        <button class="uk-button uk-button-default">Buat</button>
                                    </div>
                                </fieldset>
                            <?php echo form_close() ?>
                        </div>

                        <div>
                            <?php echo form_open_multipart(site_url("Profile/tambah_misi/"), array("class" => "formValidate")) ?>
                                <fieldset class="uk-fieldset">
                                    <div class="uk-margin">
                                    <textarea class="uk-textarea" rows="5" placeholder="ketik isi misi..." name="textmisi" required="required"></textarea>
                                    </div>
                                    <div class="uk-margin">
                                        <button class="uk-button uk-button-default">Tambah</button>
                                    </div>
                                </fieldset>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                    <hr>

                    <div>
                        <table class="uk-table uk-table-left uk-table-divider uk-table-striped">
                            <thead>
                                <tr>
                                    <th>Visi</th>
                                    <th class="uk-width-small"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($visi as $vis) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $vis->text?>
                                        </td>
                                        <td>
                                            <a class="btn-act" href="<?php echo site_url('Profile/hapus_visi/'.$vis->id)?>" uk-icon="icon: trash;" title="hapus"></a>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <table class="uk-table uk-table-left uk-table-divider uk-table-striped">
                            <thead>
                                <tr>
                                    <th>Misi</th>
                                    <th class="uk-width-small"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($misi as $mis) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $mis->text?>
                                        </td>
                                        <td>
                                            <a class="btn-act" href="<?php echo site_url('Profile/hapus_misi/'.$mis->id)?>" uk-icon="icon: trash;" title="hapus"></a>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    
                </li>

                <li> <!-- tupoksi -->
                    <div class="uk-grid-small uk-child-width-1-2@s uk-flex-left" uk-grid>
                        <div>
                            <?php echo form_open_multipart(site_url("Profile/tambah_tupoksi/"), array("class" => "formValidate")) ?>
                                <fieldset class="uk-fieldset">
                                    <div class="uk-margin">
                                        <select class="uk-select" name="kategori" required="">
                                            <option value="">Pilih tupoksi</option>
                                            <option value="kepbag">Kepala Bagian</option>
                                            <option value="subbag">Sub Bagian</option>
                                            <option value="seksi">Seksi - seksi</option>
                                        </select>
                                    </div>

                                    <div class="uk-margin">
                                        <textarea class="uk-textarea" rows="5" placeholder="ketik tupoksi bagian..." name="text" required="required"></textarea>
                                    </div>
                                    <div class="uk-margin">
                                        <button class="uk-button uk-button-default">Tambah</button>
                                    </div>
                                </fieldset>
                            <?php echo form_close() ?>
                        </div>

                    </div>
                    <hr>

                    <div>
                        <table class="uk-table uk-table-left uk-table-divider uk-table-striped">
                            <thead>
                                <tr>
                                    <th>Kepala bagian</th>
                                    <th class="uk-width-small"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kepbag as $kbag) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $kbag->text?>
                                        </td>
                                        <td>
                                            <a class="btn-act" href="<?php echo site_url('Profile/hapus_tupoksi/'.$kbag->kategori.'/'.$kbag->id)?>" uk-icon="icon: trash;" title="hapus"></a>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <table class="uk-table uk-table-left uk-table-divider uk-table-striped">
                            <thead>
                                <tr>
                                    <th>Sub bagian</th>
                                    <th class="uk-width-small"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($subbag as $sbag) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $sbag->text?>
                                        </td>
                                        <td>
                                            <a class="btn-act" href="<?php echo site_url('Profile/hapus_tupoksi/'.$sbag->kategori.'/'.$sbag->id)?>" uk-icon="icon: trash;" title="hapus"></a>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <table class="uk-table uk-table-left uk-table-divider uk-table-striped">
                            <thead>
                                <tr>
                                    <th>Seksi - Seksi</th>
                                    <th class="uk-width-small"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($seksi as $sk) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $sk->text?>
                                        </td>
                                        <td>
                                            <a class="btn-act" href="<?php echo site_url('Profile/hapus_tupoksi/'.$sk->kategori.'/'.$sk->id)?>" uk-icon="icon: trash;" title="hapus"></a>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </li>

                <li> <!-- data publikasi -->
                    <div class="uk-grid-small uk-child-width-1-2@s uk-flex-left" uk-grid>
                        <div>
                            <?php if ($this->session->userdata('notif_dapub') != null ){ ?>
                                <div class="uk-alert-danger" uk-alert>
                                    <a class="uk-alert-close" uk-close></a>
                                    <p> <?php echo $this->session->userdata('notif_dapub');?> </p>
                                </div>
                            <?php } ?>
                            
                            <?php echo form_open_multipart(site_url("Profile/tambah_dapub/"), array("class" => "formValidate")) ?>
                                <fieldset class="uk-fieldset">
                                    <div class="uk-margin" uk-margin>
                                        <div uk-form-custom="target: true">
                                            <input type="file" name="file">
                                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Pilih file" name="file" disabled>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <textarea class="uk-textarea" rows="5" placeholder="ketik keterangan..." name="text" required="required"></textarea>
                                    </div>
                                    <div class="uk-margin">
                                        <button class="uk-button uk-button-default">Tambah</button>
                                    </div>
                                </fieldset>
                            <?php echo form_close() ?>
                        </div>

                    </div>
                    <hr>

                    <div>
                        <table class="uk-table uk-table-left uk-table-divider uk-table-striped">
                            <thead>
                                <tr>
                                    <th>Data dan Publikasi</th>
                                    <th class="uk-width-small"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dapub as $dpub) { ?>
                                    <tr>
                                        <td>
                                            <a class="uk-button-link" target="_blank" href="<?php echo base_url('upload/profile/dapub/'.$dpub->file); ?>">
                                                <span uk-icon="cloud-download"></span> &nbsp;
                                                <?php echo $dpub->text; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn-act" href="<?php echo site_url('Profile/hapus_dapub/'.$dpub->kategori.'/'.$dpub->id)?>" uk-icon="icon: trash;" title="hapus"></a>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </li>

                <li> <!-- galeri -->
                    <div class="uk-grid-small uk-child-width-1-2@s uk-flex-left" uk-grid>
                        <div>
                            <?php if ($this->session->userdata('notif_galeri') != null ){ ?>
                                <div class="uk-alert-danger" uk-alert>
                                    <a class="uk-alert-close" uk-close></a>
                                    <p> <?php echo $this->session->userdata('notif_galeri');?> </p>
                                </div>
                            <?php } ?>
                            
                            <?php echo form_open_multipart(site_url("Profile/tambah_galeri/"), array("class" => "formValidate")) ?>
                                <fieldset class="uk-fieldset">
                                    <div class="uk-margin" uk-margin>
                                        <div uk-form-custom="target: true">
                                            <input type="file" name="file">
                                            <input class="uk-input uk-form-width-medium" type="text" placeholder="Pilih file" name="file" disabled>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <input class="uk-textarea" rows="5" placeholder="ketik keterangan..." name="text" required="required"></textarea>
                                    </div>
                                    <div class="uk-margin">
                                        <button class="uk-button uk-button-default">Tambah</button>
                                    </div>
                                </fieldset>
                            <?php echo form_close() ?>
                        </div>

                    </div>
                    <hr>
                    
                    <div class="uk-grid-small uk-child-width-1-3@s uk-flex-left uk-text-left" uk-grid>
                    <?php foreach ($galeri as $galer) { ?>
                        <div>
                            <div class="uk-card uk-card-default uk-inline">
                                <img class="uk-height-small uk-width-auto@m" src="<?php echo base_url('upload/profile/galeri/'.$galer->file)?>" alt="">

                                <div class="uk-position uk-position-top-right uk-overlay-primary uk-border-rounded">
                                    <a style="padding: 10px;" href="<?php echo site_url('Profile/hapus_galeri/'.$galer->kategori.'/'.$galer->id);?>" uk-icon="trash"></a>
                                </div>
                            </div>
                            <div class="uk-panel uk-panel-box uk-text-truncate">
                                <p>
                                    <?php echo $galer->text; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                    
                </li>
            </ul>
        </div>
        
    </div>
</div>