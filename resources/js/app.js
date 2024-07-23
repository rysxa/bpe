/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';
import './bootstrap';
import { createApp } from 'vue';

// import 'bootstrap';

// initiate
window.$ = window.jQuery = $;
window.bootstrap = bootstrap;
// import $ from 'jquery';
// import 'jquery';

// // initiate
// window.$ = window.jQuery = $;

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
*/

const app = createApp({});
const appvendorBundleBase = createApp({});
const appoffCanvas = createApp({});
const appmisc = createApp({});
const appsettings = createApp({});
const apptodolist = createApp({});
const appjqueryCookie = createApp({});

import * as ExampleComponent from './components/ExampleComponent.vue';
import * as vendorBundleBase from '../vendors/js/vendor.bundle.base';
import * as offCanvas from '../js/purple/off-canvas';
import * as misc from '../js/purple/misc';
import * as settings from '../js/purple/settings';
import * as todolist from '../js/purple/todolist';
import * as jqueryCookie from '../js/purple/jquery.cookie';

app.component('example-component', ExampleComponent);
appvendorBundleBase.component('vendorBundleBase', vendorBundleBase);
appoffCanvas.component('offCanvas', offCanvas);
appmisc.component('misc', misc);
appsettings.component('settings', settings);
apptodolist.component('todolist', todolist);
appjqueryCookie.component('jqueryCookie', jqueryCookie);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
