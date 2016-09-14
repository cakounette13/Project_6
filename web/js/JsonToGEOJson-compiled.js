'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _index = require('./index');

var _index2 = _interopRequireDefault(_index);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var GeoJSON = require('geojson');


var result = GeoJSON.parse(_index2.default, { Point: 'geo_coordinates' });
exports.default = result;

//# sourceMappingURL=JsonToGEOJson-compiled.js.map