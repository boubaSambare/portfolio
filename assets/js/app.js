/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');
require('../../node_modules/@fortawesome/fontawesome-free/css/all.min.css');
require('../../node_modules/magnific-popup/dist/magnific-popup.css');


// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
 import {$,jquery } from '../../node_modules/jquery/dist/jquery.min.js';

 import '../../node_modules/popper.js/dist/popper.js';
global.$ = global.jQuery = $;
import '../../node_modules/bootstrap/dist/js/bootstrap.js';
import 'jquery.easing';
import '../../node_modules/magnific-popup/dist/jquery.magnific-popup.min.js';
import '../../assets/js/jqBootstrapValidation.min.js';
import '../../assets/js/contact_me.min.js';
import '../../assets/js/freelancer.js';
console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
