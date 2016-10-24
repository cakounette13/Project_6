"use strict";

var _react = require("react");

var _react2 = _interopRequireDefault(_react);

var _reactGoogleMaps = require("react-google-maps");

var _canUseDom = require("can-use-dom");

var _canUseDom2 = _interopRequireDefault(_canUseDom);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var geolocation = _canUseDom2.default && navigator.geolocation ? navigator.geolocation : {
    getCurrentPosition: function getCurrentPosition(success, failure) {
        failure("Your browser doesn't support geolocation.");
    }
};

var GeolocationExampleGoogleMap = withGoogleMap(function (props) {
    return _react2.default.createElement(
        _reactGoogleMaps.GoogleMap,
        {
            defaultZoom: 12,
            center: props.center
        },
        props.center && _react2.default.createElement(
            InfoWindow,
            { position: props.center },
            _react2.default.createElement(
                "div",
                null,
                props.content
            )
        ),
        props.center && _react2.default.createElement(Circle, {
            center: props.center,
            radius: props.radius,
            options: {
                fillColor: "red",
                fillOpacity: 0.20,
                strokeColor: "red",
                strokeOpacity: 1,
                strokeWeight: 1
            }
        })
    );
});

//# sourceMappingURL=addBird-compiled.js.map