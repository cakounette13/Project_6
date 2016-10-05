import { default as React, Component } from 'react';
import $ from 'jquery';
import { GoogleMapLoader, GoogleMap, InfoWindow, Marker } from "react-google-maps";

export default class GoogleMapAddBird extends React.Component {

    state = {
        center: {
            lat: 46.867453,
            lng: 2.329102,
        },
    };

    render() {
        return (
            <GoogleMapLoader
                containerElement={
                    <div
                        {...this.props}
                        style={{
                            height: '100%'
                        }} >
                    </div>
                }
                googleMapElement={
                    <GoogleMap
                        center={this.state.center}
                        defaultZoom={4}
                        ref='map'>
                    </GoogleMap>
                }
            />
        );
    }
}