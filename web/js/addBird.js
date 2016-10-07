import { default as React, Component } from 'react';
import { GoogleMapLoader, GoogleMap, InfoWindow, Marker } from "react-google-maps";
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
                containerElement={}
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
                        <div>
                            <label htmlFor="form_longitude" className="required">Longitude</label>
                            <input id="form_longitude" name="form[longitude]" required="required" type="text" value={position.lng}></input>
                        </div>
                        <div>
                            <label htmlFor="form_latitude" className="required">Latitude</label>
                            <input id="form_longitude" name="form[longitude]" required="required" type="text" value={position.lat}></input>
                        </div>
                        <p>Placez le marker a l'endroit exact de l'observation :</p>
                    </GoogleMap>
                }
            />
        );
    }
}