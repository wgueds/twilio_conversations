import './bootstrap';
import jQuery from 'jquery';
import Alpine from 'alpinejs';

// Make jQuery available globally
window.$ = jQuery;
window.jQuery = jQuery;

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Import Twilio script after jQuery is available
import './twilio.js';
