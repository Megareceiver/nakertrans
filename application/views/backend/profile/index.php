<div class="uk-child-width-expand@s" uk-grid>
    <div>
        <div uk-grid>
            <div class="uk-width-1-5@m">
                <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-slide-right">
                    <li class="uk-active"><a href="#">Sejarah</a></li>
                    <li><a href="#">Visi & misi</a></li>
                    <li><a href="#">Tupoksi</a></li>
                    <li><a href="#">Data & Publikasi</a></li>
                    <li><a href="#">Galeri</a></li>
                </ul>
            </div>

            <div class="uk-width-expand@m">
                <ul id="component-tab-left" class="uk-switcher">
                    <li> <!-- sejarah -->
                        <div class="uk-width-expand@s">
                            <?php echo form_open_multipart(site_url("Profile/tambah_sejarah/"), array("class" => "formValidate")) ?>
                                <fieldset class="uk-fieldset">
                                    <div class="uk-margin">
                                        <textarea class="uk-textarea" rows="5" placeholder="ketik isi sejarah..."></textarea>
                                    </div>
                                    <div class="uk-margin">
                                        <button class="uk-button uk-button-default">Buat</button>
                                    </div>
                                </fieldset>
                            <?php echo form_close() ?>
                        </div>

                        <div class="uk-margin">
                        <table id="detail1" class="uk-table uk-table-hover uk-table-divider stripe row-border order-column uk-animation-slide-bottom-small" style="width:100%;">
                            <thead>
                                <th style="width: 20px;"></th>
                                <th></th>
                            </thead>
                            <tbody id="isi_detail1">
                                <td>
                                    <input class="uk-checkbox" type="checkbox" name="check_[]" value="">
                                </td>
                                <td>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo ab eum repudiandae accusamus adipisci totam
                                    </p>
                                </td>
                            </tbody>
                        </table>
                        </div>



                        
                        
                    </li>

                    <li> <!-- visi misi -->

                    </li>

                    <li> <!-- tupoksi -->

                    </li>

                    <li> <!-- data publikasi -->

                    </li>

                    <li> <!-- galeri -->

                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</div>