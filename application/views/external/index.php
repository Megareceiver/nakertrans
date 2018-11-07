
<div class="uk-position-center uk-overlay uk-text-center uk-width-1-2@m">
    
    <div>
        <a href="<?php echo site_url('Dexternal')?>">
            <p class="naker-title" style="display: inline-block;height: 40px;line-height: 40px;font-size: 40px;">
                N
            </p>
            <p class="naker-title2" style="display: inline-block; width:fit-content; text-decoration:none; color:grey; font-size: 40px;">
                akertrans
            </p>
        </a>
    </div>
    
    <div style="    margin-bottom: 50px; margin-top: -10px;">
        <p class="naker-d" style="display: inline-block; width:fit-content;    font-size: 70px;"><?php echo date("d")?></p>
        <p class="naker-y" style="display: inline-block; width:fit-content;font-size: 25px;text-align: left;line-height: 25px;border-left: 4px solid; padding-left:5px;"><?php echo date("Y")."<br> ".date("M")?></p>      
    </div>
    
    <?php echo form_open_multipart(site_url("Dexternal/hasil_pencapaian/".$this->session->userdata('program')), array("class" => "formValidate")) ?>
        <div style="display: inline-block;width: 90%;margin-bottom:10px;">
            <div uk-form-custom="target: true" style="width: 100%">
                <input type="file" name="file">
                <input class="uk-input uk-border-rounded" type="text" placeholder="Pilih file xlsx" name="file">
            </div>
        </div>

        <div style="border:1px solid grey; border-radius:100%; width: 40px;display: inline-block;">
            <button uk-icon="icon: arrow-right; ratio: 2"></button>
        </div>
    <?php echo form_close() ?>
</div>

<div class="uk-position-bottom-center uk-position-medium uk-overlay uk-text-center">
    <h4><?php echo $this->session->userdata('program')?></h4>
    <p style="font-size:12px;">Unggah data hasil pencapaian program.</p>
    <a href="<?php echo site_url('Auth/Logout/')?>" type="button" uk-icon="close" style="text-decoration:none; color:grey; height: 20px; width: 20px; background: unset;position: relative;border:1px solid grey; border-radius:100%;"></a>
</div>