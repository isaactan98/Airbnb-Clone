import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import * as ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor.create(document.querySelector('#editor')).catch(error => {
    console.log(error);
})