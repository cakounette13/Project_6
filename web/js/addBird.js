import { default as React, Component } from 'react';
import { GoogleMapLoader, GoogleMap, Marker } from "react-google-maps";
import canUseDOM from "can-use-dom";

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
                        {this.props.form}
                        <input id="birds_longitude" name="birds[longitude]" type="hidden" value={position.lng}></input>
                        <input id="birds_latitude" name="birds[latitude]" type="hidden" value={position.lat}></input>
                        <p>Placez le marker a l'endroit exact de l'observation :</p>
                     </GoogleMap>
                }
            />
        );
    }
}