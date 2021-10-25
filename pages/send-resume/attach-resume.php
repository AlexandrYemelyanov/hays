<?php

/**
 * The block fot attaching the resume from cloud storages.
 */

?>

<div class="fsr-attach-resume">
	<p>Прикрепите резюме</p>
	<p>Если Вы хотели бы также направить нам сопроводительное письмо, пожалуйста, включите текст письма в своё резюме.</p>
	<p><small>Загрузите своё резюме в одном из форматов: .doc, .docx, .rtf, .txt, .pdf. Максимальный объем 8МБ</small></p>
	<p v-if="fileselected">Прикреплен файл: <span v-text="filename"></span></p>
	<ul>
		<li><i v-if="source==='dbox'" class="wj-icon-cm-check"></i><a v-on:click.stop="_dropbox"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/misc/cloud/icon-dropbox.png" width="50" height="50" alt="пиктограмма DropBox"><p>DropBox</p></a></li>
		<li><i v-if="source==='gdrive'" class="wj-icon-cm-check"></i><a id="wj-gdrive-button"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/misc/cloud/icon-googledrive.png" width="50" height="50" alt="пиктограмма Google Drive"><p>Google Drive</p></a></li>
		<!-- <li><i v-if="source==='ydisk'" class="wj-icon-cm-check"></i><a><img src="assets/img/misc/cloud/icon-yandex.jpg" width="50" height="50" alt="пиктограмма Yandex Disk"><p>Yandex.Disk</p></a></li> -->
		<li>
        	<i v-if="source==='local'" class="wj-icon-cm-check"></i>
            <!-- Aplicant's resume in local file -->
            <div class="wj-form__field wj-form__field--file">
                <label for="applicant-local-file"><div><a><img src="<?php echo get_template_directory_uri(); ?>/assets/img/misc/cloud/icon-hdd.png" width="50" height="50" alt="пиктограмма HDD"><p>Локальный диск</p></a></div></label>
	            <!-- <input v-on:input="_localFile" type="file"  -->
				<input v-on:change="_localFile" type="file"
	            	name="applicant-local-file" 
	            	id="applicant-local-file" 
	            	accept=".txt,.doc,.docx,.rtf,.pdf">
            </div>
		</li>
	</ul>
</div>
