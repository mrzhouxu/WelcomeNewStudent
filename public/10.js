webpackJsonp([10],{

/***/ 111:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(32)(
  /* script */
  __webpack_require__(184),
  /* template */
  __webpack_require__(190),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/var/www/html/WelcomeNewStudent/resources/assets/js/components/Info.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] Info.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-780d1933", Component.options)
  } else {
    hotAPI.reload("data-v-780d1933", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 184:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {};
    },
    mounted: function mounted() {
        console.log('Component mounted.');
    }
});

/***/ }),

/***/ 190:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "container"
  }, [_vm._v("\n    Info\n")])
},staticRenderFns: []}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-780d1933", module.exports)
  }
}

/***/ })

});