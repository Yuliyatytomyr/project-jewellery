require('./bootstrap');

/* addons */
// side-bar (open - close)
require('./addons/off-canvas');

// toastr
window.toastr = require('toastr');

// inputmask
window.Inputmask = require('inputmask');
require('./addons/inputs_masks');

// datapicker
import 'jquery-ui/ui/widgets/datepicker.js';
require('./addons/datapicker_setting');

//dropzone
window.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;

// multiselect
require('bootstrap-multiselect');
require('./addons/multiselect-options');

//summernote
require('summernote/dist/summernote-bs4.min.js');
require('summernote/dist/lang/summernote-ru-RU.min.js');

/* static functions */
require('./addons/sendFormFunctions');

/* pages */
// profile page
require('./pages/profile');




