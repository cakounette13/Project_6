"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = require("react");

var _react2 = _interopRequireDefault(_react);

var _reactAddonsUpdate = require("react-addons-update");

var _reactAddonsUpdate2 = _interopRequireDefault(_reactAddonsUpdate);

var _canUseDom = require("can-use-dom");

var _canUseDom2 = _interopRequireDefault(_canUseDom);

var _lodash = require("lodash");

var _lodash2 = _interopRequireDefault(_lodash);

var _reactGoogleMaps = require("react-google-maps");

var _utils = require("react-google-maps/lib/utils");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var GoogleMapBirds = function (_Component) {
    _inherits(GoogleMapBirds, _Component);

    function GoogleMapBirds(props, context) {
        _classCallCheck(this, GoogleMapBirds);

        var _this = _possibleConstructorReturn(this, (GoogleMapBirds.__proto__ || Object.getPrototypeOf(GoogleMapBirds)).call(this, props, context));

        _this.handleWindowResize = _lodash2.default.throttle(_this.handleWindowResize.bind(_this), 500);
        return _this;
    }

    _createClass(GoogleMapBirds, [{
        key: "componentDidMount",
        value: function componentDidMount() {
            if (!_canUseDom2.default) {
                return;
            }
            window.addEventListener("resize", this.handleWindowResize);
        }
    }, {
        key: "componentWillUnmount",
        value: function componentWillUnmount() {
            if (!_canUseDom2.default) {
                return;
            }
            window.removeEventListener("resize", this.handleWindowResize);
        }
    }, {
        key: "handleWindowResize",
        value: function handleWindowResize() {
            console.log("handleWindowResize", this._googleMapComponent);
            (0, _utils.triggerEvent)(this._googleMapComponent, "resize");
        }
    }, {
        key: "handleMarkerRightclick",
        value: function handleMarkerRightclick(index, event) {
            var _update = (0, _reactAddonsUpdate2.default)(markers, {
                $splice: [[index, 1]]
            });

            var markers = _update.markers;

            this.setState({ markers: markers });
        }
    }, {
        key: "render",
        value: function render() {
            var _this2 = this;

            return _react2.default.createElement(_reactGoogleMaps.GoogleMapLoader, {
                containerElement: _react2.default.createElement("div", _extends({}, this.props, {
                    style: {
                        height: "100%"
                    }
                })),
                googleMapElement: _react2.default.createElement(_reactGoogleMaps.GoogleMap, {
                    ref: function ref(map) {
                        return (_this2._googleMapComponent = map) && console.log(map.getZoom());
                    },
                    defaultZoom: 5,
                    defaultCenter: { lat: 46.867453, lng: 2.329102 }
                })
            });
        }
    }]);

    return GoogleMapBirds;
}(_react.Component);

exports.default = GoogleMapBirds;

//# sourceMappingURL=map.react-compiled.js.map