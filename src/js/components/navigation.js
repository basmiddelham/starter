/* global ScreenReaderText */
/**
 * Animate Hamburger-menu
 */
$('.hamburger').click(function () {
	$(this).toggleClass('is-active');
});

/**
 * Multilevel animated mobile dropdown-menu
 */
function initMainNavigation(container) {
	// Add submenu-toggle button to display child menu items.
	var submenuToggle = $('<button />', { 'class': 'submenu-toggle', 'aria-expanded': false })
		// Add screenreader-text to submenu-toggle
		.append($('<span />', { 'class': 'screen-reader-text', text: ScreenReaderText.expand }));
	container.find('.menu-item-has-children > a, .page_item_has_children > a').after(submenuToggle);

	// Dropdown toggle click function
	container.find('.submenu-toggle').click(function (e) {
		var _this = $(this),
			screenReaderSpan = _this.find('.screen-reader-text'),
			otherScreenReaderSpan = $('.submenu-toggle.toggled-on .screen-reader-text').not(_this.parents().siblings()),
			submenu = _this.next('.sub-menu'),
			otherSubmenus = $('.sub-menu.toggled-on').not(_this.parents()),
			otherSubmenusToggle = $('.submenu-toggle.toggled-on').not(_this.parents().siblings());
		e.preventDefault();

		// If menu is closed
		if (submenu.height() === 0) {
			var curHeight = submenu.height(), // Get Default Height
				autoHeight = submenu.css('height', 'auto').height(); // Get height when submenu is open
			// Reset to Default Height
			submenu.height(curHeight);
			// Animate to Auto Height
			submenu.stop().animate({ height: autoHeight }, 400, function () {
				// Reset height to enable sub-sub-menus
				submenu.css('height', 'auto')
			});
			// Close other menu's
			otherSubmenus.animate({ height: '0' }, 400, function () {
				otherSubmenus.removeAttr('style');
			})
			// Toggle attributes on other menu's
			otherSubmenusToggle.toggleClass('toggled-on');
			otherSubmenus.toggleClass('toggled-on');
			otherSubmenusToggle.attr('aria-expanded', 'false');
			// Set screenreader text on other menu's
			otherScreenReaderSpan.text(ScreenReaderText.expand);
			// if menu is already open
		} else {
			// Close submenu
			submenu.stop().animate({ height: '0' }, 400, function () {
				otherSubmenus.removeAttr('style');
			});
		}

		// Toggle attributes
		_this.toggleClass('toggled-on');
		_this.next('.sub-menu').toggleClass('toggled-on');
		_this.attr('aria-expanded', _this.attr('aria-expanded') === 'false' ? 'true' : 'false');

		// Set screenreader text
		screenReaderSpan.text(screenReaderSpan.text() === ScreenReaderText.expand ? ScreenReaderText.collapse : ScreenReaderText.expand);
	});
}
initMainNavigation($('#primary_navigation'));

/**
 * Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
 */
var masthead, siteNavigation, menuToggle;
masthead = $('#masthead');
siteNavigation = masthead.find('.navbar-nav');
menuToggle = masthead.find('.hamburger');

function focusClasses() {
	if (!siteNavigation.length || !siteNavigation.children().length) {
		return;
	}

	// Toggle `focus` class to allow submenu access on tablets.
	function toggleFocusClassTouchScreen() {
		// Check if menu has desktop styling
		if ('none' === menuToggle.css('display')) {
			// Remove .focus when thouching outside navigation
			$(document.body).on('touchstart', function (e) {
				if (!$(e.target).closest('.navbar-nav li').length) {
					$('.navbar-nav li').removeClass('focus');
				}
			});
			// Toggle .focus on submenus
			siteNavigation.find('.menu-item-has-children > a, .page_item_has_children > a').on('touchstart', function (e) {
				var el = $(this).parent('li');
				if (!el.hasClass('focus')) {
					e.preventDefault(); // Prevent folowing link on first touch
					el.toggleClass('focus');
					el.siblings('.focus').removeClass('focus');
				}
			});

		// If menu has mobile styling
		} else {
			siteNavigation.find('.menu-item-has-children > a, .page_item_has_children > a').unbind('touchstart');
		}
	}

	// Check for touchscreen device & run toggleFocusClassTouchScreen
	if ('ontouchstart' in window) {
		$(window).on('resize', toggleFocusClassTouchScreen);
		toggleFocusClassTouchScreen();
	}

	// Toggle .focus on focus blur
	siteNavigation.find('a').on('focus blur', function () {
		$(this).parents('.menu-item, .page_item').toggleClass('focus');
	});
}
focusClasses();