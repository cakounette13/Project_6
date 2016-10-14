import { default as React, Component } from 'react';
import { GoogleMapLoader, GoogleMap, Marker } from "react-google-maps";
import canUseDOM from "can-use-dom";
import $ from 'jquery';

var Hello = props => (
    <div>{props.nom}</div>
);

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
    };

    componentDidMount() {
        $.getJSON("/json_form", (json) => {
            this.setState({form: json});
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
                        <input id="form_longitude" name="form[longitude]" required="required" type="text" value={position.lng}></input>
                        <input id="form_longitude" name="form[longitude]" required="required" type="text" value={position.lat}></input>
                        <p>Placez le marker a l'endroit exact de l'observation :</p>
                        <Hello/>
                    </GoogleMap>
                }
            />
        );
    }
}