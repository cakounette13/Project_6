'use strict';

var _react = require('react');

var _react2 = _interopRequireDefault(_react);

var _reactDom = require('react-dom');

var _reactDom2 = _interopRequireDefault(_reactDom);

var _addBird = require('./addBird');

var _addBird2 = _interopRequireDefault(_addBird);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var root = document.getElementById('add_bird');
_reactDom2.default.render(_react2.default.createElement(_addBird2.default, root.dataset), root);

//# sourceMappingURL=add.react-compiled.js.map