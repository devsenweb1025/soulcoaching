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

/***/ "./resources/assets/core/js/custom/documentation/charts/flotcharts/pie.js":
/*!********************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/charts/flotcharts/pie.js ***!
  \********************************************************************************/
/***/ (() => {

eval("\n\n// Class definition\nvar KTFlotDemoPie = function () {\n  // Private functions\n  var examplePie = function examplePie() {\n    var data = [{\n      label: \"CSS\",\n      data: 10,\n      color: KTUtil.getCssVariableValue('--bs-active-primary')\n    }, {\n      label: \"HTML5\",\n      data: 40,\n      color: KTUtil.getCssVariableValue('--bs-active-success')\n    }, {\n      label: \"PHP\",\n      data: 30,\n      color: KTUtil.getCssVariableValue('--bs-active-danger')\n    }, {\n      label: \"Angular\",\n      data: 20,\n      color: KTUtil.getCssVariableValue('--bs-active-warning')\n    }];\n    $.plot($(\"#kt_docs_flot_pie\"), data, {\n      series: {\n        pie: {\n          show: true\n        }\n      }\n    });\n  };\n  return {\n    // Public Functions\n    init: function init() {\n      examplePie();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTFlotDemoPie.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vY2hhcnRzL2Zsb3RjaGFydHMvcGllLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViO0FBQ0EsSUFBSUEsYUFBYSxHQUFHLFlBQVk7RUFDNUI7RUFDQSxJQUFJQyxVQUFVLEdBQUcsU0FBYkEsVUFBVUEsQ0FBQSxFQUFlO0lBQ3pCLElBQUlDLElBQUksR0FBRyxDQUNQO01BQUVDLEtBQUssRUFBRSxLQUFLO01BQUVELElBQUksRUFBRSxFQUFFO01BQUVFLEtBQUssRUFBRUMsTUFBTSxDQUFDQyxtQkFBbUIsQ0FBQyxxQkFBcUI7SUFBRSxDQUFDLEVBQ3BGO01BQUVILEtBQUssRUFBRSxPQUFPO01BQUVELElBQUksRUFBRSxFQUFFO01BQUVFLEtBQUssRUFBRUMsTUFBTSxDQUFDQyxtQkFBbUIsQ0FBQyxxQkFBcUI7SUFBRSxDQUFDLEVBQ3RGO01BQUVILEtBQUssRUFBRSxLQUFLO01BQUVELElBQUksRUFBRSxFQUFFO01BQUVFLEtBQUssRUFBRUMsTUFBTSxDQUFDQyxtQkFBbUIsQ0FBQyxvQkFBb0I7SUFBRSxDQUFDLEVBQ25GO01BQUVILEtBQUssRUFBRSxTQUFTO01BQUVELElBQUksRUFBRSxFQUFFO01BQUVFLEtBQUssRUFBRUMsTUFBTSxDQUFDQyxtQkFBbUIsQ0FBQyxxQkFBcUI7SUFBRSxDQUFDLENBQzNGO0lBRURDLENBQUMsQ0FBQ0MsSUFBSSxDQUFDRCxDQUFDLENBQUMsbUJBQW1CLENBQUMsRUFBRUwsSUFBSSxFQUFFO01BQ2pDTyxNQUFNLEVBQUU7UUFDSkMsR0FBRyxFQUFFO1VBQ0RDLElBQUksRUFBRTtRQUNWO01BQ0o7SUFDSixDQUFDLENBQUM7RUFDTixDQUFDO0VBRUQsT0FBTztJQUNIO0lBQ0FDLElBQUksRUFBRSxTQUFOQSxJQUFJQSxDQUFBLEVBQWM7TUFDZFgsVUFBVSxDQUFDLENBQUM7SUFDaEI7RUFDSixDQUFDO0FBQ0wsQ0FBQyxDQUFDLENBQUM7O0FBRUg7QUFDQUksTUFBTSxDQUFDUSxrQkFBa0IsQ0FBQyxZQUFZO0VBQ2xDYixhQUFhLENBQUNZLElBQUksQ0FBQyxDQUFDO0FBQ3hCLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9jaGFydHMvZmxvdGNoYXJ0cy9waWUuanM/YmRkNSJdLCJzb3VyY2VzQ29udGVudCI6WyJcInVzZSBzdHJpY3RcIjtcclxuXHJcbi8vIENsYXNzIGRlZmluaXRpb25cclxudmFyIEtURmxvdERlbW9QaWUgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAvLyBQcml2YXRlIGZ1bmN0aW9uc1xyXG4gICAgdmFyIGV4YW1wbGVQaWUgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgdmFyIGRhdGEgPSBbXHJcbiAgICAgICAgICAgIHsgbGFiZWw6IFwiQ1NTXCIsIGRhdGE6IDEwLCBjb2xvcjogS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtYWN0aXZlLXByaW1hcnknKSB9LFxyXG4gICAgICAgICAgICB7IGxhYmVsOiBcIkhUTUw1XCIsIGRhdGE6IDQwLCBjb2xvcjogS1RVdGlsLmdldENzc1ZhcmlhYmxlVmFsdWUoJy0tYnMtYWN0aXZlLXN1Y2Nlc3MnKSB9LFxyXG4gICAgICAgICAgICB7IGxhYmVsOiBcIlBIUFwiLCBkYXRhOiAzMCwgY29sb3I6IEtUVXRpbC5nZXRDc3NWYXJpYWJsZVZhbHVlKCctLWJzLWFjdGl2ZS1kYW5nZXInKSB9LFxyXG4gICAgICAgICAgICB7IGxhYmVsOiBcIkFuZ3VsYXJcIiwgZGF0YTogMjAsIGNvbG9yOiBLVFV0aWwuZ2V0Q3NzVmFyaWFibGVWYWx1ZSgnLS1icy1hY3RpdmUtd2FybmluZycpIH1cclxuICAgICAgICBdO1xyXG5cclxuICAgICAgICAkLnBsb3QoJChcIiNrdF9kb2NzX2Zsb3RfcGllXCIpLCBkYXRhLCB7XHJcbiAgICAgICAgICAgIHNlcmllczoge1xyXG4gICAgICAgICAgICAgICAgcGllOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgc2hvdzogdHJ1ZVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBleGFtcGxlUGllKCk7XHJcbiAgICAgICAgfVxyXG4gICAgfTtcclxufSgpO1xyXG5cclxuLy8gT24gZG9jdW1lbnQgcmVhZHlcclxuS1RVdGlsLm9uRE9NQ29udGVudExvYWRlZChmdW5jdGlvbiAoKSB7XHJcbiAgICBLVEZsb3REZW1vUGllLmluaXQoKTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyJLVEZsb3REZW1vUGllIiwiZXhhbXBsZVBpZSIsImRhdGEiLCJsYWJlbCIsImNvbG9yIiwiS1RVdGlsIiwiZ2V0Q3NzVmFyaWFibGVWYWx1ZSIsIiQiLCJwbG90Iiwic2VyaWVzIiwicGllIiwic2hvdyIsImluaXQiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/charts/flotcharts/pie.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/charts/flotcharts/pie.js"]();
/******/ 	
/******/ })()
;