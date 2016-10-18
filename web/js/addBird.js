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

    static mapStyle = [{"elementType":"geometry","stylers":[{"hue":"#ff4400"},{"saturation":-68},{"lightness":-4},
        {"gamma":0.72}]},
        {"featureType":"road","elementType":"labels.icon"},
        {"featureType":"landscape.man_made","elementType":"geometry",
        "stylers":[{"hue":"#0077ff"},{"gamma":3.1}]},{"featureType":"water",
        "stylers":[{"hue":"#00ccff"},{"gamma":0.44},{"saturation":-33}]},{"featureType":"poi.park",
        "stylers":[{"hue":"#44ff00"},{"saturation":-23}]},{"featureType":"water","elementType":"labels.text.fill",
        "stylers":[{"hue":"#007fff"},{"gamma":0.77},{"saturation":65},{"lightness":99}]},
        {"featureType":"water","elementType":"labels.text.stroke",
        "stylers":[{"gamma":0.11},{"weight":5.6},{"saturation":99},{"hue":"#0091ff"},{"lightness":-86}]},
        {"featureType":"transit.line","elementType":"geometry","stylers":[{"lightness":-48},{"hue":"#ff5e00"},
        {"gamma":1.2},{"saturation":-23}]},{"featureType":"transit","elementType":"labels.text.stroke",
        "stylers":[{"saturation":-64},{"hue":"#ff9100"},{"lightness":16},{"gamma":0.47},{"weight":2.7}]}];

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
                        ref='map'
                        defaultOptions={{ styles: GoogleMapAddBird.mapStyle}}>
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