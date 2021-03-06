define([], function() {
	'use strict';

	var UiUtility = {
		identifiers: {
			loader: '.in2js-groupmailer-loader',
			loaderActive: '.in2js-groupmailer-loader--active'
		}
	};

	/**
	 * toggle class for element
	 */
	UiUtility.toggleClassForElement = function(element, className) {
		if (element.classList.contains(className)) {
			element.classList.remove(className);
		} else {
			element.classList.add(className);
		}
	};

	/**
	 * @param element
	 * @return void
	 */
	UiUtility.hideElement = function(element) {
		element.style.display = 'none';
	};

	/**
	 * @param element
	 * @return void
	 */
	UiUtility.showElement = function(element) {
		element.style.display = 'inline-block';
	};

	/**
	 * @param element
	 * @return void
	 */
	UiUtility.showElementAsBlock = function(element) {
		element.style.display = 'block';
	};

	/**
	 * @param element
	 * @return void
	 */
	UiUtility.removeStyles = function(element) {
		element.removeAttribute("style");
	};

	/**
	 * En- or disables the loader
	 */
	UiUtility.toggleLoader = function() {
		if (document.querySelector(UiUtility.identifiers.loader)) {
			UiUtility.toggleClassForElement(
				document.querySelector(UiUtility.identifiers.loader),
				UiUtility.identifiers.loaderActive
			);
		}
	};


	return UiUtility;
});
