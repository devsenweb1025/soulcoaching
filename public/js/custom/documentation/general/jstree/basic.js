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

/***/ "./resources/assets/core/js/custom/documentation/general/jstree/basic.js":
/*!*******************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/general/jstree/basic.js ***!
  \*******************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTJSTreeBasic = function () {\n  // Private functions\n  var exampleBasic = function exampleBasic() {\n    $('#kt_docs_jstree_basic').jstree({\n      \"core\": {\n        \"themes\": {\n          \"responsive\": false\n        }\n      },\n      \"types\": {\n        \"default\": {\n          \"icon\": \"fa fa-folder\"\n        },\n        \"file\": {\n          \"icon\": \"fa fa-file\"\n        }\n      },\n      \"plugins\": [\"types\"]\n    });\n  };\n  return {\n    // Public Functions\n    init: function init() {\n      exampleBasic();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTJSTreeBasic.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZ2VuZXJhbC9qc3RyZWUvYmFzaWMuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWI7QUFDQSxJQUFJQSxhQUFhLEdBQUcsWUFBVztFQUMzQjtFQUNBLElBQUlDLFlBQVksR0FBRyxTQUFmQSxZQUFZQSxDQUFBLEVBQWM7SUFDMUJDLENBQUMsQ0FBQyx1QkFBdUIsQ0FBQyxDQUFDQyxNQUFNLENBQUM7TUFDOUIsTUFBTSxFQUFHO1FBQ0wsUUFBUSxFQUFHO1VBQ1AsWUFBWSxFQUFFO1FBQ2xCO01BQ0osQ0FBQztNQUNELE9BQU8sRUFBRztRQUNOLFNBQVMsRUFBRztVQUNSLE1BQU0sRUFBRztRQUNiLENBQUM7UUFDRCxNQUFNLEVBQUc7VUFDTCxNQUFNLEVBQUc7UUFDYjtNQUNKLENBQUM7TUFDRCxTQUFTLEVBQUUsQ0FBQyxPQUFPO0lBQ3ZCLENBQUMsQ0FBQztFQUNOLENBQUM7RUFFRCxPQUFPO0lBQ0g7SUFDQUMsSUFBSSxFQUFFLFNBQU5BLElBQUlBLENBQUEsRUFBYTtNQUNiSCxZQUFZLENBQUMsQ0FBQztJQUNsQjtFQUNKLENBQUM7QUFDTCxDQUFDLENBQUMsQ0FBQzs7QUFFSDtBQUNBSSxNQUFNLENBQUNDLGtCQUFrQixDQUFDLFlBQVc7RUFDakNOLGFBQWEsQ0FBQ0ksSUFBSSxDQUFDLENBQUM7QUFDeEIsQ0FBQyxDQUFDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2Fzc2V0cy9jb3JlL2pzL2N1c3RvbS9kb2N1bWVudGF0aW9uL2dlbmVyYWwvanN0cmVlL2Jhc2ljLmpzPzgzZjYiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEpTVHJlZUJhc2ljID0gZnVuY3Rpb24oKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVCYXNpYyA9IGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICQoJyNrdF9kb2NzX2pzdHJlZV9iYXNpYycpLmpzdHJlZSh7XHJcbiAgICAgICAgICAgIFwiY29yZVwiIDoge1xyXG4gICAgICAgICAgICAgICAgXCJ0aGVtZXNcIiA6IHtcclxuICAgICAgICAgICAgICAgICAgICBcInJlc3BvbnNpdmVcIjogZmFsc2VcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgXCJ0eXBlc1wiIDoge1xyXG4gICAgICAgICAgICAgICAgXCJkZWZhdWx0XCIgOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgXCJpY29uXCIgOiBcImZhIGZhLWZvbGRlclwiXHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgXCJmaWxlXCIgOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgXCJpY29uXCIgOiBcImZhIGZhLWZpbGVcIlxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBcInBsdWdpbnNcIjogW1widHlwZXNcIl1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICByZXR1cm4ge1xyXG4gICAgICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgICAgICBpbml0OiBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgZXhhbXBsZUJhc2ljKCk7XHJcbiAgICAgICAgfVxyXG4gICAgfTtcclxufSgpO1xyXG5cclxuLy8gT24gZG9jdW1lbnQgcmVhZHlcclxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbigpIHtcclxuICAgIEtUSlNUcmVlQmFzaWMuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktUSlNUcmVlQmFzaWMiLCJleGFtcGxlQmFzaWMiLCIkIiwianN0cmVlIiwiaW5pdCIsIktUVXRpbCIsIm9uRE9NQ29udGVudExvYWRlZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/general/jstree/basic.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/general/jstree/basic.js"]();
/******/ 	
/******/ })()
;