/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/core/js/custom/documentation/general/scroll.js":
/*!*************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/general/scroll.js ***!
  \*************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTGeneralScrollDemos = function () {\n  // Private functions\n  var exampleChangePosition = function exampleChangePosition() {\n    var scroll = document.querySelector(\"#kt_scroll_change_pos\");\n    var btnTop = document.querySelector(\"#kt_scroll_change_pos_top\");\n    var btnBottom = document.querySelector(\"#kt_scroll_change_pos_bottom\");\n    btnTop.addEventListener(\"click\", function (e) {\n      scroll.scrollTop = 0;\n    });\n    btnBottom.addEventListener(\"click\", function (e) {\n      scroll.scrollTop = parseInt(scroll.scrollHeight);\n    });\n  };\n  return {\n    // Public Functions\n    init: function init() {\n      exampleChangePosition();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTGeneralScrollDemos.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC9zY3JvbGwuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWI7QUFDQSxJQUFJQSxvQkFBb0IsR0FBRyxZQUFXO0VBQ2xDO0VBQ0EsSUFBSUMscUJBQXFCLEdBQUcsU0FBeEJBLHFCQUFxQkEsQ0FBQSxFQUFjO0lBQ25DLElBQUlDLE1BQU0sR0FBR0MsUUFBUSxDQUFDQyxhQUFhLENBQUMsdUJBQXVCLENBQUM7SUFDNUQsSUFBSUMsTUFBTSxHQUFHRixRQUFRLENBQUNDLGFBQWEsQ0FBQywyQkFBMkIsQ0FBQztJQUNoRSxJQUFJRSxTQUFTLEdBQUdILFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLDhCQUE4QixDQUFDO0lBRXRFQyxNQUFNLENBQUNFLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxVQUFVQyxDQUFDLEVBQUU7TUFDMUNOLE1BQU0sQ0FBQ08sU0FBUyxHQUFHLENBQUM7SUFDeEIsQ0FBQyxDQUFDO0lBRUZILFNBQVMsQ0FBQ0MsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFVBQVVDLENBQUMsRUFBRTtNQUM3Q04sTUFBTSxDQUFDTyxTQUFTLEdBQUdDLFFBQVEsQ0FBQ1IsTUFBTSxDQUFDUyxZQUFZLENBQUM7SUFDcEQsQ0FBQyxDQUFDO0VBQ04sQ0FBQztFQUVELE9BQU87SUFDSDtJQUNBQyxJQUFJLEVBQUUsU0FBTkEsSUFBSUEsQ0FBQSxFQUFhO01BQ2JYLHFCQUFxQixDQUFDLENBQUM7SUFDM0I7RUFDSixDQUFDO0FBQ0wsQ0FBQyxDQUFDLENBQUM7O0FBRUg7QUFDQVksTUFBTSxDQUFDQyxrQkFBa0IsQ0FBQyxZQUFXO0VBQ2pDZCxvQkFBb0IsQ0FBQ1ksSUFBSSxDQUFDLENBQUM7QUFDL0IsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvc2Nyb2xsLmpzPzI5OTMiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEdlbmVyYWxTY3JvbGxEZW1vcyA9IGZ1bmN0aW9uKCkge1xyXG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcclxuICAgIHZhciBleGFtcGxlQ2hhbmdlUG9zaXRpb24gPSBmdW5jdGlvbigpIHtcclxuICAgICAgICB2YXIgc2Nyb2xsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9zY3JvbGxfY2hhbmdlX3Bvc1wiKTtcclxuICAgICAgICB2YXIgYnRuVG9wID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiNrdF9zY3JvbGxfY2hhbmdlX3Bvc190b3BcIik7XHJcbiAgICAgICAgdmFyIGJ0bkJvdHRvbSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIja3Rfc2Nyb2xsX2NoYW5nZV9wb3NfYm90dG9tXCIpO1xyXG5cclxuICAgICAgICBidG5Ub3AuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgIHNjcm9sbC5zY3JvbGxUb3AgPSAwO1xyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBidG5Cb3R0b20uYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgIHNjcm9sbC5zY3JvbGxUb3AgPSBwYXJzZUludChzY3JvbGwuc2Nyb2xsSGVpZ2h0KTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgZXhhbXBsZUNoYW5nZVBvc2l0aW9uKCk7XHJcbiAgICAgICAgfVxyXG4gICAgfTtcclxufSgpO1xyXG5cclxuLy8gT24gZG9jdW1lbnQgcmVhZHlcclxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbigpIHtcclxuICAgIEtUR2VuZXJhbFNjcm9sbERlbW9zLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVEdlbmVyYWxTY3JvbGxEZW1vcyIsImV4YW1wbGVDaGFuZ2VQb3NpdGlvbiIsInNjcm9sbCIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsImJ0blRvcCIsImJ0bkJvdHRvbSIsImFkZEV2ZW50TGlzdGVuZXIiLCJlIiwic2Nyb2xsVG9wIiwicGFyc2VJbnQiLCJzY3JvbGxIZWlnaHQiLCJpbml0IiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/general/scroll.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/general/scroll.js"]();
/******/ 	
/******/ })()
;