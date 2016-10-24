import React from 'react';
import ReactDOM from 'react-dom';
import GoogleMapAddBird from './addBird';
var root = document.getElementById('add_bird');
ReactDOM.render(
    <GoogleMapAddBird {...(root.dataset)}/>,
    root
);
