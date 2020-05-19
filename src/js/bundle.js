import $ from 'jquery';
import './components/navigation';
import './components/skip-link-focus-fix.js';
import WebFont from 'webfontloader';

// Jquery test
$('.site-main').css('background', 'gray');

// Web Font Loader
WebFont.load({
    google: {
        families: ['IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap'],
    }
});
