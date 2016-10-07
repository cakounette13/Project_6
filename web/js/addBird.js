import { default as React, Component } from 'react';
import { GoogleMapLoader, GoogleMap, Marker } from "react-google-maps";
import canUseDOM from "can-use-dom";
import $ from 'jquery';


const geolocation = (
    canUseDOM && navigator.geolocation ?
        navigator.geolocation :
        ({
            getCurrentPosition(success, failure) {
                failure(`Your browser doesn't support geolocation.`);
            },
        })
);

export default class GoogleMapAddBird extends React.Component {

    state = {
        center: {
            lat: 46.867453,
            lng: 2.329102,
        },
        form: {},
    };

    componentDidMount() {
        $.getJSON("/json/form", (json) => {
            let datas = JSON.parse(json);
            console.log(datas);
            var form = Object.keys(datas).map(function(k) { return datas[k] });
            this.setState({form: form});
        });

        geolocation.getCurrentPosition((position) => {
            if (this.isUnmounted) {
                return;
            }
            this.setState({
                center: {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                },
            });
        });
    }

    markerCoords(event){
        this.setState({
            center: {
                lat: event.latLng.lat(),
                lng: event.latLng.lng(),
            },
        });
    }

    render() {
        console.log(this.state.form);
        let position = this.state.center;
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
                        center={position}
                        defaultZoom={13}
                        ref='map'>
                        <Marker draggable
                                ref={`position`}
                                position={new google.maps.LatLng(position.lat, position.lng)}
                                onDragend={this.markerCoords.bind(this)}
                        />
                    </GoogleMap>
                }
            />
        );
    }
}