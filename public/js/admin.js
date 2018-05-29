/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 38);
/******/ })
/************************************************************************/
/******/ ({

/***/ 38:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(39);


/***/ }),

/***/ 39:
/***/ (function(module, exports) {

$(document).ready(function () {

    /*** TINYMCE INIT ***/

    tinymce.init({
        selector: '.tinymce-textarea',
        skin: 'lightgray',
        height: 300,
        /*toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
         plugins: 'code'*/

        /*theme: 'modern',
        skin: 'light',*/
        plugins: ['advlist autolink lists link image charmap print preview hr anchor pagebreak', 'searchreplace wordcount visualblocks visualchars code fullscreen', 'insertdatetime media nonbreaking save table contextmenu directionality', 'template paste textcolor colorpicker textpattern imagetools codesample toc help emoticons hr'],
        toolbar1: 'formatselect | bold italic  strikethrough  forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
        image_advtab: true,
        templates: [{ title: 'Test template 1', content: 'Test 1' }, { title: 'Test template 2', content: 'Test 2' }]

    });

    /*** DELETE CONFIRM ***/

    // Select the submit buttons of forms with data-confirm attribute
    var submit_buttons = $("form input[type='submit'][data-confirm]");

    // On click of one of these submit buttons
    submit_buttons.on('click', function (e) {

        // Prevent the form to be submitted
        e.preventDefault();

        if ($(this).hasClass("disabled")) {
            return false;
        }

        var button = $(this); // Get the button
        var form = button.closest('form'); // Get the related form
        var msg = button.data('confirm'); // Get the confirm message

        if (confirm(msg)) {
            form.submit(); // If the user confirm, submit the form
        }
    });

    /*** DATATABLES ***/

    $(document).on('click', '.dataTable .select', {}, function () {
        var numberAll = $('.dataTable .select').length;
        var numberOfChecked = $('.dataTable .select:checked').length;

        var i = 0;
        var vals = [];
        $('.dataTable .select:checked').each(function () {
            vals[i++] = $(this).val();
        });
        $(".deleteForm input[name='ids']").val(vals);

        if (numberOfChecked) {
            $(".deleteForm input[type='submit']").removeClass("disabled");
        } else {
            $(".deleteForm input[type='submit']").addClass("disabled");
        }

        if (numberOfChecked == numberAll) {
            $('.dataTable .selectAll').prop('checked', true);
        } else {
            $('.dataTable .selectAll').prop('checked', false);
        }
    });

    $(document).on('click', '.dataTable .selectAll', {}, function () {
        if ($(this).is(":checked")) {
            $('.dataTable .select').each(function () {
                $(this).prop('checked', true);
                $(".deleteForm input[type='submit']").removeClass("disabled");
            });
        } else {
            $('.dataTable .select').each(function () {
                $(this).prop('checked', false);
                $(".deleteForm input[type='submit']").addClass("disabled");
            });
        }

        var i = 0;
        var vals = [];
        $('.dataTable .select:checked').each(function () {
            vals[i++] = $(this).val();
        });
        $(".deleteForm input[name='ids']").val(vals);
    });
});

/***/ })

/******/ });